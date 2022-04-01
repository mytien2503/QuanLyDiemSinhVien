<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>
		<div id="khungtrang">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Thêm học phần</h5>
				<div class="card-body">
					<form action="hocphan_them_xuly.php" method="post">
					<input type="text" id="id" name="id" hidden />
					<input type="text" id="tk" name="tk" hidden />
					  <div class="form-group">
						<label for="mssv">Mã HP</label>
						<input type="text" class="form-control" id="mhp" name="mhp" onchange="ktmhp();" required ></input>
						
					  </div>
					  <div class="form-group">
						<label for="holot">Tên HP</label>
						<input type="text" class="form-control" id="tenhp" name="tenhp" onchange="ktten();" required ></input>
					  </div>
					   <div class="form-group">
						<label for="holot">Số tín chỉ</label>
						<input type="text" class="form-control" id="stc" name="stc" onchange="ktstc();" required ></input>
					  </div>					  
					  <div class="form-group">
						<label for="ten">%TX</label>
						<input type="text" class="form-control" id="tx" name="tx" onchange="kttx();" required ></input>
					  </div>
					  <div class="form-group">
						<label for="lop">%Thi</label>
						<input type="text" class="form-control" id="thi" name="thi" onchange="ktthi();" required ></input>
					  </div>
					  <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm mới</button>
				</form>
				</div>
			</div>
			<script>
				/*function kthp(){
					var mhp=document.getElementById("mhp").value;
					var tenhp=document.getElementById("tenhp").value;
					var tx=document.getElementById("tx").value;
					var stc=document.getElementById("stc").value;
					var thi=document.getElementById("thi").value;
					var error="";
					var out=0;
					if(out==0)
					{
						db.collection("hocphan").get().then((querySnapshot) => {
					querySnapshot.forEach((doc) => {
							
							if((doc.data().MHP==mhp||mhp="")&&out==0)
							{
								alert("Trùng mã học phần và không được trùng");
								return false;
								out++;
							}
							
						});
					});
					}else
					{
						if(isNaN(tenhp)==false || tenhp=="")
						{
							alert("Tên học phần k được nhập số v");
							return false;
						}else
					if(isNaN(tx)==true || isNaN(thi)==true||isNaN(stc)==true)
					{
						alert("STC, %TX,%Thi k được nhập chữ");
						return false;
					}else
					if(thi+tx<100 && thi<50)
					{
						alert("%TX,%Thi có tổng là 100% và %Thi không được <50");
						return false;
					}else
					{
						return (true);
						location.href="hocphan_them_xuly.php";
					}
					
					}
					
						
				}*/
				function ktmhp(){
					var mhp=document.getElementById("mhp").value;
					var out=0;
					db.collection("hocphan").get().then((querySnapshot) => {
					querySnapshot.forEach((doc) => {
							
							if((doc.data().MHP==mhp||mhp=="")&&out==0)
							{
								alert("Trùng mã học phần và không được rỗng");
								out++;	
							}
							return false;
						});
					});
				}
				function ktten(){
					var tenhp=document.getElementById("tenhp").value;
					if(isNaN(tenhp)==false || tenhp=="")
						{
							alert("Tên học phần k được nhập số và rỗng");
							return false;
						}
				}
				function ktstc(){
					var out=0;
					var tx=document.getElementById("tx").value;
					var stc=document.getElementById("stc").value;
					var thi=document.getElementById("thi").value;
					if((isNaN(stc)==true||stc<=0||stc=="")&&out==0)
					{
						alert("STC k được nhập chữ, >0, k rỗng");
						out++;
					}
				}
				function kttx(){
					var out=0;
					var tx=document.getElementById("tx").value;
					var stc=document.getElementById("stc").value;
					var thi=document.getElementById("thi").value;
					if((isNaN(tx)==true||tx<0||tx=="")&&out==0)
					{
						alert("%TX k được nhập chữ, >0, k rỗng");
						out++;
					}
				}
				
				function ktthi(){
					var out=0;
					var tx=document.getElementById("tx").value;
					var thi=document.getElementById("thi").value;
					if((isNaN(thi)==true||thi<50||thi=="")&&out==0)
					{
						alert("%Thi k được nhập chữ và >50, k rỗng");
						out++;
					}else
					if((Number(tx)+Number(thi))!=100)
						{
							alert("%Thi+%TX=100");
							//console.log(Number(tx)+Number(thi));
						}
				}
			</script>
			
		</div>
		<?php include "javascript.php"; ?>
		<?php include "footer.php"; ?>
	</body>
</html>