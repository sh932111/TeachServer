var registerApi = "php/member/register.php";
var loginApi = "php/member/login.php";
var getDepartmentApi = "php/member/get_department.php";
var addTeachCourseApi = "php/member/add_teach_course.php";
var getAllTeacherApi = "php/member/get_all_teacher.php";
var getAllTeacherApi = "php/member/get_all_teacher.php";
var getTeachCourseApi = "php/member/get_teacher_course.php";
var getStudentCourseApi = "php/member/get_student_course.php";
var addStudentCourseApi = "php/member/add_student_course.php";

function callApi(post_data,api,callback) {
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", api, true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xmlhttp.onreadystatechange = function() 
    {
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            var return_data = xmlhttp.responseText;
            var get_json = JSON.parse(return_data);
            var user_data = get_json.data;
            callback(user_data);
        }
    }
    xmlhttp.send(post_data);
}

function getNowTime() {
	var dt = new Date();
	var month = dt.getMonth()+1;
	var day = dt.getDate();
	var year = dt.getFullYear();
	var send_time = year +"/"+ month +"/"+ day + " " + dt.getHours()+":"+ dt.getMinutes()+":"+ dt.getSeconds();
	return send_time;
}

//檢查是否空值
function checkIng(text,key) {
    if (text == "") {
        alert("請輸入"+key);
        return false;
    }
    return true;
}
//換頁
function setPageUtil(page_id, page_link) {
    $(page_id).load(page_link);
}

function setPageUtilCallBack(page_id, page_link,callback) {
    $(page_id).load(page_link, function() {
        callback();
    });
}

function setPageUtilCallBackIndex(page_id, page_link,callback,resource) {
    $(page_id).load(page_link, function() {
        callback(resource);
    });
}

//取餘數
function getMathRemainder(num,resource) {
    var res = 1;
    var x = 0;
    for (var i = 0; i < num; i++) {
        if (x == resource) {
            x = 0;
            res++;
        }
        x ++;
    }
    return res;
}