<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>	
		<div id="khungtrang">			
			
			<h5 class="card-header">Xử lý sửa</h5>
		</div>
		<?php include "javascript.php"; ?>
		<script>
		var docRef = db.collection("diem").doc("<?php echo $_POST['id']; ?>");
			db.collection("diem").get().then((querySnapshot) => {
			querySnapshot.forEach((doc) => {
					db.collection("sinhvien").get().then((querySnapshot) => {
						maso = "";
						hp="";
						querySnapshot.forEach((ms) => {
							if("<?php echo $_POST['mssv']; ?>"==ms.id)
							{
								maso=ms.data().Mssv;
							}					
						})
						var hocky="<?php echo $_POST['hocky']; ?>";
						var ma=maso;
						var thi2="<?php echo $_POST['l2']; ?>";
						if(thi2=="")
							thi2=-1;
								docRef.update({
									Mssv:db.doc("sinhvien/<?php echo $_POST['mssv']; ?>"),
									MHP:db.doc("hocphan/<?php echo $_POST['mhp']; ?>"),
									Hocky:<?php echo $_POST['hocky']; ?>,
									DiemQT:<?php echo $_POST['qt']; ?>,
									DiemThi:<?php echo $_POST['thi']; ?>,
									DiemThi2:thi2
								})
								.then(() => {
									//console.log("Document successfully updated!");
									location.href="xemdiem.php?hk="+hocky+"&mssv="+ma;
								})
								.catch((error) => {
									// The document probably doesn't exist.
									console.error("Error updating document: ", error);
								});
									
				});
			});
		});
		</script>
		<?php include "footer.php"; ?>
	</body>
</html>