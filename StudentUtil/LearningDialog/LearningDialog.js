function LearningDialogInit() {

	var dialogView = document.getElementById("LearningDialogView");
	dialogView.addEventListener("click", function(e){
		var get = e.toElement;//.getElementsByTagName('div');
		if (get.id == "LearningDialogView") {
			dialogCancel();
		}
	});
	showLearning(document.getElementById('LearningDialogViewPageViewBoxiframe'));
	var LearningDialogViewControllerBt = document.getElementById("LearningDialogViewControllerBt");
	LearningDialogViewControllerBt.addEventListener("click", function(e){
		dialogCancel();
	});			
}

function dialogCancel() {     
	$("#dialogView").empty();
	var dialogView = document.getElementById("dialogView");
	dialogView.className = "dialogHidden";
}