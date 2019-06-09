<?php
	// 分页函数
	function fenye($pageStart, $pageSize, $brige) {
		require '../init.php';
		if ($brige == 'check') {
			$selSql = "select * from subwork order by date desc limit ".$pageStart*$pageSize.", ".$pageSize;
		}
		else { 
			$selSql = "select * from filemation order by date desc limit ".$pageStart*$pageSize.", ".$pageSize;
		}
		$result = mysqli_query($link, $selSql);
		$sublimdata = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $sublimdata;
	}

	// 获取总页数
	function allNums($brige) {
		require '../init.php';
		if ($brige == 'check') {
			$selSql = "select * from subwork order by date desc";
		}
		else { 
			$selSql = "select * from filemation order by date desc";
		}
		$result = mysqli_query($link, $selSql);
		$subdata = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return count($subdata);
	}

// 加载教师发布作业
	$allNums = allNums('check');
	$pageSize = 3;
	$pageStart = empty($_GET["pageNum"])?0:$_GET["pageNum"];
	if ($pageStart < 0 || $pageStart > $allNums) {
		$pageStart = 0;
	}
	$endPage = ceil($allNums/$pageSize-1); //总页数
	$_SESSION['pageStart'] = $pageStart;
	$_SESSION['endPage'] = $endPage;
	$subdata = fenye($pageStart, $pageSize, 'check');
	$_SESSION['subdata'] = $subdata;


// 加载教师上传课件
	$fallNums = allNums('file');
	$fpageSize = 3;
	$fpageStart = empty($_GET["fpageNum"])?0:$_GET["fpageNum"];
	if ($fpageStart < 0 || $fpageStart > $fallNums) {
		$fpageStart = 0;
	}
	$fendPage = ceil($fallNums/$fpageSize-1); //总页数
	$_SESSION['fpageStart'] = $fpageStart;
	$_SESSION['fendPage'] = $fendPage;
	$fsubdata = fenye($fpageStart, $fpageSize, 'file');
	$_SESSION['fsubdata'] = $fsubdata;
	
	include_once 'sindex.php';
?>