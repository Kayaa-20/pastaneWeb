<?php
error_reporting(0);
include "header.php";

$kategoriSorgu="select kategoriAd from tblKategoriler where kategoriId='1'";
$sorguSonuc=$db->query($kategoriSorgu);
$row=$sorguSonuc->fetch_assoc();
$kategoriAd=$row['kategoriAd'];

$sorgu="select * from tblUrunler where kategoriId='1'";
$sonuc=$db->query($sorgu);
$ks=$sonuc->num_rows;

$kac=12;
$sayfa=$_GET['sayfa'];
	if ($sayfa>=1){ 
			$sayfa1=($sayfa*$kac)-$kac;
	}
	else{
		$sayfa=1;
		$sayfa1=0; 
	}

$sayfaSayisi=ceil($ks/$kac);
?>

<?php include 'baslangıc.php'; ?>

<!-- İÇERİK -->
<div class="container">
	<div class="row m-5">

		<?php 
		$sorgu_2="select * from tblUrunler where kategoriId='1' order by urunId limit $sayfa1, $kac";
		$sonuc_2=$db->query($sorgu_2);
		$ksayi=$sonuc_2->num_rows;
		for($i=0; $i<$ksayi; $i++){
			$veriDizi=$sonuc->fetch_assoc();
			$urunResim=$veriDizi['urunResim'];
			$urunAd=$veriDizi['urunAd'];
			$urunFiyat=$veriDizi['urunFiyat'];
			$urunId=$veriDizi['urunId'];
		?>

			<div class=" col-sm-5 col-md-3 p-4 " >
				<div class="row border rounded text-center">

					<div class="col-12 p-0" >
						<img src="../<?php echo $urunResim ?>" class="img-fluid">
					</div>
					<div class="col-12 pt-2 icerik" >
						<?php echo $urunAd; ?>
					</div>
					<div class="col-12 pb-2 icerik">
						<?php echo $urunFiyat; ?> TL 
					</div>
					<div class="col pb-2 icerik" >	
						<?php if(!isset($_SESSION["musteriAd"])){ ?>
							<button type="button" class="btn btn-block btn-secondary" onclick="buton()">
								Sepete Ekle
							</button>	
						<?php }
						else{?>	
							<button type="button" class="btn btn-block btn-secondary"  onclick="document.location='../admin/islem.php?sepet&id=<?php echo $urunId;?>&islem'">
								Sepete Ekle
							</button>
							<?php
							if($_GET['ekle']=='ok'){?>
								<script>
									swal("Sepete Eklediniz!",'',"success");
								</script>
								<?php }
						} ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<nav class="m-5 pl-3">
		<ul class="pagination ">
			<li class="page-item">
				<a class="page-link" href="?sayfa=
					<?php 
					      if($sayfa>1){ 
					      	echo $sayfa=$sayfa-1;
					      }	
					      else {echo $sayfa=1;}
					  ?>">
					  <span aria-hidden="true">&laquo;</span>
				</a>
			</li>
				<?php 
				$i=1; 
				while($i<=$sayfaSayisi){
					?>

			<li class="<?php if($i==$sayfa){echo "active";}  ?>">
				<a class="page-link" href="?sayfa=<?php echo $i; ?> "><?php echo $i ?></a>
			</li>
			<?php $i++; } ?>

			<li class="page-item">
				<a class="page-link" href="?sayfa=
					<?php 
						if($sayfa>=1){
							echo $sayfa=$sayfa+1;}		   
					?>">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
</div>

<script type="text/javascript">
	function buton(){
		swal("Giriş Yapmadınız!",'Ürünü sepete eklemek için ilk önce giriş yapmalısınız.!',"warning");
	}
</script>

<?php include "footer.php"; ?>