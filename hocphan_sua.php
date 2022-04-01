<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>
		<div id="khungtrang">
			<?php include "navbar.php"; ?>
			
			<div class="card mt-3">
				<h5 class="card-header">Sửa học phần</h5>
				<div class="card-body">
					<form action="hocphan_sua_xuly.php" method="post">
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
						<input type="text" class="form-control" id="stc" name="stc" onchange="ktso();" required ></input>
					  </div>
					  <div class="form-group">
						<label for="ten">%TX</label>
						<input type="text" class="form-control" id="tx" name="tx" onchange="ktso();" required ></input>
					  </div>
					  <div class="form-group">
						<label for="lop">%Thi</label>
						<input type="text" class="form-control" id="thi" name="thi" onchange="ktthi();" required ></input>
					  </div>
					  <button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Sửa đổi</button>
				</form>
				</div>
			</div>
			
			
		</div>
		<?php include "javascript.php"; ?>
		<script>
		var docRef = db.collection("hocphan").doc("<?php echo $_GET['id']; ?>");
		docRef.get().then((doc) => {
			if (doc.exists) {
				//console.log("Document data:", doc.data());
				$('#id').val(doc.id);
				$('#mhp').val(doc.data().MHP);
				$('#tenhp').val(doc.data().TenHP);
				$('#stc').val(doc.data().stc);
				$('#tx').val(doc.data().TX);
				$('#thi').val(doc.data().Thi);
			} else {
				// doc.data() will be undefined in this case
				console.log("No such document!");
			}
		}).catch((error) => {
			console.log("Error getting document:", error);
		});
		</script>
		<script>
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
				function ktso(){
					var out=0;
					var tx=document.getElementById("tx").value;
					var stc=document.getElementById("stc").value;
					var thi=document.getElementById("thi").value;
					if((isNaN(tx)==true || isNaN(thi)==true||isNaN(stc)==true||tx<0||thi<0||stc<0||tx==""||thi=="")&&out==0)
					{
						alert("STC, %TX,%Thi k được nhập chữ, >0, k rỗng");
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
		<?php include "footer.php"; ?>
	</body>
</html>