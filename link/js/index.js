function ShowTime() {
	var time = new Date();
	var year = time.getFullYear();
	var month = time.getMonth()+1;
	var date = time.getDate();
	var week_day = time.getDay();
	var week = ["星期一","星期二","星期三","星期四","星期五","星期六","星期日"];
	var hour = time.getHours();
	var minute = time.getMinutes();
	var second = time.getSeconds();
	show_time = year+"年"+month+"月"+date+"日"+week[week_day]+"&nbsp;"+hour+":"+minute+":"+second;
	return show_time;
}
function ChangePage(cid) {
	document.getElementById(cid).style.display = 'block';
	$("[id=cid]").siblings().style.display = "none";

}