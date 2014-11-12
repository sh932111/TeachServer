var viewData = [];

function init() {
	var JoinPage = {
		id : "JoinPage",
		title : "加入課程",
		category : "StudentUtil"
	};
	var LearningPage = {
		id : "LearningPage",
		title : "數位學習",
		category : "StudentUtil"
	};
	var LearningInformationPage = {
		id : "LearningInformationPage",
		title : "學習資訊",
		category : "StudentUtil"
	};
	var InformationPage = {
		id : "InformationPage",
		title : "個人資料",
		category : "TeacherUtil"
	};
	viewData = [JoinPage,LearningPage,LearningInformationPage,InformationPage];
	setUI();
}

function setUI() {
	setPageUtil('#pgHeader','PageUtil/Header/Header.html');
	setPageUtil('#pgMain','StudentUtil/JoinPage/JoinPage.html');
	setPageUtil('#pgLeft','TeacherUtil/LeftBar/LeftBar.html');
	setPageUtil('#pgFooter','PageUtil/Footer/Footer.html');
}

function setPageUtil(page_id, page_link) {
	$.get(page_link, function(data) {
		$(page_id).html(data);
	});
}