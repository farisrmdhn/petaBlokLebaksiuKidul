<!-- Page Content  -->
<div id="content">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
                <span>Sembunyikan Navigasi</span>
            </button>
        </div>
    </nav>

    <h2>Ubah Password</h2>


    <p style="color: red !important;"><?php echo validation_errors(); ?></p>

    <form action="<?php echo base_url(); ?>change_password" method="post">
        <div class="form-group col-md-4">
            <label>Password Lama</label>
            <input class="form-control" type="password" name="old_password" required="">
        </div>
        <div class="form-group col-md-4">
            <label>Password Baru</label>
            <input class="form-control" type="password" name="new_password" required="">
        </div>
        <div class="form-group col-md-4">
            <label>Konfirmasi Password</label>
            <input class="form-control" type="password" name="confirm_password" required="">
        </div>
        <div class="form-group col-md-4">
            <input type="submit" class="btn btn-primary" value="Ubah Password">
        </div>
    </form>
   

    <div class="line"></div>
</div>