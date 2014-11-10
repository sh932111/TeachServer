function ajs_upload()
{
	var item = document.getElementById('usernameItem');

	item.value = "qqq";

	$("#ajaxForm").ajaxSubmit({
		beforeSubmit: function(){

		},
		success: function(resp,st,xhr,$form) {
			if(resp!="err") {
			
			}
			else {

			}
		}
	});
}