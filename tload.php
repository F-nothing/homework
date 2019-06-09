<?php
	// 分页函数
	function fenye($pageStart, $pageSize) {
		require '../init.php';
		$selSql = "select * from subwork where name = '".$_COOKIE['name']."' order by date desc limit ".$pageStart*$pageSize.", ".$pageSize;
		$result = mysqli_query($link, $selSql);
		$sublimdata = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return $sublimdata;
	}

	// 获取总页数
	function allNums() {
		require '../init.php';
		$selSql = "select * from subwork where name = '".$_COOKIE['name']."' order by date desc";
		$result = mysqli_query($link, $selSql);
		$subdata = mysqli_fetch_all($result, MYSQLI_ASSOC);
		return count($subdata);
	}

	$allNums = allNums();
	$pageSize = 3;
	$pageStart = empty($_GET["pageNum"])?0:$_GET["pageNum"];
	if ($pageStart < 0 || $pageStart > $allNums) {
		$pageStart = 0;
	}
	$endPage = ceil($allNums/$pageSize-1); //总页数
	$_SESSION['pageStart'] = $pageStart;
	$_SESSION['endPage'] = $endPage;
	$subdata = fenye($pageStart, $pageSize);
	$_SESSION['subdata'] = $subdata;
	include_once 'tindex.php';
	
?>