<!DOCTYPE html>
<html lang="en">
	<?php include "head.php"; ?>
	<body>	
		<div id="khungtrang">			
			<?php include "navbar.php"; ?>
			<div id="trai"></div>
			<div class="giua">
			</div>
			<div id="phai"></div>
			<div id="duoi">				
			<br/>
			<br/>
			<h5 class="card-header">Danh sách thông tin học phần</h5>
			<?php
				if($_SESSION['quyen']=="admin")
				{
			?>
			<a href="hocphan_them.php" class="btn btn-success mb-2"><i class="fal fa-plus"></i> Thêm mới</a>
			<?php
				}
			?>
				<div class="card-body">
					<table id="bangnd" width="100%">
						<thead>
							<tr>
								<th width="5%">STT</th>
								<th width="10%">Mã HP</th>
								<th width="10%">Tên HP</th>
								<th width="10%">Số tín chỉ</th>
								<th width="10%">TX%</th>
								<th width="10%">Thi%</th>
								<?php
									
									if($_SESSION['quyen']=="admin")
									{
								?>
								<th width="10%">Sửa</th>
								<th width="10%">Xóa</th>
								<?php
									}
								?>
							</tr>
						</thead>
						<tbody id="HienThi">
							
						</tbody>
						
					</table>
					
				</div>
			</div>
		</div>
		<?php include "javascript.php"; ?>
		<script>
					db.collection("hocphan").get().then((querySnapshot) => {
						var stt=1;
						var output="";
					querySnapshot.forEach((doc) => {
								
									output+='<tr>';
									output+='<td>'+stt+'</td>';
									output+='<td>'+doc.data().MHP+'</td>';
									output+='<td>'+doc.data().TenHP+'</td>';
									output+='<td>'+doc.data().stc+'</td>';
									output+='<td>'+doc.data().TX+'</td>';
									output+='<td>'+doc.data().Thi+'</td>';
									<?php
									if($_SESSION['quyen']=="admin")
									{
									?>
									output+='<td width="5%" class="text-center"><a href="hocphan_sua.php?id='+doc.id+'"><i class="fal fa-pencil-alt"></i></a></td>';
									output+='<td width="5%" class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa học phần '+doc.data().MHP +" và tên là: "+doc.data().TenHP+' không?\')" href="hocphan_xoa.php?id='+doc.id+'"><i class="fal fa-minus-circle"></i></a></td>';
									<?php
									}
									?>
									output+='</tr>';
									stt++;
										
						});
						$('#HienThi').html(output);
						
						$(document).ready(function(){
						$('#bangnd').DataTable({
							'language': {
								'sProcessing':   'Đang xử lý...',
								'sLengthMenu':   'Hiển thị _MENU_ dòng',
								'sZeroRecords':  'Không tìm thấy dòng nào phù hợp',
								'sInfo':         'Đang xem _START_ đến _END_ trong tổng số _TOTAL_ dòng',
								'sInfoEmpty':    'Đang xem 0 đến 0 trong tổng số 0 dòng',
								'sInfoFiltered': '(được lọc từ _MAX_ dòng)',
								'sInfoPostFix':  '',
								'sSearch':       'Tìm kiếm:',
								'sUrl':          '',
								'oPaginate': {
									'sFirst':    '<i class="fad fa-arrow-alt-to-left"></i>',
									'sPrevious': '<i class="fad fa-arrow-alt-left"></i>',
									'sNext':     '<i class="fad fa-arrow-alt-right"></i>',
									'sLast':     '<i class="fad fa-arrow-alt-to-right"></i>'
								}
							}
						});
						});
						
					});
					
			
		</script>
		<script>
		</script>
		<?php include "footer.php"; ?>
	</body>
</html>