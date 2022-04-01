<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>
		<div id="khungtrang">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Thêm tin tức</h5>
				<div class="card-body">
					<form action="tintuc_them_xuly.php" method="post">
					<input type="text" id="id" name="id" hidden />
					<input type="text" id="tk" name="tk" hidden />
					  <div class="form-group">
						<label for="mssv">Ngày đăng</label>
						<input type="text" class="form-control" id="ngaydang" name="ngaydang" required  value=></input>						
					  </div>
					  <div class="form-group">
						<label for="holot">Nội dung</label>
						<input type="text" class="form-control" id="noidung" name="noidung" required ></input>
					  </div>
					  <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm mới</button>
				</form>
				</div>
			</div>
			
			
		</div>
		
		<?php include "javascript.php"; ?>
		<?php include "footer.php"; ?>
	</body>
	<script>
				var n =  new Date();
		 var y = n.getFullYear();
		var m = n.getMonth() + 1;
		var d = n.getDate();
		var date= d+"/"+m+"/"+y;
		$('#ngaydang').val(date);	
	</script>
</html>