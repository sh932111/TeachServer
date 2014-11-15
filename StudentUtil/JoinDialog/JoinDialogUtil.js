function JoinDialogUtilInit(obj,data,department) {
	var tag1 = obj.getElementsByTagName('div')[2];
	var tag2 = obj.getElementsByTagName('div')[3];
	var tag3 = obj.getElementsByTagName('div')[5];
	tag1.innerHTML = "課程代號："+data.course_id;
	tag2.innerHTML = "科系："+department;
	tag3.innerHTML = data.outline;
}