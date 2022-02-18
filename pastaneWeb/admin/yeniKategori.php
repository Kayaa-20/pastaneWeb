<?php 
include "header.php"; 
$sorgu="select * from tblKategoriler ";
$sonuc=$db->query($sorgu);
$ks=$sonuc->num_rows;
?>

<!--Kategori Ekleme İşlemleri -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#kategoriKaydet").click(function() {
			kategoriAd=$("#kategoriAd").val();
			kaydet=$("#kategoriKaydet").val();
			
			$.ajax({
				url:'islem.php',
				type:'post',
				data: {kategoriAd_:kategoriAd, kategoriKaydet:kaydet},
				success:function(cevap) {
					swal("Kategori Kaydı Yapıldı",'',"success");
				}
			});
		});		
	});
</script>

<div class="col-10 mb-5 offset-2 pl-5 mt-4 font-2" >
	<div class="alert alert-primary" role="alert"> Kategori kaydını bu sayfada yapabilirsiniz.</div>
	<div class="row mt-4">
		<div class="col-2 align-self-end"> <label>Kategori Adı: </label></div>
		<div class="col-6"> 
			<input type="text" autocomplete="off" required="" id="kategoriAd" class="form-control font-2" placeholder="Kategori Adını Giriniz.">
		</div>
	</div>
	
	<div class="row mt-3">
		<div class="col-8 text-right">
			<input type="submit"  id="kategoriKaydet" class="btn btn-success btn-sm" value="Kaydet">
		</div>
	</div>
</div>

<?php include "footer.php"; ?>