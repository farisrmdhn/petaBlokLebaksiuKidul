<?php
class Daftar_nama_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function get_count_entri_gambar(){
		$sql = 'SELECT count(id) AS count_entri, count(DISTINCT id_gambar) AS count_gambar FROM daftar_nama';
		return $this->db->query($sql)->row_array();
	}

	public function get_last_edited(){
		$sql = 'SELECT MAX(last_edited) AS last_edited FROM daftar_nama ;';
		return $this->db->query($sql)->row_array();
	}

	public function get_daftar_nama($jenis){
		$sql = 'SELECT * FROM daftar_nama WHERE jenis = "'.$jenis.'" ;';

		return $this->db->query($sql)->result_array();
	}

	public function get_daftar_nama_by_id($id){
		$sql = 'SELECT *, n.id AS id_nama, g.nama AS nama_gambar FROM daftar_nama n INNER JOIN daftar_gambar g ON n.id_gambar = g.id WHERE n.id = '.$id.' ;';

		return $this->db->query($sql)->row_array();
	}

	public function get_all_gambar(){
		$sql = 'SELECT * FROM daftar_gambar';

		return $this->db->query($sql)->result_array();
	}

	public function add(){
		$data = array(
			'id_gambar' => $this->input->post('id_gambar'),
			'jenis' => $this->input->post('jenis'),
			'blok' => $this->input->post('blok'),
			'nop' => $this->input->post('nop'),
			'persil_a' => $this->input->post('persil_a'),
			'persil_b' => $this->input->post('persil_b'),
			'no_kohir' => $this->input->post('no_kohir'),
			'nama_wajib_pajak' => $this->input->post('nama_wajib_pajak'),
			'alamat' => $this->input->post('alamat'),
			'letak_objek_pajak' => $this->input->post('letak_objek_pajak'),
			'luas_bumi' => $this->input->post('luas_bumi'),
			'klas_bumi' => $this->input->post('klas_bumi'),
			'luas_bangun' => $this->input->post('luas_bangun'),
			'klas_bangun' => $this->input->post('klas_bangun'),
			'pajak_terhutang' => $this->input->post('pajak_terhutang'),
			'keterangan' => $this->input->post('keterangan')
		);

		return $this->db->insert('daftar_nama', $data);
	}

	public function get_latest_id(){
		$sql= 'SELECT id, last_edited FROM `daftar_nama` ORDER BY last_edited DESC LIMIT 1 ';

		//Returns id of the latest entry to db. Used for redirecting to entry details after adding.
		return $this->db->query($sql)->row_array()['id'];
	}

	public function edit($id){
		$data = array(
			'id_gambar' => $this->input->post('id_gambar'),
			'jenis' => $this->input->post('jenis'),
			'blok' => $this->input->post('blok'),
			'nop' => $this->input->post('nop'),
			'persil_a' => $this->input->post('persil_a'),
			'persil_b' => $this->input->post('persil_b'),
			'no_kohir' => $this->input->post('no_kohir'),
			'nama_wajib_pajak' => $this->input->post('nama_wajib_pajak'),
			'alamat' => $this->input->post('alamat'),
			'letak_objek_pajak' => $this->input->post('letak_objek_pajak'),
			'luas_bumi' => $this->input->post('luas_bumi'),
			'klas_bumi' => $this->input->post('klas_bumi'),
			'luas_bangun' => $this->input->post('luas_bangun'),
			'klas_bangun' => $this->input->post('klas_bangun'),
			'pajak_terhutang' => $this->input->post('pajak_terhutang'),
			'keterangan' => $this->input->post('keterangan')
			);

			$this->db->where('id', $id);

			return $this->db->update('daftar_nama', $data);
	}

	public function delete($id){
		$this->db->where('id', $id);
		$this->db->delete('daftar_nama');
		return true;
	}

	public function upload($image){
		$data = array(
			'nama' => $this->input->post('nama'),
			'gambar' => $image
		);

		return $this->db->insert('daftar_gambar', $data);
	}

	public function delete_img($id){
		$this->db->where('id', $id);
		$this->db->delete('daftar_gambar');
		return true;
	}

	public function password($password){
		//Validate
		$sql = 'SELECT * FROM password WHERE password = "'.$password.'";';
		$result = $this->db->query($sql);
		//Validate
		if($result->num_rows() == 1){
			return true;
		} else{
			return false;
		}
	}

	public function change_password($new_password){
		$data = array(
			'password' => $new_password
			);

			$this->db->where('id', 1);

			return $this->db->update('password', $data);
	}

	public function update_excel($update_data){
		for($i = 0;$i<sizeof($update_data);$i++){
			$nop = $update_data[$i]['A'];
			$persil_a = $update_data[$i]['B'];
			$persil_b = $update_data[$i]['C'];
			$no_kohir = $update_data[$i]['D'];
			$nama_wajib_pajak = $update_data[$i]['E'];
			$alamat = $update_data[$i]['F'];
			$letak_objek_pajak = $update_data[$i]['G'];
			$luas_bumi = $update_data[$i]['H'];
			$klas_bumi = $update_data[$i]['I'];
			$luas_bangun = $update_data[$i]['J'];
			$klas_bangun = $update_data[$i]['K'];
			$pajak_terhutang = $update_data[$i]['L'];
			$keterangan = $update_data[$i]['M'];

			$this->db->query("INSERT INTO `daftar_nama`(`id_gambar`, `jenis`, `nop`, `persil_a`, `persil_b`, `no_kohir`, `nama_wajib_pajak`, `alamat`, `letak_objek_pajak`, `luas_bumi`, `klas_bumi`, `luas_bangun`, `klas_bangun`, `pajak_terhutang`, `keterangan`) VALUES ('".$this->input->post('id_gambar')."', '".$this->input->post('jenis')."', '".$nop."', '".$persil_a."', '".$persil_b."', '".$no_kohir."', '".$nama_wajib_pajak."', '".$alamat."', '".$letak_objek_pajak."', '".$luas_bumi."', ".$klas_bumi.", ".$luas_bangun.", '".$klas_bangun."', '".$pajak_terhutang."', '".$keterangan."')");
		}
	}

	public function search(){
		$kolom = $this->input->post('kolom');
		$kata_kunci = $this->input->post('kata_kunci');

		$sql = 'SELECT * FROM daftar_nama WHERE '.$kolom.' LIKE "%'.$kata_kunci.'%" ;';

		return $this->db->query($sql)->result_array();
	}

	//BOT: Isi blok, mengisi blok yang kosong
	public function isi_blok(){
		$blok = ['01', '02', '03', '04', '21', '35', '36', '37', '38', '39', '40', '41', '52', '53'];
		$atas = [0, 22, 48, 93, 128, 145, 174, 231, 276, 337, 387, 409, 469, 552];
		$bawah = [23, 49, 94, 129, 146, 175, 232, 277, 338, 388, 410, 470, 553, 634];
		for($i = 0; $i < sizeof($blok); $i++){
			$sql = 'UPDATE daftar_nama SET blok = "'.$blok[$i].'" WHERE id > '.$atas[$i].' && id < '.$bawah[$i].' ;';
			$this->db->query($sql);
		}

		$sql = 'SELECT DISTINCT blok FROM daftar_nama ;';
		return $this->db->query($sql)->result_array();
	}

	//mengisi id gambar sawah blok
	public function isi_id_gambar(){
		$id_gambar = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
		$blok = ['01', '02', '03', '04', '21', '35', '36', '37', '38', '39', '40', '41', '52', '53'];

		for($i = 0; $i < sizeof($blok); $i++){
			$sql = 'UPDATE daftar_nama SET id_gambar = '.$id_gambar[$i].' WHERE blok = "'.$blok[$i].'" ;';
			$this->db->query($sql);
		}

		$sql = 'SELECT DISTINCT id_gambar FROM daftar_nama ;';
		return $this->db->query($sql)->result_array();
	}

	//BOT - END
}