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
                        <a class="nav-link" href="<?php echo base_url(); ?>daftar_nama/<?php echo $jenis?>">Daftar Nama</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>add/<?php echo $jenis?>">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Flash Message -->
    <?php if($this->session->flashdata('delete')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('delete').'</p>'; ?>
    <?php endif; ?>
    <?php if($this->session->flashdata('excel_success')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('excel_success').'</p>'; ?>
    <?php endif; ?>

    <h2>Daftar Nama <?php echo $jenis; ?></h2>
    <table class="table">
        <thead>
            <?php if ($jenis == 'sawah'): ?>
            <th class="col-md-1">Blok</th>
            <?php else:?>
            <th class="col-md-1">No.</th>
            <?php endif;?>
            <th class="col-md-2" colspan="2">Persil</th>
            <th class="col-md-2">No. Kohir</th>
            <th class="col-md-5">Nama Wajib Pajak</th>
            <th class="col-md-2"></th>
        </thead>
        <tbody>
           <?php
            //replacing and print values that have no value to '-'
            function replace($value){
                if($value == '' || $value == NULL){
                    echo '-';
                }else{
                    echo $value;
                }
            }

            foreach($entries as $entry):?>
            <tr>
                <?php if ($jenis == 'sawah'): ?>
                <td><?php echo $entry['blok']; ?></td>
                <?php else:?>
                <td><?php echo $entry['id']; ?></td>
                <?php endif;?>
                <td><?php replace($entry['persil_a']); ?></td>
                <td><?php replace($entry['persil_b']); ?></td>
                <td><?php replace($entry['no_kohir']); ?></td>
                <td><?php replace($entry['nama_wajib_pajak']); ?></td>
                <td>
                    <a class="btn btn-primary link-btn" href="<?php echo base_url(); ?>detail/<?php echo $entry['id']?>">Lihat</a>
                    <a class="btn btn-success link-btn" href="<?php echo base_url(); ?>edit/<?php echo $entry['id']?>">Ubah</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <div class="line"></div>
</div>