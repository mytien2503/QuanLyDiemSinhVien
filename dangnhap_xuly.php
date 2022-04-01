<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Xử lý đăng nhập</title>
	</head>
	<body>
		<div class="container">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Xử lý đăng nhập</h5>
				<div class="card-body">
					<div id="KetQua">
						<p class="card-text">Đang xử lý đăng nhập....</p>
						<div class="alert alert-danger alert-dismissible fade show mb-0" role ="alert">
							<span id="ThongBao"></span>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>	
						</div>
					</div>
				</div>
			</div>
			
			<?php include "footer.php"; ?>
		</div>
		
		<?php include "javascript.php"; ?>
		<script>
		$('#KetQua').hide();
		var email='<?php echo $_POST['email']; ?>';
		var password='<?php echo $_POST['matkhau']; ?>';
		var quyen="";
		var id="";
		db.collection("sinhvien").get().then((querySnapshot) => {
						
						querySnapshot.forEach((doc) => {
								if(doc.data().email==email &&quyen=="")
								{
									quyen="hocsinh";
									id=doc.id;
								}
								
							});
							if(quyen=="")
								{
									quyen="admin";
									id="";
								}
						});
		firebase.auth().signInWithEmailAndPassword(email,password)
			.then((userCredential)=>{
				var user = userCredential.user;
				$.ajax({
					type:'POST',
					url:'dangnhap_ajax.php',
					data: {
						uid: user.uid,
						email: user.email,
						id:id,
						quyen:quyen
					},
					dataType:'text',
					success: function(response) {
						location.href='index.php';
					}
				});
			})
			.catch((error)=>{
				$('.card-text').hide();
				$('#KetQua').show();
				$('#ThongBao').html('Lỗi '+error.code+': '+error.message);
			});
		
		</script>
	</body>
</html>