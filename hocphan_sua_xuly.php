<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>	
		<div id="khungtrang">			
			
			<h5 class="card-header">Xử lý sửa</h5>
			<?php include "footer.php";?>
		</div>
		<?php include "javascript.php"; ?>
		<script>
			
		var docRef = db.collection("hocphan").doc("<?php echo $_POST['id']; ?>");
			db.collection("hocphan").get().then((querySnapshot) => {
			querySnapshot.forEach((doc) => {			
								docRef.update({
									MHP: "<?php echo $_POST['mhp']; ?>",
									TenHP: "<?php echo $_POST['tenhp']; ?>",
									stc:<?php echo $_POST['stc']; ?>,
									TX:<?php echo $_POST['tx']; ?>,
									Thi:<?php echo $_POST['thi']; ?>
								})
								.then(() => {
									//console.log("Document successfully updated!");
									location.href="hocphan.php";
								})
								.catch((error) => {
									// The document probably doesn't exist.
									console.error("Error updating document: ", error);
								});
									
				});
			});
		</script>
		<?php include "footer.php"; ?>
	</body>
</html>