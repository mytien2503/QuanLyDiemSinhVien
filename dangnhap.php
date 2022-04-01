<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"> 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/cauhinhdn.css">
</head>
<body>
		<div id="login-overlay" class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Đóng</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Đăng nhập</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="cot">
							<div class="well">
								<form action="dangnhap_xuly.php" method="post">
									<div class="form-group">
										<label for="email" class="control-label">Tài khoản</label>
										<input class="form-control" id="email" name="email" type="email" required   >
										<span class="help-block"></span>
									</div>
									<div class="form-group">
										<label for="matkhau" class="control-label">Mật khẩu</label>
										<input class="form-control" id="matkhau" name="matkhau" type="password" required  >
										<span class="help-block"></span> 
									</div>
									<button type="submit" class="btn btn-success btn-block"><i class="fad fa-sign-in-alt"></i>Đăng nhập
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php include "javascript.php"; ?>
</body>
</html>