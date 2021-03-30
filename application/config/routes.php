<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'pages/index';
$route['index'] = 'pages/index';
$route['cari'] = 'pages/cari';
$route['daftar_nama/pemukiman'] = 'pages/daftar_nama/pemukiman';
$route['daftar_nama/sawah'] = 'pages/daftar_nama/sawah';
$route['daftar_gambar'] = 'pages/daftar_gambar';
$route['bantuan'] = 'pages/bantuan';
$route['detail/(:any)'] = 'pages/detail/$1';
$route['add/(:any)'] = 'pages/add/$1';
$route['edit/(:any)'] = 'pages/edit/$1';
$route['delete'] = 'pages/delete';
$route['upload'] = 'pages/upload';
$route['do_upload'] = 'pages/do_upload';
$route['delete_img'] = 'pages/delete_img';
$route['change_password'] = 'pages/change_password';
$route['excel'] = 'pages/excel';
$route['upload_excel'] = 'pages/upload_excel';
$route['bot'] = 'pages/bot';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
