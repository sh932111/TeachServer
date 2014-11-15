var viewData = [];
var userRecordData;

var DepartmentsText;
var DepartmentsId;

function init() {
	var data = window.sessionStorage.getItem("LearningData");
	userRecordData = JSON.parse(data);
	
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
	var post_data = "";
	callApi(post_data,getDepartmentApi,function(user_data){
		DepartmentsText = user_data.department;
		DepartmentsId = user_data.department_id;
        
    });
	setUI();
}

function setUI() {
	setPageUtil('#pgHeader','PageUtil/Header/Header.html');
	setPageUtil('#pgMain','StudentUtil/JoinPage/JoinPage.html');
	setPageUtil('#pgLeft','TeacherUtil/LeftBar/LeftBar.html');
	setPageUtil('#pgFooter','PageUtil/Footer/Footer.html');
}
