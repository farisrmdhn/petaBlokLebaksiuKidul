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

    <h2>Cari</h2>
    <!-- tujuan form, controller, model -->
    <form action="<?php echo base_url(); ?>cari" method="post">
        <div class="col-md-8">
            <div class="row">
                <div class="form-group col-md-4">
                    <label>Cari berdasarkan</label>
                    <select class="form-control" name="kolom">
                        <?php if($success == TRUE):?>
                        <option value="<?php echo $kolom; ?>"><?php echo str_replace('_', ' ', ucfirst($kolom)); ?></option>
                        <?php endif;?>
                        <?php if($kolom != 'blok'):?>
                        <option value="blok">Blok</option>
                        <?php endif;?>
                        <?php if($kolom != 'no_kohir'):?>
                        <option value="no_kohir">No. Kohir</option>
                        <?php endif;?>
                        <?php if($kolom != 'nama_wajib_pajak'):?>
                        <option value="nama_wajib_pajak">Nama Wajib Pajak</option>
                        <?php endif;?>
                    </select>
                </div>
                <?php if($success == TRUE): ?>
                <div class="form-group col-md-8">
                    <label>Kata kunci</label>
                    <input type="text" class="form-control" name="kata_kunci" value="<?php echo $kata_kunci; ?>">
                </div>
                <?php else:?>
                <div class="form-group col-md-8">
                    <label>Kata kunci</label>
                    <input type="text" class="form-control" name="kata_kunci">
                </div>
                <?php endif;?>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <input type="submit" class="btn btn-primary float-right" name="submit" value="Cari">
                </div>
            </div>
        </div>

    <div class="line"></div>
    <?php if($success == TRUE): ?>
    <?php if(!$entries): ?>
        <p>Data tidak ditemukan</p>
    <?php else:?>
    <table class="table">
        <thead>
            <th class="col-md-1">Jenis</th>
            <th class="col-md-1">Blok</th>
            <th class="col-md-2" colspan="2">Persil</th>
            <th class="col-md-2">No. Kohir</th>
            <th class="col-md-4">Nama Wajib Pajak</th>
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
                <td><?php echo $entry['jenis']; ?></td>
                <td><?php echo $entry['blok']; ?></td>
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
    <?php endif;?>
    <?php endif;?>
</div>