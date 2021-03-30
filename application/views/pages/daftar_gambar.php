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
                        <a class="nav-link" href="<?php echo base_url(); ?>daftar_gambar">Daftar Gambar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>upload">Unggah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Flash Message -->
    <?php if($this->session->flashdata('upload')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('upload').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('delete_img')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('delete_img').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('fail_password')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('fail_password').'</p>'; ?>
    <?php endif; ?>

    <h2>Daftar Gambar</h2>
    <p class="text-danger"><small>*klik untuk menghapus gambar</small></p>
    <div class="row">
        <?php foreach($lists as $list):?>
        <div class="col-md-2 text-center" style="margin-top: 20px">
            <img data-toggle="modal" data-target=".id<?php echo $list['id']; ?>" class="col-md-12" src="<?php echo base_url(); ?>assets/peta/<?php echo $list['gambar']; ?>">
            <p><?php echo $list['nama']?></p>
        </div>
        <?php endforeach?>
    </div>

    <?php foreach($lists as $list):?>
    <!-- MODAL PETA -->
    <div class="modal fade id<?php echo $list['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-md">
        <div class="modal-content text-center">
            <div class="row" style="margin-top: 10px;">
                <img class="col-md-12" src="<?php echo base_url(); ?>assets/peta/<?php echo $list['gambar']; ?>">
            </div>
            <div class="row text-center" style="margin-top: 10px;">
                <div class="col-md-12">
                    <form action="<?php echo base_url(); ?>delete_img" method="post">
                        <input type="hidden" name="id" value="<?php echo $list['id']; ?>">
                        <label>Password</label>
                        <input class="form-control col-md-4 offset-md-4" type="password" name="password" required="">
                        <input type="submit" value="Delete" class="btn btn-danger" style="margin: 10px 0px;">
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
    <?php endforeach; ?>

    <div class="line"></div>
</div>