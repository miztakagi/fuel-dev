$(function(){

	// select その他の場合の入力欄コントロール
	function selectElse(id, target){
		var v = $('#'+id+' option:selected').val();
		if(v==0){
			$("#"+target).removeClass("disp_off").prop("disabled", false);
		}else{
			$("#"+target).prop("disabled", true).addClass("disp_off");
		}
	}

});