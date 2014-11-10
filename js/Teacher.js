function onload() {
	setUI();
}

function setUI() {
	setPageUtil('#pgHeader','PageUtil/Header/Header.html');
}

function setPageUtil(page_id, page_link) {
	$.get(page_link, function(data) {
		$(page_id).html(data);
	});
}