<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>	
		<div id="khungtrang">			
			<?php include "navbar.php"; ?>
			<table> 
				<tbody id="tintuc">
				</tbody>
			</table>
			<!--code vao day ve viet phan than-->
		</div>
		<?php include "javascript.php"; ?>
		<script>
			
		//do du lieu len
			var output="";
			db.collection("tintuc").orderBy('ngaydang',"desc").get().then((querySnapshot) => {
			querySnapshot.forEach((doc) => {
						var timestamp =doc.data().ngaydang;
						let date = timestamp.toDate();
						let mm = date.getMonth()+1;
						let dd = date.getDate();
						let yyyy = date.getFullYear();
						date = dd + '/' + mm + '/' + yyyy;
						
						output+='<tr>';
							output+='<th>'+doc.data().noidung+"<br/><p id='ngaydangtin'> --Ngày đăng: "+date+'</p></th><hr/><hr/>';
						output+='</tr>';
				});
				$('#tintuc').html(output);
			});
			
			
		</script>
		<?php include "footer.php"; ?>		
	</body>
</html>