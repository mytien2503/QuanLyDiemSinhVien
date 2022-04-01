<?php
	session_start();
	//Lấy thông tin từ đăng nhập_xuly.php gửi qua
	if(isset($_POST['uid'])&& isset($_POST['email']))
	{
		//Đăng ký SESSTION
		$_SESSION['uid']=$_POST['uid'];
		$_SESSION['email']=$_POST['email'];
		$_SESSION['quyen']=$_POST['quyen'];	
		$_SESSION['id']=$_POST['id'];
		return true;
	}
	else
	{
		return false;
	}
?>