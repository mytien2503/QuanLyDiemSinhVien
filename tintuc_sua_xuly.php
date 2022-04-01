<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>	
		<div id="khungtrang">			
			
			<h5 class="card-header">Xử lý sửa</h5>			
		</div>
		<?php include "javascript.php"; ?>
		<script>
		
		function chuyenngay(){
			var date="<?php echo $_POST['ngaydang']; ?>";
			/*var res1 = date.replace("/", ",");
			var res2=res1.replace("/", ",")*/
			
			var ar= new Array();
			ar = date.split("/");
			var d=ar[1]+"/"+ar[0]+"/"+ar[2];
			return d;
		}
		
		var docRef = db.collection("tintuc").doc("<?php echo $_POST['id']; ?>");
			db.collection("tintuc").get().then((querySnapshot) => {
			querySnapshot.forEach((doc) => {			
								docRef.update({									
									ngaydang: firebase.firestore.Timestamp.fromDate(new Date(chuyenngay())),
									noidung:"<?php echo $_POST['noidung']; ?>",
								})
								.then(() => {
									//console.log("Document successfully updated!");
									location.href="tintuc.php";
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