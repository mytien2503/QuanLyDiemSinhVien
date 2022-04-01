
<nav class="navbar navbar-expand-lg  navbar-dark bg-success" >
	
	<a class="navbar-brand" href="index.php">
		<i class="fa fa-graduation-cap" aria-hidden="true" style="color:red"></i>
		Quản Lý Điểm Sinh Viên
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		
		<?php
			session_start();
			if(!isset($_SESSION['uid']))
			{
		?>	
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="dangnhap.php">
							<i class="fad fa-sign-in-alt"></i> Đăng nhập
						</a>
					</li>
				</ul>
		<?php
			}
			else
			{
		?>
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">
								<i class="fa fa-home-lg" aria-hidden="true"></i> Trang chủ
						</a>
					</li>
					
					<li class="nav-item active dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-book-user"></i> Danh sách
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="xemdssv.php">
								<i class="fa fa-user-friends" aria-hidden="true"></i> Sinh Viên
							</a>
							<a class="dropdown-item" href="hocphan.php">
								<i class="fa fa-book" aria-hidden="true"></i> Học phần
							</a>
							
							
							
							
						</div>
					</li>
					<?php 
						if($_SESSION['quyen']=="admin")
						{
					?>
					<li class="nav-item active dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<i class="fas fa-book-user"></i> Thêm mới
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="sinhvien_them.php">
								<i class="fa fa-user-plus" aria-hidden="true"></i> Thêm sinh viên
							</a>
							
							<a class="dropdown-item" href="hocphan_them.php">
								<i class="fa fa-book" aria-hidden="true"></i> Thêm học phần
							</a>
							
							<a class="dropdown-item" href="xemdiem_them.php">
								<i class="fa fa-plus-circle" aria-hidden="true"></i> Thêm điểm
							</a>
							
						</div>
					</li>
					<?php 
						}
					?>
					<?php 
						if($_SESSION['quyen']=="admin")
						{
					?>
					<li class="nav-item active">
						
						<a class="nav-link" href="xemdiem.php">
								<i class="fa fa-books" aria-hidden="true"></i> Xem điểm
						</a>
						
					</li>
					<?php 
						}else
						{
					?>
					<li class="nav-item active">
						
						<a class="nav-link" href="xemdiem_hs.php">
								<i class="fa fa-books" aria-hidden="true"></i> Xem điểm
						</a>
						
					</li>
					<?php 
						}
					?>
				<?php 
						if($_SESSION['quyen']=="admin")
						{
					?>
					<li class="nav-item active">
						
						<a class="nav-link" href="tintuc.php">
								<i class="fa fa-books" aria-hidden="true"></i> Tin tức
						</a>
						
					</li>
				<?php 
					}
				?>	
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="dangxuat.php">
							<i class="fal fa-user-graduate" style="color:Red"></i> <?php echo $_SESSION['email'] ?> </br> Quyền: <?php echo $_SESSION['quyen'] ?> [Đăng xuất]
						</a>
					</li>
			
				</ul>
				
		<?php
			}
		?>
	</div>
</nav>