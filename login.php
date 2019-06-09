<?php
	include_once 'init.php';
	require 'index.html';
	if (isset($_POST['submit'])) {
		$userid = $_POST['username'];
		$userpword = $_POST['password'];
		$profess = $_POST['profess'];
		$checkSql = "select * from ".$profess." where id='{$userid}' and pword=md5('{$userpword}')";
		$checkResSql = mysqli_query($link,$checkSql);
		$checkData = mysqli_fetch_assoc($checkResSql);
		if (mysqli_num_rows($checkResSql)==1) {
			setcookie('userid',$userid,time()+3600);
			setcookie('userpword',$userpword,time()+3600);
			setcookie('name',$checkData['name'],time()+3600);
			session_start();
			$_SESSION['login'] = 1;
			if ($profess == 'teacher') {
				$url = "teacher/tindex.php";
			}
			else {
				$url = "student/sindex.php";
			}
			$_SESSION['url'] = $url;
			header("location:option.php");
			
		}
		else {
			echo "<script>document.getElementById('checkerror').style.display='block'</script>";
		}
	}
	
?>