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
    <!-- Flash Message -->
    <?php if($this->session->flashdata('change_password')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('change_password').'</p>'; ?>
    <?php endif; ?>

    <h2>Beranda</h2>

    <div class="row" style="margin-top: 20px;">
        <div class="col-md-4">
             <table class="table"> 
                <tr>
                    <th>Jumlah Entri</th>
                    <td><?php echo $count['count_entri']; ?></td>
                </tr>
                <tr>
                    <th>Jumlah Gambar</th>
                    <td><?php echo $count['count_gambar']; ?></td>
                </tr>
            </table>
            
            <small>Last edited: <?php echo $last_edited['last_edited']; ?></small>
        </div>
    </div>
   

    <div class="line"></div>
</div>