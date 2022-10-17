<?php 
if(!defined('INDEX')) die("");

$halaman = array("dashboard","nasabah","nasabah-tambah","nasabah-insert","nasabah-edit","nasabah_update","nasabah_hapus");

if(isset($_GET['hal'])) $hal = $_GET['hal'];
else $hal = "dashboard";

include "content/$hal.php";