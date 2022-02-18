<?php 
$db=new mysqli("localhost","root","","pastanedb");
$db->set_charset("utf8");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Elen Pastanesi</title>
	<link rel="stylesheet" type="text/css" href="../css_/bootstrap.min.css">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" href="../fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container-fluid">
		<!-- HEADER -->
		<div class="row  justify-content-between px-3 pt-3 pb-0 " style="background-color:black; opacity: 0.8;">
			<div class="col-md-2 pt-3 ">
				<img src="../resimler/elen-icon1.png">
				<a href="../index.php" style="font-family:segoe script; color: deeppink;">Elen Pastane</a>
			</div>
			<div class="col-md-4 pt-3">
				<div class="row align-items-center">
					<div class="col text-right px-0 pt-2 ">
						<input type="text"  class="form-control" placeholder="İstediğiniz ürünü arayın."> 
					</div>
					<div class="col-md-1 p-0" >
						<a href="#">
							<img src="../resimler/ikonlar/ara.png">
						</a>
					</div>
				</div>
			</div>
			<div class="col-md-4 pt-3 pb-0">
				<div class="row">
					<div class="col-6">
						<div class="row">
							<div class="col-4 text-right ">
								<img src="../resimler/ikonlar/kargo.png">
							</div>
							<div class="col  align-self-end pl-0 renk">Kargo Takip</div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col text-center pt-1">
								<img src="../resimler/ikonlar/user.png">
							</div>
							<div class="w-100"></div>
							<div class="col text-center renk"><a href="../girisYap.php">Giriş Yap</a></div>
						</div>
					</div>
					<div class="col">
						<div class="row">
							<div class="col text-center pt-1">
								<img src="../resimler/ikonlar/shopping-cart.png">
							</div>
							<div class="w-100"></div>
							<div class="col text-center renk">
								<a href="sepetim.php">Sepetim</a></div>
							</div>
						</div>
					</div>
					
					<div class="row  mt-4 ">
						<div class="col text-right renk">Hoşgeldin <?php
						session_start();
						if(isset($_SESSION['musteriAd'])){
							echo $_SESSION['musteriAd'] ;
						}
					?></div>	
				</div>
			</div>
		</div>

		<div class="row border-top" style="background-color:black;">
			<div class="col text-center" style="color: #32ffff;">
				<ul class="menu">
					<li>
						<a href="../index.php">Anasayfa</a>
					</li>
					<li>
						<a href="../kategoriler.php">Katergoriler</a>
						<ul>
							<li>
								<a href="#">Börekler</a>
							</li>
							<li>
								<a href="#">Pastalar</a>
								<ul>
									<li>
										<a href="gunlukPasta.php?sayfa=1">Günlük Pastalar</a>
									</li>
									<li>
										<a href="sozDugunPasta.php?sayfa=1">Söz-Nişan pastaları</a>
									</li>
									<li>
										<a href="dogumGunu.php?sayfa=1">Doğum günü pastaları </a>
									</li>
									<li>
										<a href="kurabiye.php?sayfa=1">Kuru pastalar</a>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">Sütlü Tatlılar</a>
							</li>
							<li>
								<a href="baklava.php">Şerbetli Tatlılar</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#">Blog</a>
					</li>
					<li>
						<a href="#">İletişim</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
