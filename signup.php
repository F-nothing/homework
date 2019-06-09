<?php
	require 'init.php';
	require 'signup.html';
	if (isset($_POST['signup'])) {
		$newId = $_POST['username'];
		$newPword = $_POST['password'];
		$rePword = $_POST['repassword'];
		$veriCode = $_POST['verify_code'];
		$profess = $_POST['profess'];

		$reg_nId_word = "/^[a-zA-Z0-9]{6,12}$/";

		if (!preg_match($reg_nId_word, $newId)) {
			echo "<script>document.getElementById('checktl').style.display='block'</script>";
			$idreturn = 0;
		}
		else {
			$idreturn = 1;
		}

		if (!preg_match($reg_nId_word, $newPword)) {
			echo "<script>document.getElementById('checkerror').style.display='block'</script>";
			$passReturn = 0;
		}
		else {
			$passReturn = 1;
		}

		if ($newPword == $rePword) {
			$repassReturn = 1;
		}
		else {
			echo "<script>document.getElementById('checksame').style.display='block'</script>";
			$repassReturn = 0;
		}

		if(strtolower($veriCode)!=strtolower($_SESSION['vcode'])){
			echo "<script>document.getElementById('checkverify').style.display='block'</script>";
			$veRet = 0;
		}
		else {
			$veRet = 1;
		}

		if ($idreturn && $passReturn && $repassReturn && $veRet) {
			$idInserSql="insert into ".$profess."(id,pword) values('{$newId}',md5('{$newPword}'))";
			$res = mysqli_query($link,$idInserSql);
			session_start();
			$_SESSION['signupBrige'] = 1;
			$_SESSION['url'] = "index.php";
			header("location:option.php");
		}
		
	}
?>