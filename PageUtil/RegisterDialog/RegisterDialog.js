var RegisterViewBoxDepartmentText;
var RegisterViewBoxDepartmentId;
var RegisterViewBoxIdentityText;
var RegisterViewBoxIdentity;
//array
var RegisterViewBoxDepartments;
var RegisterViewBoxDepartmentsId;
var RegisterViewBoxIdentitys = ["學生","老師"];
var RegisterViewBoxIdentityIds = ["1","0"];

function dialogInit() {
	var post_data = "";
	callApi(post_data,getDepartmentApi,function(user_data){
		RegisterViewBoxDepartments = user_data.department;
		RegisterViewBoxDepartmentsId = user_data.department_id;
		var spinner = new getSpinner();
		spinner.loadSpinner(document.getElementById('RegisterViewBoxDepartment'),RegisterViewBoxDepartments,RegisterViewBoxDepartmentsId);
		RegisterViewBoxDepartmentText = spinner.objText;
		RegisterViewBoxDepartmentId = spinner.objId;

    });
	var spinner = new getSpinner();
	spinner.loadSpinner(document.getElementById('RegisterViewBoxIdentity'),RegisterViewBoxIdentitys,RegisterViewBoxIdentityIds);
	RegisterViewBoxIdentityText = spinner.objText;
	RegisterViewBoxIdentity = spinner.objId;

	var dialogView = document.getElementById("RegisterDialogView");
	dialogView.addEventListener("click", function(e){
		var tag = e.target.getElementsByTagName("div");
		var get = e.toElement;//.getElementsByTagName('div');
		if (get.id == "RegisterDialogView") {
			dialogCancel();
		}
	});
}

function dialogRegister() {
	var name = document.getElementById("RegisterViewBoxName").value;
	var username = document.getElementById("RegisterViewBoxUsername").value;
	var password = document.getElementById("RegisterViewBoxPassword").value;
	var password2 = document.getElementById("RegisterViewBoxPassword2").value;
	var phone = document.getElementById("RegisterViewBoxPhone").value;
	var email = document.getElementById("RegisterViewBoxEmail").value;
	if (!checkIng(name,"名字") || !checkIng(username,"帳號") || !checkIng(password,"密碼") || !checkIng(password2,"確認密碼") || !checkIng(phone,"聯絡電話") || !checkIng(email,"信箱")){
		return;
	}
	if (password != password2) {
		alert("兩次密碼不同!");
		return;
	}
	var time = getNowTime();
	var post_data = "name="+name+"&username="+username+"&password="+password+"&cellphone="+phone
	+"&email="+email+"&department="+RegisterViewBoxDepartmentText+"&department_id="+RegisterViewBoxDepartmentId
	+"&create_time="+time+"&update_time="+time+"&identity="+RegisterViewBoxIdentity;
	callApi(post_data,registerApi,function(res){
		alert(res.message);
		if (res.result) {
			dialogCancel();
		}
    });
}

function dialogCancel() {     
	$("#dialogView").empty();
	var dialogView = document.getElementById("dialogView");
	dialogView.className = "dialogHidden";
}

function setDepartment(obj) {
	RegisterViewBoxDepartmentId = RegisterViewBoxDepartmentsId[obj.selectedIndex];
	RegisterViewBoxDepartmentText = RegisterViewBoxDepartments[obj.selectedIndex];
}

function setIdentity(obj) {
	RegisterViewBoxIdentityText = RegisterViewBoxIdentitys[obj.selectedIndex];
	RegisterViewBoxIdentity = RegisterViewBoxIdentityIds[obj.selectedIndex];
}
