var loginIdentityId = "1";

function setindxeBox(obj) {
	loginIdentityId = obj.value;
}

function register() {
	var dialogView = document.getElementById("dialogView");
	dialogView.className = "dialogShow";
	setPageUtil('#dialogView','PageUtil/RegisterDialog/RegisterDialog.html');
}

function login() {	
	var username = document.getElementById("indxeBoxUsername").value;
	var password = document.getElementById("indxeBoxPassword").value;	
	if (!checkIng(username,"帳號") || !checkIng(password,"密碼") ){
		return;
	}
	var time = getNowTime();
	var post_data = "&username="+username+"&password="+password+"&update_time="+time+"&identity="+loginIdentityId;
	callApi(post_data,loginApi,function(user_data){
		alert(user_data.message);
		if (user_data.result) {

		}
	});
}