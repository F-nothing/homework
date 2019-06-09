function ChangePage(cid) {
	id = "#" + cid;
	$(id).show();
	$(id).siblings().hide();
}