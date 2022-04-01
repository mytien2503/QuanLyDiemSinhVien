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
			var date="<?php echo $_POST['ngaysinh']; ?>";
			/*var res1 = date.replace("/", ",");
			var res2=res1.replace("/", ",")*/
			
			var ar= new Array();
			ar = date.split("/");
			var d=ar[1]+"/"+ar[0]+"/"+ar[2];
			return d;
		}	
			
						
			
		var docRef = db.collection("sinhvien").doc("<?php echo $_POST['id']; ?>");
			db.collection("sinhvien").get().then((querySnapshot) => {
			querySnapshot.forEach((doc) => {			
								docRef.update({
									Mssv: "<?php echo $_POST['mssv']; ?>",
									Holot: "<?php echo $_POST['holot']; ?>",
									Ten:"<?php echo $_POST['ten']; ?>",
									Lop:"<?php echo $_POST['lop']; ?>",
									Gioitinh:"<?php echo $_POST['gioitinh']; ?>",
									Ngaysinh: firebase.firestore.Timestamp.fromDate(new Date(chuyenngay())),
									email: "<?php echo $_POST['email']; ?>"
								})
								.then(() => {
									//console.log("Document successfully updated!");
									location.href="xemdssv.php";
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