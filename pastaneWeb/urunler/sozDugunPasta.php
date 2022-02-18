<?php 
include "header.php";

$kategoriSorgu="select kategoriAd from tblKategoriler where kategoriId='9'";
$sorguSonuc=$db->query($kategoriSorgu);
$row=$sorguSonuc->fetch_assoc();
$kategoriAd=$row['kategoriAd'];
$sorgu="select * from tblUrunler where kategoriId='9'";
$sonuc=$db->query($sorgu);
$ks=$sonuc->num_rows;
?>
<?php include 'baslangıc.php'; ?>
<!-- İÇERİK -->
<div class="container">
	<div class="row m-5">
		<?php for($i=0; $i<$ks; $i++){
			$veriDizi=$sonuc->fetch_assoc();
			$urunResim=$veriDizi['urunResim'];
			$urunAd=$veriDizi['urunAd'];
			$urunFiyat=$veriDizi['urunFiyat'];
		?>

			<div class=" col-sm-5 col-md-3 p-4 " >
				<div class="row border rounded text-center">
					<div class="col-12 p-0" >
						<img src="../<?php echo $urunResim ?>" class="img-fluid">
					</div>
					<div class="col-12 pt-2 icerik" ><?php echo $urunAd; ?></div>
					<div class="col-12 pb-2 icerik"><?php echo $urunFiyat; ?> TL </div>
					<div class="col pb-2 icerik" >
						<button type="button" class="btn btn-block btn-secondary">
							Sepete Ekle
						</button>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>

<!--FOOTER -->
<?php  include "footer.php"?>

</body>
</html>
