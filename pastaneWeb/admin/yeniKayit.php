<?php 
include "header.php"; 
$sorgu="select * from tblKategoriler ";
$sonuc=$db->query($sorgu);
$ks=$sonuc->num_rows;
?>

<div class="col-10 mb-5 offset-2 pl-5 mt-4 font-2">
	<form action="islem.php" method="post" enctype="multipart/form-data">
		<?php 
		if($_GET['durum']=="ok"){ 
			?>
			<div class="alert alert-success" role="alert">
				Yeni ürününüzü kaydettiniz.
			</div>
		<?php } 
		elseif($_GET['durum']=="no"){ 
			?>
			<div class="alert alert-danger" role="alert">
				Kayıt işlemi yapılamadım :( 
			</div>
		<?php } 
		else{ 
			?>
			<div class="alert alert-primary" role="alert">
				Yeni ürününüzü bu sayfadan ekleyebilirsiniz.
			</div>
		<?php } 
		?>
		<div class="row mt-4   ">
			<div class="col-2 align-self-end"> <label>Ürün Adı: </label></div>
			<div class="col-6"> 
				<input type="text" required='' autocomplete="off" name="urunAd" class="form-control font-2" placeholder="Ürün Adını Giriniz.">
			</div>
		</div>

		<div class="row mt-1 ">
			<div class="col-2 align-self-end"> <label>Ürün Açıklama: </label></div>
			<div class="col-6"> 
				<input type="text"  name="aciklama" autocomplete="off" class="form-control font-2">
			</div>
		</div>

		<div class="row mt-1 ">
			<div class="col-2 align-self-end"> <label>Ürün Fiyat: </label></div>
			<div class="col-6">
				<input type="text" autocomplete="off" name="fiyat" class="form-control font-2" required placeholder="Ürün Fiyatını Giriniz">
			</div>
		</div>

		<div class="row mt-1 ">
			<div class="col-2 align-self-end"> <label>Ürün Resim: </label></div>
			<div class="col-6" > 
				<input type="file" name="urunResim" required="" multiple accept=".jpg, .png, .gif, .jpeg">
			</div>
		</div>

		<div class="row mt-1">
			<div class="col-2 align-self-end"> <label>Kategori:  </label></div>
			<div class="col-6"> 
				<select class="form-select form-control font-2" name="mySelect" >
					<?php for($i=0;$i<$ks;$i++){
						$kayitDizi=$sonuc->fetch_assoc();
						$id=$kayitDizi["kategoriId"];
						$ad=$kayitDizi["kategoriAd"];
						?>
						<option value="<?php echo $id ?>" name="kategori"> <?php echo $ad ?> </option>
					<?php } ?>
				</select>		
			</div>
		</div>

		<div class="row mt-3">
			<div class="col-8 text-right">
				<input type="submit"  name="kaydetBtn" autocomplete="off" class="btn btn-success btn-sm" value="Kaydet">
			</div>
		</div>	
	</form>	
</div>
<?php include "footer.php"; ?>