function JoinDialogInit(data,department) {
	var post_data = "username="+data.username;
	callApi(post_data,getTeachCourseApi,function(res){
		setJoinDialogData(res.list,department,data.name,data.username);
    });

	var dialogView = document.getElementById("JoinDialogView");
	dialogView.addEventListener("click", function(e){
		var get = e.toElement;//.getElementsByTagName('div');
		if (get.id == "JoinDialogView") {
			dialogCancel();
		}
	});
}

function dialogCancel() {     
	$("#dialogView").empty();
	var dialogView = document.getElementById("dialogView");
	dialogView.className = "dialogHidden";
}

function setJoinDialogData(data,department,t_name,t_username){
	var accordionPart = document.getElementById('accordionPart');
	for (var i = 0; i < data.length; i++) {
		var li = document.createElement("li");
		var JoinDialogItemBox = document.createElement("div");
		JoinDialogItemBox.className = "JoinDialogItemBox";
		var title_div = document.createElement("div");
		title_div.className = "JoinDialogItemTitle";
		title_div.innerHTML = data[i].course_name;
		var add_div = document.createElement("div");
		add_div.className = "JoinDialogItemBt";
		var add_bt = document.createElement("img");
		add_bt.src = "img/addBt.png";
		add_div.id=i;//bug
		addJoinDialogAction(add_div,data,t_name,t_username);
		add_div.appendChild(add_bt);
		JoinDialogItemBox.appendChild(title_div);
		JoinDialogItemBox.appendChild(add_div);
		var frame_div = document.createElement("div");
		frame_div.className = "JoinDialogItemframe";
		setPageUtilCallBackIndex(frame_div,'StudentUtil/JoinDialog/JoinDialogUtil.html',function(res){
			var obj = accordionPart.getElementsByClassName("JoinDialogItemframe")[res];
			JoinDialogUtilInit(obj,data[res],department);
		},i);	

		li.appendChild(JoinDialogItemBox);
		li.appendChild(frame_div);
		accordionPart.appendChild(li);
	}
}

function addJoinDialogAction(obj,data,t_name,t_username) {
	obj.addEventListener("click", function(e){
		var time = getNowTime();
		var post_data = "username="+userRecordData.username
		+"&course_id="+data[this.id].course_id
		+"&course_name="+data[this.id].course_name
		+"&outline="+data[this.id].outline
		+"&create_time="+time
		+"&t_name="+t_name
		+"&t_username="+t_username;
		
		callApi(post_data,addStudentCourseApi,function(res){
			alert(res.message);
			if (res.result) {
				window.location.reload();
			}
	    });
	});
}
