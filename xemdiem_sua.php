<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>
		<div id="khungtrang">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Sửa điểm</h5>
				<div class="card-body">
					<form action="xemdiem_sua_xuly.php" method="post">
					<input type="text" id="id" name="id" hidden />
					<input type="text" id="tk" name="tk" hidden />
					  <div class="form-group" hidden>
						<label for="mssv">Mssv</label>
						<input type="text" class="form-control" id="mssv" name="mssv"></input>						
					  </div>
					  
					  <div class="form-group" hidden>
						<label for="mssv">MHP</label>
						<input type="text" class="form-control" id="mhp" name="mhp"></input>						
					  </div>
					  
					  <div class="form-group" hidden>
						<label for="mssv">Học Kỳ</label>
						<input type="text" class="form-control" id="hocky" name="hocky"></input>						
					  </div>
					  
					  <div class="form-group">
						<label for="holot">Điểm QT</label>
						<input type="text" class="form-control" id="qt" name="qt" onchange="ktqt();"required ></input>
					  </div>
					  <div class="form-group">
						<label for="ten">Điểm Thi</label>
						<input type="text" class="form-control" id="thi" name="thi" onchange="ktt1();"required ></input>
					  </div>
					  <div class="form-group">
						<label for="lop">Điểm Thi L2</label>
						<input type="text" class="form-control" id="l2" name="l2" onchange="ktt2();"></input>
					  </div>
					  <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Sửa đổi</button>
				</form>
				</div>
			</div>
			
			
		</div>
		<?php include "javascript.php"; ?>
		<script>
		var docRef = db.collection("diem").doc("<?php echo $_GET['id']; ?>");
		docRef.get().then((doc) => {
			if (doc.exists) {
				var thi2=doc.data().DiemThi2;
				if(thi2==-1)
					thi2="";
					
				//console.log("Document data:", doc.data());
				$('#id').val(doc.id);
				$('#mssv').val(doc.data().Mssv.id);
				$('#mhp').val(doc.data().MHP.id);
				$('#hocky').val(doc.data().Hocky);
				$('#qt').val(doc.data().DiemQT);
				$('#thi').val(doc.data().DiemThi);
				$('#l2').val(thi2);				
			} else {
				// doc.data() will be undefined in this case
				console.log("No such document!");
			}
		}).catch((error) => {
			console.log("Error getting document:", error);
		});
		</script>	
		<script>
		//kiem tra
		function ktms(){
					var ms=document.getElementById("mssv").value;
					var out=0;
					var co=0;
					db.collection("sinhvien").get().then((querySnapshot) => {
						var ten;
					querySnapshot.forEach((doc) => {
							if((doc.data().Mssv==ms||ms=="")&&out==0)
							{
								out++;
							}
							
						});
						if(out==0)
							{
								alert("Mã số không tồn tại");
							}
					});
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
					var out=0;
					var co=0;
					db.collection("hocphan").get().then((querySnapshot) => {
						var ten;
					querySnapshot.forEach((doc) => {
							if((doc.data().MHP==ms||ms=="")&&out==0)
							{
								out++;
							}
							
						});
						if(out==0)
							{
								alert("Mã số không tồn tại");
							}
					});
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
		<?php include "footer.php"; ?>
	</body>
</html>