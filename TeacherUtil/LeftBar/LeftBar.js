function leftBarInit() {
	var createPage = document.getElementById('CreatePage');
	addFunction(createPage);
	var managementPage = document.getElementById('ManagementPage');
	addFunction(managementPage);
	var memberPage = document.getElementById('MemberPage');
	addFunction(memberPage);
	var informationPage = document.getElementById('InformationPage');
	addFunction(informationPage);
}

function addFunction(obj) {
	obj.addEventListener("click", function(e){
		var go = "TeacherUtil/"+this.id+"/"+this.id+".html";
		setPageUtil('#pgMain',go);
    });
}