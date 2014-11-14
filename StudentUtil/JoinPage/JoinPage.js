function JoinPageInit() {
	var post_data = "";
	callApi(post_data,getAllTeacherApi,function(data){
        var JoinPageViewBox = document.getElementById('JoinPageViewBox');
		for (var i = 0; i < DepartmentsText.length; i++) {
			var JoinPageViewBoxTitle = document.createElement("div");
			JoinPageViewBoxTitle.className = "JoinPageViewBoxTitle";
			var JoinPageViewBoxTitleItem = document.createElement("div");
			JoinPageViewBoxTitleItem.className = "JoinPageViewBoxTitleItem";
			JoinPageViewBoxTitleItem.innerHTML = DepartmentsText[i];
			var JoinPageViewBoxList = document.createElement("div");
			JoinPageViewBoxList.className = "JoinPageViewBoxList";
			var data_array = data.list;
			JoinPageViewBoxList.style.height = getMathRemainder(data_array.length) * 40 + "px";
			for (var x = 0; x < data_array.length; x++) {
				var department_id = data_array[x].department_id;
				if (department_id == DepartmentsId[i]) {
					var JoinPageViewBoxListItems = document.createElement("div");
					JoinPageViewBoxListItems.className = "JoinPageViewBoxListItems";
					var link = document.createElement("a");
					var name = data_array[x].name;
					link.innerHTML = name;
					link.id = i;
					link.name = x;
					link.href = "#";
					link.addEventListener("click", function(e){
						linkTeacher(this);
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
function getMathRemainder(num) {
	var res = 1;
	var x = 0;
	for (var i = 0; i < num; i++) {
		if (x == 4) {
			x = 0;
			res++;
		}
		x ++;
	}
	return res;
}
function linkTeacher(obj) {
	
}
