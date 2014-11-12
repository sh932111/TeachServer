var CreatePageDepartments;
var CreatePageDepartmentsIds;

function setCreatePageUtilSelectInit() {
	var post_data = "";
	callApi(post_data,getDepartmentApi,function(user_data){
		CreatePageDepartments = user_data.department;
		CreatePageDepartmentsIds = user_data.department_id;
	});
}

function setCreatePageUtilSelectItems (){
	var obj = document.getElementById('accordionPart');
	var obj_select = obj.getElementsByTagName('select');
	var get_obj = obj_select[obj_select.length - 1];

	get_obj.options.length = 0;
	for (var i = 0; i < CreatePageDepartments.length; i++) {
		var item = new Option(CreatePageDepartments[i]);
		item.value = i;
		get_obj.options.add(item);
	}
}