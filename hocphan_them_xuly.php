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
		db.collection("hocphan").get().then((querySnapshot) => {
			querySnapshot.forEach((doc) => {
								if(tb==0)
								{
									db.collection("hocphan").add({
									MHP: "<?php echo $_POST['mhp']; ?>",
									TenHP: "<?php echo $_POST['tenhp']; ?>",
									stc :<?php echo $_POST['stc']; ?>,
									TX:<?php echo $_POST['tx']; ?>,
									Thi:<?php echo $_POST['thi']; ?>
								})
								.then((docRef) => {
									//console.log("Document written with ID: ", docRef.id);
									location.href="hocphan.php";
								})
								.catch((error) => {
									console.error("Error adding document: ", error);
								});
								tb++;
								}
								
				});
			});
		</script>
		<?php include "footer.php"; ?>
	</body>
</html>