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

    <h2>Unggah file Microsoft Excel</h2>
    <!-- Flash Message -->
    <?php if($this->session->flashdata('no_upload')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('no_upload').'</p>'; ?>
    <?php endif; ?>

    <!-- Flash Message -->
    <?php if($this->session->flashdata('fail_password')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('fail_password').'</p>'; ?>
    <?php endif; ?>



    <?php echo form_open_multipart('upload_excel') ?>
        <div class="col-md-4 form-group">
            <a class="btn btn-primary" href="<?php echo base_url(); ?>assets/template_excel/template_excel.xlsx">Unduh Template</a>
        </div>
        <div class="col-md-4 form-group">
            <label>Jenis entri</label>
            <select class="form-control" name="jenis" required="">
                <option value="sawah" selected="">Sawah</option>
                <option value="pemukiman">Pemukiman</option>
            </select>
        </div>

        <div class="form-group col-md-4">
            <label>Pilih gambar peta blok</label>
            <select name="id_gambar" class="form-control" required="">
                <?php foreach($images as $image):?>
                <option value="<?php echo $image['id']; ?>"><?php echo $image['nama']; ?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group col-md-4">
          <label>Pilih file Microsoft Excel</label>
            <input type="file" class="form-control-file" name="excel" aria-describedby="fileHelp" required="">
          <small id="fileHelp" class="form-text text-muted">Format file : xls, xlsx.</small>
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