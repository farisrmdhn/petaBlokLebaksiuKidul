<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//DONE : add, edit, delete , upload, delete gambar, password, change_password, excel, bantuan
//IN PROGRESS :
//NOT YET STARTED :
class Pages extends CI_Controller {

	// public function bot(){
	// 	// $res = $this->daftar_nama_model->isi_blok();
	// 	$res = $this->daftar_nama_model->isi_id_gambar();
	// 	print_r($res);
	// 	die();
	// }

	public function index(){
		//Adjust active link in sidebar
		$data_header['active'] = 'beranda';

		//Get counts of entries and images
		$data['count'] = $this->daftar_nama_model->get_count_entri_gambar();
		$data['last_edited'] = $this->daftar_nama_model->get_last_edited();

		$this->load->view('templates/header.php', $data_header);
		$this->load->view('pages/index.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function daftar_nama($jenis){
		//Needed to prevent error
		$data_header['active'] = FALSE;

		$data['jenis'] = $jenis;
		$data['entries'] = $this->daftar_nama_model->get_daftar_nama($jenis);

		$this->load->view('templates/header.php', $data_header);
		$this->load->view('pages/daftar_nama.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function add($jenis){
		$data_header['active'] = FALSE;

		$data['jenis'] = $jenis;
		$data['images'] = $this->daftar_nama_model->get_all_gambar();


		$this->form_validation->set_rules('nop', 'NOP', 'required');
		$this->form_validation->set_rules('no_kohir', 'No. Kohir', 'required');
		$this->form_validation->set_rules('nama_wajib_pajak', 'Nama Wajib Pajak', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('id_gambar', 'Peta Blok', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header.php', $data_header);
			$this->load->view('pages/add.php', $data);
			$this->load->view('templates/footer.php');
		}else{
			$password = md5($this->input->post('password'));
			//Check password
			if($this->daftar_nama_model->password($password)){
				$this->daftar_nama_model->add();

				$id = $this->daftar_nama_model->get_latest_id();

				//Set Message
				$this->session->set_flashdata('add', 'Data berhasil ditambahkan');
				redirect('detail/'.$id);
			}else{
				$this->session->set_flashdata('fail_password', 'Password yang anda isi salah');
				redirect('add/'.$this->input->post('jenis'));
			}
			
		}
	}

	public function edit($id){
		$data_header['active'] = FALSE;


		$data['detail'] = $this->daftar_nama_model->get_daftar_nama_by_id($id);
		$data['images'] = $this->daftar_nama_model->get_all_gambar();

		$this->form_validation->set_rules('nop', 'NOP', 'required');
		$this->form_validation->set_rules('no_kohir', 'No. Kohir', 'required');
		$this->form_validation->set_rules('nama_wajib_pajak', 'Nama Wajib Pajak', 'required');
		$this->form_validation->set_rules('jenis', 'Jenis', 'required');
		$this->form_validation->set_rules('id_gambar', 'Peta Blok', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header.php', $data_header);
			$this->load->view('pages/edit.php', $data);
			$this->load->view('templates/footer.php');
		}else{
			$password = md5($this->input->post('password'));
			//Check password
			if($this->daftar_nama_model->password($password)){
				$this->daftar_nama_model->edit($id);

				//Set Message
				$this->session->set_flashdata('edit', 'Data berhasil diubah');
				redirect('detail/'.$id);
			}else{
				$this->session->set_flashdata('fail_password', 'Password yang anda isi salah');
				redirect('edit/'.$id);
			}
		}
	}

	public function delete(){
		$password = md5($this->input->post('password'));

		if($this->daftar_nama_model->password($password)){
			$id = $this->input->post('id');
			$detail = $this->daftar_nama_model->get_daftar_nama_by_id($id);


			$this->daftar_nama_model->delete($id);

			//Set Message
			$this->session->set_flashdata('delete', 'Data berhasil dihapus'); 
			//bikin tombol hapus di detail, flash message di daftar nama

			redirect('daftar_nama/'.$detail['jenis']);
		}else{
			//Set Message
			$this->session->set_flashdata('fail_password', 'Password yang anda isi salah');
			redirect('detail/'.$this->input->post('id'));
		}
	}

	public function daftar_gambar(){
		$data_header['active'] = 'gambar';

		$data['lists'] = $this->daftar_nama_model->get_all_gambar();

		$this->load->view('templates/header.php', $data_header);
		$this->load->view('pages/daftar_gambar.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function upload(){
		$data_header['active'] = FALSE;
		$this->load->view('templates/header.php', $data_header);
		$this->load->view('pages/upload.php');
		$this->load->view('templates/footer.php');
	}

	public function do_upload(){
		$password = md5($this->input->post('password'));

		if($this->daftar_nama_model->password($password)){
			//upload image
			$config['upload_path'] = './assets/peta';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size'] = '10000000';
			$config['file_name'] = $_FILES['image']['name'];

			$this->load->library('upload', $config);

			//if fail to upload, replace with default (noimage.png)
			if(!$this->upload->do_upload('image')){
				$error = array('error' => $this->upload->display_errors());
				//Set Message
				$this->session->set_flashdata('no_upload', 'Gambar gagal di upload'.$error['error']);
				redirect('upload');
			} else {
				$data = array('upload_data' => $this->upload->data());
				$image = $this->upload->data('file_name');
			}

			//Update the startup's data to db via model
			$this->daftar_nama_model->upload($image);

			//Set Message
			$this->session->set_flashdata('upload', 'Gambar berhasil di upload');

			redirect('daftar_gambar');
		}else{
			//Set Message
			$this->session->set_flashdata('fail_password', 'Password yang anda isi salah');
			redirect('upload');
		}
	}

	public function delete_img(){
		$password = md5($this->input->post('password'));

		if($this->daftar_nama_model->password($password)){
			$id = $this->input->post('id');

			$this->daftar_nama_model->delete_img($id);

			//Set Message
			$this->session->set_flashdata('delete_img', 'Gambar berhasil dihapus'); 
			//bikin tombol hapus di detail, flash message di daftar nama

			redirect('daftar_gambar');
		}else{
			//Set Message
			$this->session->set_flashdata('fail_password', 'Password yang anda isi salah');
			redirect('daftar_gambar');
		}
	}

	public function cari(){
		$data_header['active'] = 'cari';
		$data['success'] = FALSE;

		$this->form_validation->set_rules('kolom', 'Dasar pencarian', 'required');
		$this->form_validation->set_rules('kata_kunci', 'Kata Kunci', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header.php', $data_header);
			$this->load->view('pages/cari.php', $data);
			$this->load->view('templates/footer.php');
		}else{
			//hasil
			$data['entries'] = $this->daftar_nama_model->search();

			//view
			$data['success'] = TRUE;
			$data['kolom'] = $this->input->post('kolom');
			$data['kata_kunci'] = $this->input->post('kata_kunci');

			$this->load->view('templates/header.php', $data_header);
			$this->load->view('pages/cari.php', $data);
			$this->load->view('templates/footer.php');
		}
		
	}

	public function bantuan(){
		$data_header['active'] = 'bantuan';

		$this->load->view('templates/header.php', $data_header);
		$this->load->view('pages/bantuan.php');
		$this->load->view('templates/footer.php');
	}

	public function detail($id){
		$data_header['active'] = FALSE;

		$data['detail'] = $this->daftar_nama_model->get_daftar_nama_by_id($id);

		$this->load->view('templates/header.php', $data_header);
		$this->load->view('pages/detail.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function excel(){
		$data_header['active'] = FALSE;
		$data['images'] = $this->daftar_nama_model->get_all_gambar();

		$this->load->view('templates/header.php', $data_header);
		$this->load->view('pages/excel.php', $data);
		$this->load->view('templates/footer.php');
	}

	public function upload_excel(){
		$password = md5($this->input->post('password'));

		if($this->daftar_nama_model->password($password)){
			//upload image
			$config['upload_path'] = './assets/excel';
			$config['allowed_types'] = 'xls|xlsx';
            $config['remove_spaces'] = true;

            $this->load->library('upload', $config);

			//if fail to upload, redirect to excel
			if(!$this->upload->do_upload('excel')){
				$error = array('error' => $this->upload->display_errors());
				//Set Message
				$this->session->set_flashdata('no_upload', 'File excel gagal di upload'.$error['error']);
				redirect('upload');
			} else {
				$data = array('upload_data' => $this->upload->data());
				$file_name = $data['upload_data']['file_name'];
				$file = './assets/excel/'.$file_name;
				//load the excel library
				$this->load->library('ExcelLib');
				//read file from path
				$objPHPExcel = PHPExcel_IOFactory::load($file);
				//get only the Cell Collection
				$cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();

				//extract to a PHP readable array format
				foreach ($cell_collection as $cell) {
				    $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
				    $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
				    $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();
				    //The header will/should be in row 1 only. of course, this can be modified to suit your need.
			    	if ($row != 1) {
				    	//-2 so the array start with 0
				        $update_data[$row-2][$column] = $data_value;
				    }
				    
				}
				
				$this->daftar_nama_model->update_excel($update_data);
				//Set Message
				$this->session->set_flashdata('excel_success', 'File excel berhasil di upload');
				redirect('daftar_nama/'.$this->input->post('jenis'));
			}

			//Update the startup's data to db via model
			$this->daftar_nama_model->upload($image);

			//Set Message
			$this->session->set_flashdata('upload', 'Gambar berhasil di upload');

			redirect('daftar_gambar');
		}else{
			//Set Message
			$this->session->set_flashdata('fail_password', 'Password yang anda isi salah');
			redirect('excel');
		}
	}

	public function change_password(){
		$data_header['active'] = FALSE;

		$this->form_validation->set_rules('old_password', 'Password Lama', 'required|callback_check_old_password');
		$this->form_validation->set_rules('new_password', 'Password Baru', 'required');
		$this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'matches[new_password]');

		if($this->form_validation->run() === FALSE){
			$this->load->view('templates/header.php', $data_header);
			$this->load->view('pages/change_password.php');
			$this->load->view('templates/footer.php');
		}else{
			$new_password = md5($this->input->post('new_password'));
			$this->daftar_nama_model->change_password($new_password);

			//Set Message
			$this->session->set_flashdata('change_password', 'Password berhasil diubah');
			redirect('index');
		}
	}

	public function check_old_password($old_password){
		$old_password = md5($old_password);
		$this->form_validation->set_message('check_old_password', 'Password lama salah.');
		if($this->daftar_nama_model->password($old_password)){
			return true;
		}else{
			return false;
		}
	}
}
