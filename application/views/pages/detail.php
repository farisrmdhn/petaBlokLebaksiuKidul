<?php 
function replace($value){
    if($value == ''){
        echo '-';
    }else{
        echo $value;
    }
}
?>
<!-- Page Content  -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Sembunyikan Navigasi</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url();?>detail/<?php echo $detail['id']; ?>">Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>edit/<?php echo $detail['id_nama']; ?>">Ubah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Flash Message -->
    <?php if($this->session->flashdata('add')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('add').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('edit')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('edit').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('fail_password')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('fail_password').'</p>'; ?>
    <?php endif; ?>
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-md-5">
            <a class="btn btn-secondary" href="<?php echo base_url(); ?>daftar_nama/<?php echo $detail['jenis']; ?>">kembali</a>
        </div>
        <div class="col-md-7 float-right text-right">
            <small>ID: <?php echo $detail['id_nama']; ?> | </small>
            <small>ID gambar: <?php echo $detail['id_gambar']; ?> | </small>
            <small>Last edited: <?php echo $detail['last_edited']; ?></small>
        </div>
    </div>
    <div class="row">
        <div class="text-center col-md-4">
            <div>
                <img data-toggle="modal" data-target=".bd-example-modal-lg" src="<?php echo base_url(); ?>assets/peta/<?php echo $detail['gambar']; ?>" class="col-md-12">
                <p class="link_zoom_gambar" data-toggle="modal" data-target=".bd-example-modal-lg"><small>klik untuk memperbesar gambar</small></p>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row" style="margin-top: 20px;">
                <div class="col-md-6">
                     <table class="table"> 
                        <tr>
                            <th>Blok</th>
                            <td colspan="2"><?php replace($detail['blok']); ?></td>
                        </tr>
                        <tr>
                            <th>NOP</th>
                            <td colspan="2"><?php replace($detail['nop']); ?></td>
                        </tr>
                        <tr>
                            <th>Persil</th>
                            <td><?php replace($detail['persil_a']); ?></td>
                            <td><?php replace($detail['persil_b'])?></td>
                        </tr>
                        <tr>
                            <th>No. Kohir</th>
                            <td colspan="2"><?php replace($detail['no_kohir']); ?></td>
                        </tr>
                        <tr>
                            <th>Nama Wajib Pajak</th>
                            <td colspan="2"><?php replace($detail['nama_wajib_pajak']); ?></td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td colspan="2"><?php replace($detail['alamat']); ?></td>
                        </tr>
                        <tr>
                            <th>Letak Objek Pajak</th>
                            <td colspan="2"><?php replace($detail['letak_objek_pajak']); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                     <table class="table">
                        <tr>
                            <th>Luas Bumi</th>
                            <td colspan="2"><?php echo $detail['luas_bumi']; ?></td>
                        </tr>
                        <tr>
                            <th>Klas Bumi</th>
                            <td colspan="2"><?php echo $detail['klas_bumi']; ?></td>
                        </tr>
                        <tr>
                            <th>NJOP Bumi</th>
                            <td colspan="2"><?php echo number_format($detail['luas_bumi'] * $detail['klas_bumi']); ?></td>
                        </tr>
                        <tr>
                            <th>Luas Bangun</th>
                            <td colspan="2"><?php echo $detail['luas_bangun']; ?></td>
                        </tr>
                        <tr>
                            <th>Klas Bangun</th>
                            <td colspan="2"><?php echo $detail['klas_bangun']; ?></td>
                        </tr>
                        <tr>
                            <th>NJOP Bangunan</th>
                            <td colspan="2"><?php echo number_format($detail['luas_bangun'] * $detail['klas_bangun']); ?></td>
                        </tr>
                        <tr>
                            <th>Pajak terhutang</th>
                            <td colspan="2"><?php echo number_format($detail['pajak_terhutang']); ?></td>
                        </tr>
                        <tr>
                            <th>Keterangan</th>
                            <td colspan="2"><?php echo $detail['keterangan']; ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <button data-toggle="modal" data-target=".delete" class="btn btn-danger float-right"> <i class="fas fa-trash"></i> Hapus</button>
        </div>
    </div>


    <!-- MODAL PETA -->
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content text-center">
            <p class="text-danger"><strong>Nama: <?php echo $detail['nama_wajib_pajak']; ?>, Nomor: <?php echo $detail['nop']; ?></strong></p>
            <img class="col-md-12" src="<?php echo base_url(); ?>assets/peta/<?php echo $detail['gambar']; ?>">
        </div>
      </div>
    </div>
    <!-- MODAL DELETE -->
    <div class="modal fade delete" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content text-center">
            <div class="row" style="margin: 10px 0px;">
                <div class="col-md-8 offset-md-2 form-group">
                    <form action="<?php echo base_url(); ?>delete" method="post">
                        <input type="hidden" name="id" value="<?php echo $detail['id_nama']; ?>">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                        <input type="submit" value="Hapus" class="btn btn-danger" style="margin-top: 10px;">
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>

    <div class="line"></div>
</div>