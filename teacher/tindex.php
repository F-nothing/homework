<?php
	header('Content-type:text/html;charset = utf-8');
	include_once 'tindex.html';
	require '../init.php';
	include_once 'tload.php';

	// 查看发布----------------------------------------------------------
	if (isset($_POST['release_sub'])) {
		$object = $_POST['object'];
		$name = $_POST['name'];
		$content = $_POST['content'];
		$date = date('Y-m-d H:i:s');
		$times = $_POST['times'];
		$userid = $_COOKIE['userid'];

		$subCSql = "insert into subwork(teachid,object,content,name,date,times) values('{$userid}','{$object}','{$content}','{$name}','{$date}','{$times}')";
		$subIRes = mysqli_query($link,$subCSql) or die(mysqli_error( $link ));
;
		if ($subIRes) {
			echo "<script>alert('发布成功')</script>";
		}
		else {
			echo "<script>alert('发布失败')</script>";
		}
	}

	// 修改作业历史-------------------------------------------------------
	if (isset($_POST['his-upd'])) {
		echo "<script>alert('改不了，哈哈哈哈哈哈哈')</script>";
	}

	// 删除作业历史-------------------------------------------------------
	if (isset($_POST['his-del'])) {
		echo "<script>alert('删除不了，哈哈哈哈哈哈哈')</script>";
	}

	// 查看人数----------------------------------------------------------
	if (isset($_POST['checkload'])) {

		// 计算目标文件夹文件数量
		function getFileNumber($dir) {
			$files = array();
		    if(@$handle = opendir($dir)) { //注意这里要加一个@，不然会有warning错误提示：）
		        while(($file = readdir($handle)) !== false) {
		            if($file != ".." && $file != ".") { //排除根目录；
		                if(is_dir($dir."/".$file)) { //如果是子文件夹，就进行递归
		                    $files[$file] = getFileNumber($dir."/".$file);
		                } else { //不然就将文件的名字存入数组；
		                    $files[] = $file;
		                }
		            }
		        }
		        closedir($handle);
		        return $files;
		    }
		}

		$selemajor = $_POST['selemajor'];
		$majorArr = array("../upload/student/software/class"=>"soft","../upload/student/xx/class"=>"xx");
		$seleclass = $_POST['seleclass'];
		$seletimes = $_POST['seletimes'];
		$downpath = (string)$selemajor."".(string)$seleclass."".(string)$seletimes."/";
		// $downpath = "W:/PHPWAMP_IN3/wwwroot/jquery_check/Checkboxes/upload/student/software/class1/first";
		$allpepres = mysqli_query($link,"select pepnum from class where profess = '".$majorArr[$selemajor]."' and class = ".$seleclass);
		$allpep = mysqli_fetch_all($allpepres,MYSQLI_ASSOC);
		$subyet = count(getFileNumber($downpath))?count(getFileNumber($downpath)):0;		
		$subnot = $allpep[0]['pepnum'] - $subyet;
		$_SESSION['zippath'] = $downpath;
		$_SESSION['downpath'] = $downpath."download.zip";

		$pepcount = "
		<script type = 'text/javascript'>
			$('#allpep').text('".$allpep[0]['pepnum']."');
			$('#subyet').text('".$subyet."');
			$('#subnot').text('".$subnot."');
		</script>";
		echo $pepcount;
	}

	// 压缩--------------------------------------------------------------
	if (isset($_POST['zip'])) {
		require '../zip.php';
	}

	// 上传课件----------------------------------------------------------
	if (isset($_POST['upload_sub'])) {
		$object = $_POST['object'];
		$name = $_POST['name'];
		$note = $_POST['note'];
		$date = date('Y-m-d H:i:s');
		$times = $_POST['times'];

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
			$file_path = "../upload/teacher/". $_FILES["file"]["name"];

			// echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
			// echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
			// echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
			// echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";
		
			$uploadfileSql = "insert into tuploadfile(object,name,note,date,times) values('{$object}','{$name}','{$note}','{$date}','{$times}')";

			$filemationSql = "insert into filemation(object,filename,filetype,filesize,filetmpname,profess,note,date,name) values('{$object}','{$file_name}','{$file_type}','{$file_size}','{$file_path}','老师','{$note}','{$date}','{$name})";
			$ufsRes = mysqli_query($link,$uploadfileSql) or die(mysqli_error( $link ));
			$fmsRes = mysqli_query($link,$filemationSql) or die(mysqli_error( $link ));

			// 判断当期目录下的 upload 目录是否存在该文件
			// 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
			$tmp_brige = 0;
			if (file_exists("../upload/teacher/" . $_FILES["file"]["name"])) {
				echo "<script>alert('".$_FILES["file"]["name"] . " 文件已经存在。 ')</script>";
				$tmp_brige = 1;
			}
			else {
				// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下    iconv("UTF-8", "gb2312","../upload/"   防止中文乱码
				if ((move_uploaded_file($_FILES["file"]["tmp_name"], iconv("UTF-8", "gb2312","../upload/teacher/" . $_FILES["file"]["name"]))) && $fmsRes && $ufsRes) {
					echo "<script>alert('上传成功')</script>";
					echo "文件存储在: " . "../upload/teacher/" . $_FILES["file"]["name"];
				}
				else {
					echo "<script>alert('上传失败')</script>";
					// 如果数据上传失败但文件上传成功，则提示失败并删除已上传文件
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
?>