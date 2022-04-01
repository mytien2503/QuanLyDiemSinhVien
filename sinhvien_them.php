<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>
		<div id="khungtrang">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Thêm sinh viên</h5>
				<div class="card-body">
					<form action="sinhvien_them_xuly.php" method="post">
					<input type="text" id="id" name="id" hidden />
					<input type="text" id="tk" name="tk" hidden />
					  <div class="form-group">
						<label for="mssv">MSSV</label>
						<input type="text" class="form-control" id="mssv" name="mssv" onchange="ktms();" required ></input>
						
					  </div>
					  <div class="form-group">
						<label for="holot">Họ lót</label>
						<input type="text" class="form-control" id="holot" name="holot" onchange="ktholot();" required ></input>
					  </div>
					  <div class="form-group">
						<label for="ten">Tên</label>
						<input type="text" class="form-control" id="ten" name="ten" onchange="ktten();" required ></input>
					  </div>
					  <div class="form-group">
						<label for="lop">Lớp</label>
						<input type="text" class="form-control" id="lop" name="lop" onchange="ktlop();" required ></input>
					  </div>
					  <div class="form-group">
						<label for="gioitinh">Giới tính</label>
						<input type="text" class="form-control" id="gioitinh" name="gioitinh" onchange="ktgt();" required ></input>
					  </div>
					  <div class="form-group">
						<label for="ngaysinh">Ngày sinh</label>
						<input type="text" class="form-control" id="ngaysinh" name="ngaysinh" onchange="ktngay();" required ></input>
					  </div>
					   <div class="form-group">
						<label for="ngaysinh">Email</label>
						<input type="text" class="form-control" id="email" name="email" onchange="ktemail();" required ></input>
					  </div>
					  
					  <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm mới</button>
				</form>
				</div>
			</div>
			
			
		</div>
		<script>
		function ktms(){
					var ms=document.getElementById("mssv").value;
					var out=0;
					db.collection("sinhvien").get().then((querySnapshot) => {
					querySnapshot.forEach((doc) => {
							
							if((doc.data().Mssv==ms||ms=="")&&out==0)
							{
								alert("Trùng mssv trùng hoặc rỗng");
								out++;	
							}
							return false;
						});
					});
				}
		function ktholot(){
					var b=document.getElementById("holot").value;
					if(isNaN(b)==false || b=="")
						{
							alert("Họ lót k được nhập số và rỗng");
							return false;
						}
				}
		function ktten(){
					var b=document.getElementById("ten").value;
					if(isNaN(b)==false || b=="")
						{
							alert("Tên k được nhập số và rỗng");
							return false;
						}
				}
		function ktlop(){
					var b=document.getElementById("lop").value;
					if(isNaN(b)==false || b=="")
						{
							alert("Lớp k được nhập số và rỗng");
							return false;
						}
				}
		function ktgt(){
			var b=document.getElementById("gioitinh").value;
			if(isNaN(b)==true|| b=="")
				{
					if(b!="Nam"&&b!="Nữ")
						alert("Giới tính chỉ nhận giá trị (Nam/Nữ)");
				}
			
		}
		function ktngay(){
					var b=document.getElementById("ngaysinh").value;
					if(b==""||b==null)
						{
							alert("ngày k được rỗng");
							return false;
						}
				}
				
				
		function ktemail() 
		{
			var email=document.getElementById("email").value;
			var at = email.indexOf("@");
			var dot = email.lastIndexOf(".");
			var space = email.indexOf(" ");
			if ((at != -1) && //có ký tự @
				(at != 0) && //ký tự @ không nằm ở vị trí đầu
				(dot != -1) && //có ký tự .
				(dot > at + 1) && 
				(dot < email.length - 1) && 
				(space == -1)) //không có khoẳng trắng 
				{
					return true;
				}
			else if(email==""||email==" ")
			{
				alert("Email không được bỏ trống");
				return false;
			}
			else
			{
				alert("Email không đúng định dạng");
				return false;
			}
			
		}
		</script>
		<?php include "javascript.php"; ?>
		<?php include "footer.php"; ?>
	</body>
</html>