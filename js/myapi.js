var registerApi = "php/member/register.php";
var loginApi = "php/member/login.php";
var getDepartmentApi = "php/member/get_department.php";
var addTeachCourseApi = "php/member/add_teach_course.php";
var getAllTeacherApi = "php/member/get_all_teacher.php";

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

function checkIng(text,key) {
    if (text == "") {
        alert("請輸入"+key);
        return false;
    }
    return true;
}
