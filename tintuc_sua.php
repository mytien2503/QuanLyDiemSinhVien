<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>
		<div id="khungtrang">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Sửa tin tức</h5>
				<div class="card-body">
					<form action="tintuc_sua_xuly.php" method="post">
					<input type="text" id="id" name="id" hidden />
					<input type="text" id="tk" name="tk" hidden />
					  <div class="form-group">
						<label for="mssv">Ngày đăng</label>
						<input type="text" class="form-control" id="ngaydang" name="ngaydang"></input>						
					  </div>
					  <div class="form-group">
						<label for="holot">Nội dung</label>
						<input type="text" class="form-control" id="noidung" name="noidung" required ></input>
					  </div>
					  <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Sửa đổi</button>
				</form>
				</div>
			</div>
			
			
		</div>
		<?php include "javascript.php"; ?>
		<script>
		var docRef = db.collection("tintuc").doc("<?php echo $_GET['id']; ?>");
		docRef.get().then((doc) => {
			if (doc.exists) {
				var timestamp =doc.data().ngaydang;
				let date = timestamp.toDate();
				let mm = date.getMonth()+1;
				let dd = date.getDate();
				let yyyy = date.getFullYear();
				date = dd + '/' + mm + '/' + yyyy;
				$('#id').val(doc.id);
				$('#ngaydang').val(date);
				$('#noidung').val(doc.data().noidung);
			} else {
				// doc.data() will be undefined in this case
				console.log("No such document!");
			}
		}).catch((error) => {
			console.log("Error getting document:", error);
			
		});
		</script>
		<?php include "footer.php"; ?>
		
	</body>
</html>