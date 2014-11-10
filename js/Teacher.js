function init() {
	setUI();
}

function setUI() {
	setPageUtil('#pgHeader','PageUtil/Header/Header.html');
	setPageUtil('#pgMain','TeacherUtil/CreatePage/CreatePage.html');
	setPageUtil('#pgLeft','TeacherUtil/LeftBar/LeftBar.html');
	setPageUtil('#pgFooter','PageUtil/Footer/Footer.html');
}

function setPageUtil(page_id, page_link) {
	$.get(page_link, function(data) {
		$(page_id).html(data);
	});
}