<?php 
include "header.php"; 

$sorgu="select * from tblUrunler u, tblKategoriler k where u.kategoriId=k.kategoriId ";
$sonuc=$db->query($sorgu);
$ks=$sonuc->num_rows;

//Sayfalama Kodları: 
$kac=6;
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

<!--SİL İŞLEMLERİ -->
<script type="text/javascript">
	$(document).ready(function(){

		$(".silBtn").click(function(){
			var silinecekId=$(this).attr('silId');
			var silinecekTablo=$(this).parents('tr');

			$.ajax({
				url: 'islem.php',
				type: 'post',
				data:{silinecekId_:silinecekId},
				
				success:function(gelenCevap){					
					if(gelenCevap=="sildim"){
						swal("Silme işlemi yapıldı", "", "info");
						silinecekTablo.hide(400);
					}
					else{
						swal("Ürün silme işlemi yapılamadı:(", "","error");
					}
				}
			});
		});	
	});
	
</script>
<div class="col-10 mb-5 offset-2 " id="boy">
	<div class="row mt-5">
		<div class="col text-right">
			<button type="button" class="btn btn-success btn-sm" style="width:150px" onclick="document.location='yeniKayit.php?durum'">
				Yeni Kayıt
			</button>
		</div>
	</div>

	<div class="row mt-1">
		<div class="col">
			<table class="table" >
				<thead>
					<tr class="tblhov">
						<th>#</th>
						<th>Ürün Adı</th>
						<th>Ürün Fiyat</th>
						<th>Ürün Resim</th>
						<th>Kategori </th>
						<th></th>
						<th></th>
					</tr>
				</thead>
				<?php 

				$sorgu="select * from tblUrunler u, tblKategoriler k where u.kategoriId=k.kategoriId order by urunId limit $sayfa1, $kac";
				$sonuc=$db->query($sorgu);
				$ks=$sonuc->num_rows;

				for($i=0;$i<$ks;$i++){

					$kayitDizi=$sonuc->fetch_assoc();

					$urun_id=$kayitDizi["urunId"];
					$urunAd=$kayitDizi["urunAd"];
					$fiyat=$kayitDizi["urunFiyat"];
					$resim=$kayitDizi["urunResim"];
					$kategori=$kayitDizi["kategoriAd"]; ?>
					<tbody>
						<tr class="tblhov">
							<td><?php echo $urun_id ?></td>
							<td> <?php echo $urunAd ?></td>
							<td><?php echo $fiyat ?></td>
							<td><?php echo $resim ?></td>
							<td><?php echo $kategori ?></td>
							<td>
								<input   type='button'  silId='<?php echo $urun_id ?>' value='Sil' class='btn btn-danger btn-sm silBtn' style="width:60px;">
							</td>

							<td>
								<a href="guncelle.php?urun_id=<?php echo $kayitDizi["urunId"]; ?>&durum">
									<button type='button' class='btn btn-success btn-sm guncelleBtn' style="color:black">
										&nbspGüncelle
									</button>
								</a>
							</td>
						</tr>
					</tbody>
				<?php } ?>
			</table>
		</div>
	</div>

	<nav aria-label="Page navigation example">
		<ul class="pagination">
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
			<li class="<?php if($i==$sayfa){echo "active";} ?>">
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
<?php include "footer.php"; ?>