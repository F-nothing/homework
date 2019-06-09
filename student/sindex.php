<?php
	header('Content-type:text/html;charset = utf-8');
	require 'sindex.html';
	require '../init.php';
	require 'sload.php';
	// 上传课件
	if (isset($_POST['upload_sub'])) {
		$object = $_POST['object'];
		$name = $_POST['name'];
		$note = $_POST['note'];
		$date = date('Y-m-d H:i:s');
		$times = $_POST['times'];

		$selemajor = $_POST['selemajor'];
		$majorArr = array("../upload/student/software/class"=>"soft","../upload/student/xx/class"=>"xx");
		$seleclass = $_POST['seleclass'];
		$seletimes = $_POST['seletimes'];
		$loadpath = (string)$selemajor."".(string)$seleclass."".(string)$seletimes."/";
		echo $loadpath;
		// $extension = end($temp);     // 获取文件后缀名
		if ($_FILES["file"]["error"] > 0)
		{
			echo "<script>alert('上传异常：" . $_FILES["file"]["error"] . "')</script>";
		}
		else if (($_FILES["file"]["size"] / 1048576)>=20) {
			echo "<script>alert('文件超过20M，上传失败。')</script>";
		}
		else {
			$file_name = $_FILES["file"]["name"];
			$file_type = $_FILES["file"]["type"];
			$file_size = ($_FILES["file"]["size"] / 1024) . " kB";
			$file_path = $loadpath."". $_FILES["file"]["name"];

			// echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
			// echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
			// echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			// echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		
			$uploadfileSql = "insert into suploadfile(object,name,note,date,times) values('{$object}','{$name}','{$note}','{$date}','{$times}')";

			$filemationSql = "insert into filemation(object,filename,filetype,filesize,filetmpname,profess,note,date,name) values('{$object}','{$file_name}','{$file_type}','{$file_size}','{$file_path}','学生','{$note}','{$date}','{$name}')";
			$ufsRes = mysqli_query($link,$uploadfileSql) or die(mysqli_error( $link ));
			$fmsRes = mysqli_query($link,$filemationSql) or die(mysqli_error( $link ));

			// 判断当期目录下的 upload 目录是否存在该文件
			// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
			$tmp_brige = 0;
			if (file_exists($loadpath."". $_FILES["file"]["name"])) {
				echo "<script>alert('".$_FILES["file"]["name"] . " 文件已经存在。 ')</script>";
				$tmp_brige = 1;
			}
			else {
				// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下    iconv("UTF-8", "gb2312","../upload/"   防止中文乱码
				if ((move_uploaded_file($_FILES["file"]["tmp_name"], iconv("UTF-8", "gb2312",$loadpath."". $_FILES["file"]["name"]))) && $fmsRes && $ufsRes) {
					echo "<script>alert('上传成功')</script>";
					// echo "文件存储在: " . "../upload/student/class1/" . $_FILES["file"]["name"];
				}
				else {
					echo "<script>alert('上传失败')</script>";
					if ($tmp_brige) {
						unlink($file_path);
						// if (!unlink($file_path)) {
						// 	echo "<script>alert('删除失败')</script>";
						// }
						// else {
						// 	echo "<script>alert('删除成功')</script>";
						// }
					}
				}		
			}
		}
	}

	// 压缩
	if (isset($_POST['zip'])) {
		$_SESSION['zipfpath'] = $_POST['zip'];
		require '../zip.php';
	}
?>