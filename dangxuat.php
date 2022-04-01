<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Xử lý đăng xuất</title>
	</head>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Xử lý đăng xuất</h5>
				<div class="card-body">				
					<p class="card-text">Đang xử lý đăng xuất....</p>
					<?php
						//Xoá SESSTION
						unset($_SESSION['uid']);
						unset($_SESSION['email']);
						unset($_SESSION['quyen']);
						unset($_SESSION['id']);
						
					?>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
			firebase.auth().signOut();
			location.href='index.php';
		
		</script>
	</body>
</html>