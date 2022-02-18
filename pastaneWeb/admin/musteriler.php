<?php 
include "header.php"; 

//Sayfalama kodları:
$ksorgu="SELECT * from tblMusteriler";
$ksonuc=$db->query($ksorgu);
$ksayi=$ksonuc->num_rows;

$kac=6;
$sayfa=$_GET['sayfa'];
if ($sayfa>=1){
	$sayfa1=($sayfa*$kac)-$kac;
}
else{
	$sayfa=1;
	$sayfa1=0;
}
$sayfaSayisi=ceil($ksayi/$kac);
?>

<!-- SİL İŞLEMLERİ -->
<script type="text/javascript">
	$(document).ready(function(){

		$(".silBtn").click(function(){
			var silinecekId=$(this).attr('silId');
			var silinecekTablo=$(this).parents('tr');

			$.ajax({
				url: 'islem.php',
				type: 'post',
				data:{silinenId_:silinecekId},

				success:function(gelenCevap){
					if(true){
						silinecekTablo.hide(400);
						swal("Müşteri Silindi!", "", "info");	
					}
					else{
						swal("İşlem Başarısız", "","error");
					}
				}
			});
		});
	});
</script>

<div class="col-10 mb-5 offset-2 " id="boy">
	<div class="row mt-5">
		<div class="col text-right">
			<button type="button"  style="width:150px" class="btn btn-success btn-sm" onclick="document.location='musteriEkle.php?durum'">
				Yeni Kayıt
			</button>
		</div>
	</div>
	<div class="row mt-2">
		<div class="col">
			<table class="table" style="font-size:12px;">
				<thead>
					<tr class="tblhov">
						<th>#</th>
						<th>Ad-Soyad</th>
						<th>Mail</th>
						<th>Telefon</th>
						<th>Adres</th>
						<th>Kart No</th>
						<th></th>
						<th></th>
					</tr>
				</thead>

				<?php 
				$sorgu="select * from tblMusteriler order by musteriId limit $sayfa1, $kac";
				$sonuc=$db->query($sorgu);
				$ks=$sonuc->num_rows;
				for($i=0;$i<$ks;$i++){
					$kayitDizi=$sonuc->fetch_assoc();

					$musteriId=$kayitDizi["musteriId"];
					$AdSoyad=$kayitDizi["musteriAdSoyad"];
					$mail=$kayitDizi["musteriMail"];
					$tel=$kayitDizi["musteriTel"];
					$adres=$kayitDizi["musteriAdres"];
					$kart=$kayitDizi["musteriKart"];

					echo"<tbody>
					<tr class='tblhov'>";
					echo"<td>$musteriId</td>";
					echo"<td>$AdSoyad</td>";
					echo"<td>$mail</td>";
					echo"<td>$tel</td>";
					echo"<td>$adres</td>";
					echo"<td>$kart</td>";
				?>	<td>
					<button type='button' class="btn btn-sm btn-danger silBtn"  silId="<?php echo $musteriId?>">
						Sil
					</button>
				</td>
				<td>
					<button type='button' class="btn btn-sm btn-warning" onclick='document.location="musteriGuncelle.php?id=<?php echo $musteriId?>&durum"'>
						Güncelle
					</button>
				</td>
				<?php 	echo"</tr>
				</tbody>";
			}?>

		</table>

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

			<li class="<?php if($i==$sayfa){echo "active";}  ?>">
				<a class="page-link" href="?sayfa=<?php echo $i; ?>">
					<?php echo $i ?>
				</a>
			</li>

			<?php $i++; } ?>
			<li class="page-item">
				<a class="page-link" href="?sayfa=
				<?php 
				echo $sayfa=$sayfa+1; 
			?>">
			<span aria-hidden="true">&raquo;</span>
		</a>
	</li>
</ul>
</nav>
</div>
</div>
</div>
<?php include "footer.php"; ?>