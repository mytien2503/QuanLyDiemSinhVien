<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>	
		<div id="khungtrang">			
			
			<h5 class="card-header">Xử lý thêm</h5>
			<?php include "footer.php";?>
		</div>
		<?php include "javascript.php"; ?>
		<script>
			var tb=0;
				db.collection("sinhvien").get().then((querySnapshot) => {
					mssv = "";
					ms="";
					querySnapshot.forEach((doc) => {
						if("<?php echo $_POST['mssv']; ?>"==doc.data().Mssv)
						{
							mssv = doc.id;
							ms=doc.data().Mssv;
						}					
					})
					db.collection("hocphan").get().then((querySnapshot) => {
						mhp = "";
						hp="";
						querySnapshot.forEach((doc) => {
							if("<?php echo $_POST['mhp']; ?>"==doc.data().MHP)
							{
								mhp = doc.id;
								hp=doc.data().MHP;
							}					
						})
						var hk=<?php echo $_POST['hocky']; ?>;
						var thi="<?php echo $_POST['thi1']; ?>";
						if(thi=="")
								 thi=0;
						var thi2="<?php echo $_POST['thi2']; ?>";
						if(thi2=="")
								 thi2=-1;
						
						db.collection("diem").add({
							Mssv:db.doc("sinhvien/"+mssv),
							MHP:db.doc("hocphan/"+mhp),
							Hocky:hk,
							DiemQT:<?php echo $_POST['qt']; ?>,
							DiemThi:Number(thi),
							DiemThi2:Number(thi2)
							})
						.then(() => {
							//console.log("Document successfully updated!");
							location.href="xemdiem_them.php?ms="+ms+"&hk="+hk+"";
						})
						.catch((error) => {
							// The document probably doesn't exist.
							console.error("Error updating document: ", error);
						});
						
					})
				})
		</script>
		<?php include "footer.php"; ?>
	</body>
</html>