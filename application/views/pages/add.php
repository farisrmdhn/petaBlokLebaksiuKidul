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
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>daftar_nama/<?php echo $jenis;?>">Daftar Nama</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>add">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Flash Message -->
    <?php if($this->session->flashdata('fail_password')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('fail_password').'</p>'; ?>
    <?php endif; ?>

    <h2>Tambah Entri</h2>

    <form action="<?php echo base_url(); ?>add/<?php echo $jenis; ?>" method="post">

        <p class="text-red"><?php echo validation_errors(); ?></p>
        <div class="row">
            <div class="col-md-6 form_left">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Jenis entri</label>
                        <select class="form-control" name="jenis" required="">
                            <?php if($jenis == 'sawah'):?>
                            <option value="sawah" selected="">Sawah</option>
                            <option value="pemukiman">Pemukiman</option>
                            <?php else:?>
                            <option value="sawah">Sawah</option>
                            <option value="pemukiman" selected="">Pemukiman</option>
                            <?php endif;?>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Blok</label>
                        <input class="form-control" type="text" name="blok">
                    </div>

                    <div class="form-group col-md-3">
                        <label>NOP</label>
                        <input class="form-control" type="text" name="nop" required="">
                    </div>

                    <div class="form-group col-md-6">
                        <label class="d-block">Persil</label>
                        <input class="form-control col-md-7 d-inline" type="text" name="persil_a" >
                        <input class="form-control col-md-4 offset-md-1 float-right d-inline" type="text" name="persil_b">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4">
                        <label>No. Kohir</label>
                        <input class="form-control" type="text" name="no_kohir">
                    </div>

                    <div class="form-group col-md-8">
                        <label>Nama Wajib Pajak</label>
                        <input class="form-control" type="text" name="nama_wajib_pajak" required="">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <input class="form-control" type="text" name="alamat">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Letak Objek Pajak</label>
                        <input class="form-control" type="text" name="letak_objek_pajak">
                    </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Luas Bumi</label>
                        <input class="form-control" type="text" name="luas_bumi">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Klas Bumi</label>
                        <input class="form-control" type="text" name="klas_bumi">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Luas Bangunan</label>
                        <input class="form-control" type="text" name="luas_bangun">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Klas Bangunan</label>
                        <input class="form-control" type="text" name="klas_bangun">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Pajak Terhutang</label>
                        <input class="form-control" type="text" name="pajak_terhutang">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Keterangan</label>
                        <input class="form-control" type="text" name="keterangan">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Peta Blok</label>
                        <select name="id_gambar" class="form-control" required="">
                            <?php foreach($images as $image):?>
                            <option value="<?php echo $image['id']; ?>"><?php echo $image['nama']; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <div class="col-md-3 float-right">
                    <label>Password</label>
                    <input class="form-control" type="password" name="password" required="">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 form-group">
                <div class="col-md-3 float-right">
                    <input class="form-control btn btn-success" type="submit" value="Tambah">
                </div>
            </div>
        </div>
    </form>

    <div class="line"></div>
</div>