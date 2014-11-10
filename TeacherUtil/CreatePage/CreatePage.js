
function CreatePageInit() {
	var obj = document.getElementById('CreatePageAddView');
	obj.addEventListener("click", function(e){
		addCreatePageView();
    });

}

function addCreatePageView() {
	var accordionPart = document.getElementById('accordionPart');

	var li = document.createElement("li");
	var box_div = document.createElement("div");
	box_div.className = "CreatePageItem";
	var title_div = document.createElement("div");
	title_div.className = "CreatePageItemTitle";
	var edit_div = document.createElement("div");
	edit_div.className = "CreatePageItemBt";
	var delete_div = document.createElement("div");
	delete_div.className = "CreatePageItemBt";
	var edit_bt = document.createElement("img");
	edit_bt.src = "img/editBt.png";
	var delete_bt = document.createElement("img");
	delete_bt.src = "img/deleteBt.png";

	createPageAddDelete(delete_div);

	edit_div.appendChild(edit_bt);
	delete_div.appendChild(delete_bt);
	box_div.appendChild(title_div);
	box_div.appendChild(edit_div);
	box_div.appendChild(delete_div);

	var frame_div = document.createElement("div");
	frame_div.className = "CreatePageItemframe";
	
	li.appendChild(box_div);
	li.appendChild(frame_div);
	accordionPart.appendChild(li);
	
	$(frame_div).hide();
	$(edit_div).hover(function(){
		$(this).addClass('qa_title_on');
	}, function(){
		$(this).removeClass('qa_title_on');
	}).click(function(){
		var get_root = $(this.parentNode.parentNode)[0];
		var frame = get_root.getElementsByTagName('div')[4];
		$(frame).slideToggle();
	});
}

function createPageAddDelete(obj) {
	obj.addEventListener("click", function(e){
		var accordionPart = document.getElementById('accordionPart');
		accordionPart.removeChild(this.parentNode.parentNode);	
    });
}

