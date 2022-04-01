<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>	
		<div id="khungtrang">			
			<?php include "navbar.php"; ?>
			<div id="trai"></div>
			<div class="giua">
			<div class="thongtin">
					<tr>
						<h5 class="card-header">Thông tin sinh viên</h5>
					</tr>
					<tr>
						<table id="thongtin">
								<thead>								
								</thead>
								<tbody id="thongtin">
								</tbody>
								
						</table>
					</tr>
					<br/>
					<br/>
					<div>
						<tr>Học kỳ<input type="text" id="hocky" name="hocky" required /></tr>
						<tr><input type="button" name="btnXacNhan" value="Tìm kiếm" onclick="timsinhvien();"/></tr>
					</div>
				</div>
			</div>
			<div id="phai"></div>
			<div id="duoi">				
			<br/>
			<br/>
			<h5 class="card-header">Danh sách điểm sinh viên</h5>
			
			 
			
				<div class="card-body">
					<table id="bangnd" width="100%">
						<thead>
							<tr>
								<th width="10%">STT</th>
								<th width="15%">Tên HP</th>
								<th width="5%">STC</th>
								<th width="10%">%TX</th>
								<th width="5%">%Thi</th>
								<th width="10%">ĐiểmQT</th>
								<th width="5%">Thi</th>
								<th width="5%">ThiL2</th>
								<th width="10%">TK</th>
								<th width="10%">XL</th>								
							</tr>
						</thead>
						<tbody id="HienThi">
							
						</tbody>
						<tbody id="test">
							
						</tbody>
						
					</table>
				</div>
				<a id="tb10" color="red" ></br></a>
				<a id="tb4" color="red" ></br></a>
				<a id="stcd" color="red" ></a>
				
				<a id="tb10tl" color="red" ></br></a>
				<a id="tb4tl" color="red" ></br></a>
				<a id="stcdtl" color="red" ></a>
			</div>
		</div>
		<?php include "javascript.php"; ?>										
		<script>
			
			function show_list(idsv,hk)
			{					    					
				db.collection("diem").get().then((querySnapshot) => {
					var stt=1;
					var output="";
					var t2;
					var t3;
					var tk;
					var tb;
					var xh;
					var tenhp="";
					var tx="";
					var thi="";
					var stc="";
					var tong=0;
					var tongstc=0;
					var tongtc=0;
					var trungbinh=0;
					var tb10=0;
					querySnapshot.forEach((doc) => {						
						if(doc.data().Mssv.id==idsv && hk==doc.data().Hocky )
						{
							db.collection("hocphan").get().then((querySnapshot) => {						
								querySnapshot.forEach((doc_hp) => {
									if(doc_hp.id==doc.data().MHP.id)
									{
										tenhp=doc_hp.data().TenHP;
										tx=doc_hp.data().TX;
										thi=doc_hp.data().Thi;
										stc=doc_hp.data().stc;	
									
										console.log(tenhp)
										t2=doc.data().DiemThi2;
										t3=doc.data().DiemThi3;
										if(t2==-1)
											t2="";
										if(t3==-1)
											t3="";
										//tb=(doc.data().DiemThi+doc.data().DiemQT)/2
										
										if(thi==100)
											tb=doc.data().DiemThi*(thi/100);
										else
											tb=doc.data().DiemQT*(tx/100)+doc.data().DiemThi*(thi/100);
										

										if(tb<4 || doc.data().DiemThi==0 )
										{
											tk=doc.data().DiemQT*(tx/100)+t2*(thi/100);
										}
										else
										{
											if(tb<t2)
												tk=t2;
											else
												tk=tb;
										}
																													
										
										if(doc.data().DiemThi==0&&t2=="")
										{
											xh="F";
										}else
										if(tk>=8.5)
										{
											xh="A";
										}else if(tk>=7.0)
										{
											xh="B";
										}else if(tk>=5.5)
										{
											xh="C";
										}
										else if(tk>=4.0)
										{
											xh="D";
										}else
											xh="F";
										
										//Tinh diem tb
										if(xh=='A')
										{
											tong+=4*stc;
											tongstc+=stc;
										}										
										else if(xh=='B')
										{
											tong+=3*stc;
											tongstc+=stc;
										}												
										else if(xh=='C')
										{
											tong+=2*stc;
											tongstc+=stc;
										}											
										else if(xh=='D')
										{
											tong+=1*stc;
											tongstc+=stc;
										}											
										else
											tong+=0*stc;
										
										tongtc+=stc;
										trungbinh+=tk*stc;
										
										output+='<tr>';
												output+='<td>'+stt+'</td>';
												output+='<td>'+tenhp+'</td>';
												output+='<td>'+stc+'</td>';						
												output+='<td>'+tx+'</td>';
												output+='<td>'+thi+'</td>';					
												output+='<td>'+doc.data().DiemQT+'</td>';
												output+='<td>'+doc.data().DiemThi+'</td>';
												output+='<td>'+t2+'</td>';
												output+='<td>'+tk+'</td>';
												output+='<td>'+xh+'</td>';
											output+='</tr>';							
										stt++;
										$('#HienThi').html(output);
									}							
								});
								tb10="Điểm trung bình học kỳ hệ 10: "+parseFloat(trungbinh/tongtc).toFixed(2);
								output2 ="Điểm trung bình học kỳ hệ 4: "+parseFloat(tong/tongtc).toFixed(2);
								var tongstcd="Số tín chỉ đạt: "+tongstc;
								$('#tb10').html(tb10+'</br>');
								$('#tb4').html(output2+'</br>');
								$('#stcd').html(tongstcd+'</br>');
							});								
						}
												
					});							
				});		
			}

			function tichluy(idsv){
				db.collection("diem").get().then((querySnapshot) => {
					var stt=1;
					var output="";
					var t2;
					var t3;
					var tk;
					var tb;
					var xh;
					var tenhp="";
					var tx="";
					var thi="";
					var stc="";
					var tongtl=0;
					var tongstctl=0;
					var tongtctl=0;
					var trungbinhtl=0;
					var tb10tl=0;
					var output2tl="";
					querySnapshot.forEach((doc) => {						
						if(doc.data().Mssv.id==idsv)
						{							
							db.collection("hocphan").get().then((querySnapshot) => {						
								querySnapshot.forEach((doc_hp) => {
									if(doc_hp.id==doc.data().MHP.id)
									{
										tenhp=doc_hp.data().TenHP;
										tx=doc_hp.data().TX;
										thi=doc_hp.data().Thi;
										stc=doc_hp.data().stc;	
										
										console.log(tenhp)
										t2=doc.data().DiemThi2;
										if(t2==-1)
											t2="";
										//tb=(doc.data().DiemThi+doc.data().DiemQT)/2
										
										if(thi==100)
											tb=doc.data().DiemThi*(thi/100);
										else
											tb=doc.data().DiemQT*(tx/100)+doc.data().DiemThi*(thi/100);
										

										if(tb<4 || doc.data().DiemThi==0 )
										{
											tk=doc.data().DiemQT*(tx/100)+t2*(thi/100);
										}
										else
										{
											if(tb<t2)
												tk=t2;
											else
												tk=tb;
										}
																													
										
										if(doc.data().DiemThi==0&&t2=="")
										{
											xh="F";
										}else
										if(tk>=8.5)
										{
											xh="A";
										}else if(tk>=7.0)
										{
											xh="B";
										}else if(tk>=5.5)
										{
											xh="C";
										}
										else if(tk>=4.0)
										{
											xh="D";
										}else
											xh="F";
										
										
										//Tinh diem tb
										if(xh=='A')
										{
											tongtl+=4*stc;
											tongstctl+=stc;
										}										
										else if(xh=='B')
										{
											tongtl+=3*stc;
											tongstctl+=stc;
										}												
										else if(xh=='C')
										{
											tongtl+=2*stc;
											tongstctl+=stc;
										}											
										else if(xh=='D')
										{
											tongtl+=1*stc;
											tongstctl+=stc;
										}											
										else
											tongtl+=0*stc;
										
										tongtctl+=stc;
										
										trungbinhtl+=tk*stc;
									}
																	
								});								
								tb10tl="Điểm trung bình tích lũy hệ 10: "+parseFloat(trungbinhtl/tongtctl).toFixed(2);
								output2tl ="Điểm trung bình tích lũy hệ 4: "+parseFloat(tongtl/tongtctl).toFixed(2);
								var tongstcdtl="Số tín chỉ tích lũy: "+tongstctl;
								$('#tb10tl').html(tb10tl+'</br>');
								$('#tb4tl').html(output2tl+'</br>');
								$('#stcdtl').html(tongstcdtl+'</br>');
							});								
						}
												
					});							
				});	
				
			}


			
			function timsinhvien(){
					show_list(idsv,document.getElementById("hocky").value);
					tichluy(idsv);
			}
			
			
			var idsinhvien;
					
			var idsv="<?php echo $_SESSION['id'] ?>";
				db.collection("sinhvien").get().then((querySnapshot) => {
				var output="";
				var out=0;
				
				querySnapshot.forEach((doc) => {
					if(doc.id==idsv)
					{
						output+='<tr>';
							output+='<th>Mã sinh viên: <hr/>'+doc.data().Mssv+'</th><br>';
							output+='<th >Họ tên: <hr/>'+doc.data().Holot+' '+doc.data().Ten+'</th><br>';
							output+='<th>Tên lớp: <hr/>'+doc.data().Lop+'</th>';
						output+='</tr>';
					}	
					});
					$('#thongtin').html(output);
					//nap lại danh sach
					
				});		
		</script>
		<?php include "footer.php"; ?>
	</body>
</html>
