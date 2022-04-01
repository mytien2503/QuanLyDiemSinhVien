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
			<h5 class="card-header">Tin tức</h5>
			<a href="tintuc_them.php" class="btn btn-success mb-2"><i class="fal fa-plus"></i> Thêm mới</a>
				<div class="card-body">
					<table id="bangnd" width="100%">
						<thead>
							<tr>
								<th width="5%">STT</th>
								<th width="15%">Ngày đăng</th>
								<th width="70%">Nội dung</th>
								<th width="5%">Sửa</th>
								<th width="5%">Xóa</th>
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
					db.collection("tintuc").orderBy('ngaydang',"desc").get().then((querySnapshot) => {
						var stt=1;
						var output="";
					querySnapshot.forEach((doc) => {
								
									var timestamp =doc.data().ngaydang;
									let date = timestamp.toDate();
									let mm = date.getMonth()+1;
									let dd = date.getDate();
									let yyyy = date.getFullYear();

									date = dd + '/' + mm + '/' + yyyy;
									output+='<tr>';
									output+='<td>'+stt+'</td>';
									output+='<td>'+date+'</td>';
									output+='<td>'+doc.data().noidung+'</td>';									
									output+='<td width="5%" class="text-center"><a href="tintuc_sua.php?id='+doc.id+'"><i class="fal fa-comment-alt-edit"></i></a></td>';
									output+='<td width="5%" class="text-center"><a onclick="return confirm(\'Bạn có muốn xóa tin tức đăng ngày '+date +' không?\')" href="tintuc_xoa.php?id='+doc.id+'"><i class="fal fa-comment-alt-minus"></i></a></td>';
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
		<?php include "footer.php"; ?>
	</body>
</html>