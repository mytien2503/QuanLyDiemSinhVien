<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>	
		<div id="khungtrang">			
			
			<h5 class="card-header">Xử lý thêm</h5>
			
		</div>
		<?php include "javascript.php"; ?>
		<script>
		var tb=0;
		function chuyenngay(){
			var date="<?php echo $_POST['ngaydang']; ?>";
			/*ar res1 = date.replace("/", ",");
			var res2=res1.replace("/", ",")*/
			
			var ar= new Array();
			ar = date.split("/");
			var d=ar[1]+"/"+ar[0]+"/"+ar[2];
			return d;
		}
		db.collection("tintuc").get().then((querySnapshot) => {
			querySnapshot.forEach((doc) => {
								if(tb==0)
								{
									db.collection("tintuc").add({
									ngaydang:  firebase.firestore.Timestamp.fromDate(new Date(chuyenngay())),
									noidung:"<?php echo $_POST['noidung']; ?>"
								})
								.then((docRef) => {
									//console.log("Document written with ID: ", docRef.id);
									location.href="tintuc.php";
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