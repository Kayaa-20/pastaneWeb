<!DOCTYPE html>
<html>
<head>
	<title>Giriş Yap</title>
	<link rel='stylesheet' type='text/css' href='css_/bootstrap.min.css'>
	<link rel="stylesheet" type="text/css" href="style.css">	
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
</head>
<body>
	
	<div class="container kayit" >
		<form action="admin/islem.php" method="post">
			<div class="row justify-content-center align-items-center p-2 rounded" >
				<div class="col-8 border-bottom text-center" style="padding-top:6em">
					<h6>GİRİŞ SAYFASI</h6>
					<p>E-posta adresiniz ile girin</p>
				</div>

				<div class="col-10 my-4">
					<div class="input-group has-validation">
						<span class="input-group-text" >@</span>
						<input type="text"  name="kmail" class="form-control" autocomplete="off" placeholder="E-posta Adresiniz" >

					</div>
				</div>

				<div class="col-10 my-2 ">
					<input type="password" name="sifre" class="form-control" placeholder="Parola" required >
				</div>

				<div class="col-10 p-1 mt-4 mb-2">
					<button type="submit"  name="loggin" class="btn btn-success btn-block">GİRİŞ YAP</button>
				</div>
			</div>
		</form>
		<div class="row justify-content-center">
			<div class="col-10">
				<button type="submit"  name="loggin" class="btn btn-warning btn-block px-3" >
					ÜYE OL
				</button>
			</div>
			<div class="col-10 mt-2" style="color: red; font-size:13px;">
				<?php 
				error_reporting(0);
				if($_GET['loggin']=="no"){
					echo "Kullanıcı bulunamadı. E-mail adresiniz ya da şifreniz yanlış!";
				}
				?>
			</div>
			<div class="w-100 mt-2"></div>
		</div>
	</div>
</body>
</html>