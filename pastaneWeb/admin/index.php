<?php
session_start();

if(!isset($_SESSION["adSoyad"] )){
	header('location:../girisYap.php?loggin');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Admin Paneli</title>
	<link rel="stylesheet" type="text/css" href="../css_/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="style.css">	
</head>
<body>
	<div class="container-fluid" >	
		<div class="row ">

			<!--SİDEBAR-->
			<div class="col">	
				<div class="sidebar">
					<header>Elen Pastanesi</header>
					<p style="text-align:center;">
						Kullanıcı Bilgisi: <br><?php echo $_SESSION["adSoyad"]; ?>
					</p>
					<ul>
						<li>
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
				<div class="row align-items-center justify-content-end nav">
					<div class="col pl-5">
						<img src="../resimler/elen-icon1.png" class="img-fluid ">
						<span style="font-family:segoe script;">Elen Pastane</span>
					</div>
					<div class="col text-right p-1 pr-3">		
						<button type="button"  class="buton rounded" onclick="document.location='exit.php'">Çıkış Yap</button>
					</div>
				</div>
			</div>

			<!-- İÇERİK-->
			<div class="col-10 mb-5 offset-2 " id="boy">
				<div class="row mt-5 offset-1 ">
					<div class="col-4 kart" >
						<div class="row align-items-center">
							<div class="col-3 p-3">
								<i class="fas fa-users" style="font-size:4rem;"></i>
							</div>
							<div class="col p-3 font" >
								<span style="font-size:2rem;">
									<?php 
									$db=new mysqli("localhost", "root", "", "pastanedb");
									$db->set_charset("utf8");
									$sorgu="SELECT count(*) as adet from tblMusteriler";
									$gelen=$db->query($sorgu);
									$row=$gelen->fetch_assoc();
									$toplam=$row["adet"];
									echo $toplam;
									?>
								</span><br>
								<span >Üye Sayısı</span>
							</div>

							<div class="col-12 font" style="background-color:#d6d6fe;">
								 Daha fazla bilgi &ensp; 
								 <i class="fas fa-arrow-right"></i>
							</div>
						</div>
					</div>

					<div class="col-4 kart">
						<div class="row align-items-center">
							<div class="col-3 p-3">
								<i class="fas fa-tags" style="font-size:3rem; padding-left: 10px"></i>
							</div>
							<div class="col p-3 font">
								<span style="font-size:2rem;">
									<?php 
										$sorgu_2="SELECT count(*) as adet from tblUrunler";
										$gelen_2=$db->query($sorgu_2);
										$row_2=$gelen_2->fetch_assoc();
										$adet=$row_2["adet"];
										echo $adet;
									?>
								</span><br>
								<span >Ürün Sayısı</span>
							</div>

							<div class="col-12 font" style="background-color:#e3fed6;"> 
								Daha fazla bilgi  &ensp; 
								<i class="fas fa-arrow-right"></i> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- FOOTER -->
		<div class="row" >
			<div class="footer" >Tüm hakları saklıdır @ 2021
			</div>
		</div>
	</div>		
</div>
</body>
</html>