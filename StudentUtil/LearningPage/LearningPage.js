var userCourseArray;
var userCourseWeakArray;
var LearningPageCourseText;
var LearningPageCourseId;
var LearningPageCourseWeakText;
var LearningPageUserId;


function LearningPageInit () {
	var post_data = "username="+"bbb";
	callApi(post_data,getStudentCourseApi,function(res){
		userCourseArray = res;
		setLearningPageSelect(res.list);
	});
}

function setLearningItems(obj) {
	setLearningPageWeakSelect(userCourseArray.list[obj.selectedIndex].data_list);
	LearningPageCourseText = userCourseArray.list[obj.selectedIndex].course_name;
	LearningPageCourseId= userCourseArray.list[obj.selectedIndex].course_id;
	LearningPageUserId = userCourseArray.list[obj.selectedIndex].username;
}

function setLearningWeakItems(obj) {
	LearningPageCourseWeakText = userCourseWeakArray[obj.selectedIndex];
	showLearning(document.getElementById('LearningPageViewBoxiframe'));
}

function showLearning(obj){
	var path = "php/root/"+LearningPageUserId+"/"+LearningPageCourseId+"/"+LearningPageCourseWeakText;
	obj.setAttribute('src',path);
}

function setLearningPageSelect(list) {
	LearningPageUserId = list[0].username;
	
	document.getElementById('LearningPageViewBoxIdentity').options.length = 0;
	for (var i = 0; i < list.length; i++) {
		var title = list[i].course_name;
		var item = new Option(title);
		if (i == 0) {
			LearningPageCourseText = list[i].course_name;
			LearningPageCourseId = list[i].course_id;
		}
		item.value = LearningPageCourseId[i];
		document.getElementById('LearningPageViewBoxIdentity').options.add(item);
	}
	setLearningPageWeakSelect(list[0].data_list);
}
function setLearningPageWeakSelect(list) {
	userCourseWeakArray = list;
	document.getElementById('LearningPageViewBoxWeak').options.length = 0;
	for (var i = 0; i < list.length; i++) {
		var title = list[i].replace(".htm", "");
		var item = new Option(title);
		if (i == 0) {
			LearningPageCourseWeakText = list[i];
		}
		item.value = LearningPageCourseWeakText[i];
		document.getElementById('LearningPageViewBoxWeak').options.add(item);
	}
	showLearning(document.getElementById('LearningPageViewBoxiframe'));
}
function showBigIframe() {
	var dialogView = document.getElementById("dialogView");
	dialogView.className = "dialogShow";
	setPageUtilCallBack('#dialogView','StudentUtil/LearningDialog/LearningDialog.html',function(){
		LearningDialogInit();
	});	
}