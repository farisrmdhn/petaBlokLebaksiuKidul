<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Peta Blok</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">

    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="<?php echo base_url(); ?>assets/js/solid.js"></script>
    <script defer src="<?php echo base_url(); ?>assets/js/fontawesome.js"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <div class="row">
                    <div class="col-md-4">   
                        <img src="<?php echo base_url(); ?>assets/images/logo_kabupaten_tegal.png" width="70">
                    </div>
                    <div class="col-md-8">
                        <h3>Peta Blok</h3>
                        <h6>Desa Lebaksiu Kidul</h6>
                    </div>
                    
                </div>
            </div>

            <ul class="list-unstyled components">
                <p>Navigasi</p>
                <?php if($active == 'beranda'):?>
                <li class="active">
                <?php else:?>
                <li>
                <?php endif;?>
                    <a href="<?php echo base_url(); ?>">Beranda</a>
                </li>

                <?php if($active == 'cari'):?>
                <li class="active">
                <?php else:?>
                <li>
                <?php endif;?>
                    <a href="<?php echo base_url(); ?>cari">Cari</a>
                </li>

                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Daftar Nama</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="<?php echo base_url(); ?>daftar_nama/pemukiman">Pemukiman</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>daftar_nama/sawah">Sawah</a>
                        </li>
                    </ul>
                </li>

                <?php if($active == 'gambar'):?>
                <li class="active">
                <?php else:?>
                <li>
                <?php endif;?>
                    <a href="<?php echo base_url(); ?>daftar_gambar">Daftar Gambar</a>
                </li>

                <?php if($active == 'bantuan'):?>
                <li class="active">
                <?php else:?>
                <li>
                <?php endif;?>
                    <a href="<?php echo base_url(); ?>bantuan">Bantuan</a>
                </li>
            </ul>

            <ul class="list-unstyled CTAs">
                <li>
                    <a href="<?php echo base_url(); ?>excel" class="download">Unggah Excel</a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>change_password" class="article">Ubah Password</a>
                </li>
            </ul>

            <div class="text-center">
               <small> &copy KKN Tim 1 2020 Undip</small>
            </div>
        </nav>
