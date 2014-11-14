function JoinPageInit() {
	var post_data = "";
	callApi(post_data,getAllTeacherApi,function(data){
		console.log(data);
        
    });
	// var JoinPageViewBox = document.getElementById('JoinPageViewBox');
	// for (var i = 0; i < DepartmentsText.length; i++) {
	// 	var JoinPageViewBoxTitle = document.createElement("div");
	// 	JoinPageViewBoxTitle.className = "JoinPageViewBoxTitle";
	// 	var JoinPageViewBoxTitleItem = document.createElement("div");
	// 	JoinPageViewBoxTitleItem.className = "JoinPageViewBoxTitleItem";
	// 	var JoinPageViewBoxList = document.createElement("div");
	// 	JoinPageViewBoxList.className = "JoinPageViewBoxList";
		
	// }
}