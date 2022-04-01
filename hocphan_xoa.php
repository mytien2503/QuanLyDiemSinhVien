<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/cauhinh.css">
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/all.min.css" />
		
		<title>Quản lý điểm sinh viên</title>
	</head>
	<body>	
		<div id="khungtrang">			
			
			<h5 class="card-header">Xử lý Xóa</h5><!--action="trangchu.php"-->
		</div>
		<?php include "javascript.php"; ?>
		<script>
			var c ="<?php echo $_GET['id']; ?>";
			db.collection("hocphan").doc("<?php echo $_GET['id']; ?>").delete().then(() => {
			//console.log("Document successfully deleted!");
			location.href="hocphan.php";
		}).catch((error) => {
			console.error("Error removing document: ", error);
		});
		</script>
		<?php include "footer.php"; ?>
	</body>
</html>