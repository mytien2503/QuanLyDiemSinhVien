<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>
		<div id="khungtrang">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Thêm điểm</h5>
				<div class="card-body">
					<form  action="xemdiem_them_xuly.php" method="post">
					<input type="text" id="id" name="id" hidden />
					<input type="text" id="tk" name="tk" hidden />
					  <div class="form-group">
						<label for="mssv">MSSV</label>
						<input type="text" class="form-control" id="mssv" name="mssv" onchange="ktms();" required ></input>						
					  </div>
					  <div class="form-group">
						<label for="holot">Tên Sinh viên</label>
						<input type="text" class="form-control" id="tensv" name="tensv" readonly></input>
					  </div>
					  
					  <div class="form-group">
						<label for="lop">Mã HP</label>
						<input type="text" class="form-control" id="mhp" name="mhp" onchange="kthp();" required ></input>
					  </div>
					  
					   <div class="form-group">
						<label for="lop">Tên HP</label>
						<input type="text" class="form-control" id="tenhp" name="tenhp" disabled></input>
					  </div>
					  <div class="form-group">
						<label for="ten">Học kì</label>
						<input type="text" class="form-control" id="hocky" name="hocky" onchange="kthk();" required ></input>
					  </div>
					   <div class="form-group">
						<label for="lop">Điểm QT</label>
						<input type="text" class="form-control" id="qt" name="qt" onchange="ktqt();" required ></input>
					  </div>
					  
					  
					  <div class="form-group">
						<label for="lop">Điểm Thi1</label>
						<input type="text" class="form-control" id="thi1" name="thi1" onchange="ktt1();" required ></input>
					  </div>
					  
					  <div class="form-group">
						<label for="lop">Điểm Thi2</label>
						<input type="text" class="form-control" id="thi2" name="thi2" onchange="ktt2();"></input>
					  </div>
					  <button type="submit" class="btn btn-primary" ><i class="fal fa-save"></i> Thêm mới</button>
				</form>
				</div>
			</div>
			
			
		</div>
		<?php include "javascript.php"; ?>
		<?php include "footer.php"; ?>		
	</body>
	<script>
	//code tra ve gia tri vua duoc them
	<?php if(isset($_GET['ms']))
	{
		?>
	var travems="<?php echo $_GET['ms']; ?>";
	document.getElementById("mssv").value=travems;
	ktms();
	<?php 
	}
		?>	
	<?php if(isset($_GET['hk']))
	{
		?>
	var travehp="<?php echo $_GET['hk']; ?>";
	document.getElementById("hocky").value=travehp;
	<?php 
	}
		?>
	//-------------------------------------------------------
	function them(){
		ktms();
		kthk();
		kthp();
		ktqt();
		ktt1();
		ktt2();	
	}
	
	
	function ktms(){
					
					var ms=document.getElementById("mssv").value;
					if(ms!=""|| ms!=" ")
					{
						var out=0;
						var co=0;
						db.collection("sinhvien").get().then((querySnapshot) => {
							var ten="";
						querySnapshot.forEach((doc) => {
							if((doc.data().Mssv==ms)&&out==0)
							{
								ten+=doc.data().Holot+" "+doc.data().Ten;
								$('#tensv').val(ten);
								out++;
							}							
							});
							if(out==0)
							{
								alert("Mã sinh viên không tồn tại");
								$('#tenhp').val("");
							}
						});
					}
					else
					{
						$('#tensv').val("");
					}
				}			
				
	function kthk(){
					var out=0;
					var ms=document.getElementById("hocky").value;
					if((isNaN(ms)==true||ms==""||ms<=0)&&out==0)
					{
						alert("Học kỳ k được nhập chữ và rỗng và >0");
						out++;
					}
				}
	function kthp(){
		
					var ms=document.getElementById("mhp").value;
					if(ms!=""|| ms!=" ")
					{
						var out=0;
						var co=0;
						db.collection("hocphan").get().then((querySnapshot) => {
						querySnapshot.forEach((doc) => {
							if((doc.data().MHP==ms)&&out==0)
							{
								$('#tenhp').val(doc.data().TenHP);
								out++;
							}							
							});
							if(out==0)
							{
								alert("Mã học phần không tồn tại");
								$('#tenhp').val("");
							}
						});
					}
					else
					{
						$('#tenhp').val("");
					}
				}
	function ktqt(){
					var out=0;
					var qt=document.getElementById("qt").value;
					var thi1=document.getElementById("thi1").value;
					var thi2=document.getElementById("thi2").value;
					if(qt!="")
					{
						if((isNaN(qt)==true || isNaN(thi1)==true||isNaN(thi2)==true||qt<0||thi1<0||thi2<0||qt>10||thi1>10||thi2>10)&&out==0)
						{
							alert("QT k được nhập chữ, 0<diem<10, k rỗng");
							out++;
						}
					}else
						alert(" QT k rỗng");
						
					
				}
	function ktt1(){
					var out=0;
					var qt=document.getElementById("qt").value;
					var thi1=document.getElementById("thi1").value;
					var thi2=document.getElementById("thi2").value;
					if(thi1!="")
					{
						if((isNaN(thi1)==true||thi1<0||thi1>10)&&out==0)
						{
							alert("Thi L1 k được nhập chữ, 0<diem<10, k rỗng");
							out++;
						}
					}else
						alert(" Thi L1 k rỗng");
						
					
				}
	function ktt2(){
					var out=0;
					var qt=document.getElementById("qt").value;
					var thi1=document.getElementById("thi1").value;
					var thi2=document.getElementById("thi2").value;
					
						if((isNaN(thi2)==true||thi2<0||thi2>10)&&out==0)
						{
							alert("Thi L2 k được nhập chữ, 0<diem<10");
							out++;
						}	
				}
	</script>
</html>