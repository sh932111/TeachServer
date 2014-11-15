var viewData = [];
var userRecordData;

function init() {
	var data = window.sessionStorage.getItem("LearningData");
	userRecordData = JSON.parse(data);

	var CreatePage = {
		id : "CreatePage",
		title : "新增課程",
		category : "TeacherUtil"
	};
	var ManagementPage = {
		id : "ManagementPage",
		title : "管理課程",
		category : "TeacherUtil"
	};
	var MemberPage = {
		id : "MemberPage",
		title : "課程人員",
		category : "TeacherUtil"
	};
	var InformationPage = {
		id : "InformationPage",
		title : "個人資料",
		category : "TeacherUtil"
	};
	viewData = [CreatePage,ManagementPage,MemberPage,InformationPage];
	setUI();
}

function setUI() {
	setPageUtil('#pgHeader','PageUtil/Header/Header.html');
	setPageUtil('#pgMain','TeacherUtil/CreatePage/CreatePage.html');
	setPageUtil('#pgLeft','TeacherUtil/LeftBar/LeftBar.html');
	setPageUtil('#pgFooter','PageUtil/Footer/Footer.html');
}

