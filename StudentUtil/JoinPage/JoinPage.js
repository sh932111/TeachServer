
function JoinPageInit() {
	var post_data = "";
	callApi(post_data,getAllTeacherApi,function(data){
        var JoinPageViewBox = document.getElementById('JoinPageViewBox');
        var index = -1;

		for (var i = 0; i < DepartmentsText.length; i++) {
			var JoinPageViewBoxTitle = document.createElement("div");
			JoinPageViewBoxTitle.className = "JoinPageViewBoxTitle";
			var JoinPageViewBoxTitleItem = document.createElement("div");
			JoinPageViewBoxTitleItem.className = "JoinPageViewBoxTitleItem";
			JoinPageViewBoxTitleItem.innerHTML = DepartmentsText[i];
			var JoinPageViewBoxList = document.createElement("div");
			JoinPageViewBoxList.className = "JoinPageViewBoxList";
			var data_array = data.list;
			JoinPageViewBoxList.style.height = getMathRemainder(data_array.length,4) * 40 + "px";
			for (var x = 0; x < data_array.length; x++) {
				var department_id = data_array[x].department_id;
				if (department_id == DepartmentsId[i]) {
					index ++;
					var JoinPageViewBoxListItems = document.createElement("div");
					JoinPageViewBoxListItems.className = "JoinPageViewBoxListItems";
					var link = document.createElement("a");
					var name = data_array[x].name;
					link.innerHTML = name;
					link.id = index;
					link.name = i;
					link.href = "#";
					link.addEventListener("click", function(e){
						linkTeacher(this,data_array);
				    });
					JoinPageViewBoxListItems.appendChild(link);
					JoinPageViewBoxList.appendChild(JoinPageViewBoxListItems);
				}
			}
			JoinPageViewBoxTitle.appendChild(JoinPageViewBoxTitleItem);
			JoinPageViewBox.appendChild(JoinPageViewBoxTitle);
			JoinPageViewBox.appendChild(JoinPageViewBoxList);
		}
    });
}
function linkTeacher(obj,data_array) {
	var dialogView = document.getElementById("dialogView");
	dialogView.className = "dialogShow";
	setPageUtilCallBack('#dialogView','StudentUtil/JoinDialog/JoinDialog.html',function(){
		JoinDialogInit(data_array[obj.id],DepartmentsText[obj.name]);
	});	
}
