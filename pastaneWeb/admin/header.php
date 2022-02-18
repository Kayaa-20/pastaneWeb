<?php
	$db=new mysqli("localhost","root","","pastanedb");
	$db->set_charset("utf8");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Paneli</title>
	<link rel="stylesheet" type="text/css" href="../css_/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type='text/javascript' src='../js/jquery-3.3.1.min.js'></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
	<div class="container-fluid" >	

		<div class="row ">

			<!--SİDEBAR-->
			<div class="col">
				<div class="sidebar">
					<header>Elen Pastanesi</header>
					<p style="text-align:center;">
						Kullanıcı Bilgisi: <br><?php session_start(); echo $_SESSION["adSoyad"]; ?>
					</p>
					<ul>
						<li >
							<a href="index.php" ><i class="fas fa-home"></i>Anasayfa</a>
						</li>
						<li>
							<a href="kategoriler.php?sayfa=1"><i class="fas fa-align-justify"></i> Kategoriler</a>
						</li>
						<li>
							<a href="urunler.php?sayfa=1"><i class="fas fa-birthday-cake"></i>Ürünler</a>
						</li>
						<li>
							<a href="musteriler.php?sayfa=1"><i class="fas fa-users"></i>Müşteriler</a>
						</li>
						<li>
							<a href="siparisler.php"><i class="fas fa-gift"></i>Siparişler</a>
						</li>
						<li>
							<a href="#"><i class="far fa-calendar-alt"></i>Takvim</a>
						</li>
						<li>
							<a href="#"><i class="far fa-question-circle"></i>Yardım</a>
						</li>
					</ul>
				</div>
			</div>

			<!-- HEADER -->
			<div class="col-10">
				<div class="row align-items-center justify-content-end nav" >
					<div class="col pl-5">
						<img src="../resimler/elen-icon1.png" class="img-fluid ">
						<span style="font-family:segoe script;">Elen Pastane</span>
					</div>
					<div class="col text-right p-1 pr-3">
						<button type="button"  class="buton rounded" onclick="document.location='exit.php'">Çıkış Yap</button>
					</div>
				</div>
			</div>