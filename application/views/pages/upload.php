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
                        <a class="nav-link" href="<?php echo base_url(); ?>daftar_gambar">Daftar Gambar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>upload">Unggah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Flash Message -->
    <?php if($this->session->flashdata('no_upload')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('no_upload').'</p>'; ?>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('fail_password')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('fail_password').'</p>'; ?>
    <?php endif; ?>

    <h2>Unggah Gambar</h2>

    <p class="text-danger"><?php echo validation_errors(); ?></p>

    
    <?php echo form_open_multipart('do_upload') ?>
        <div class="form-group col-md-4">
          <label>Nama</label>
          <input type="text" class="form-control" name="nama" aria-describedby="nameHelp" required="">
        </div>
        <div class="form-group col-md-4">
          <label>Unggah gambar peta blok</label>
            <input type="file" class="form-control-file" name="image" aria-describedby="fileHelp" required="">
          <small id="fileHelp" class="form-text text-muted">Format file : PNG, JPG, JPEG.</small>
        </div>
        <div class="col-md-3 form-group">
            <label>Password</label>
            <input class="form-control" type="password" name="password" required="">
        </div>
        <div class="form-group col-md-4">
          <input type="submit" value="Unggah" class="btn btn-success">
        </div>
    </form>

    <div class="line"></div>
</div>