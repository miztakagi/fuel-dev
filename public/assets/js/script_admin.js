$(function(){
	$('#exe').on("click",function(){
		alert("GO");
	});
	$('#clear').on("click",function(){
		alert("CLEAR");
		$("input[name=q]").val('');
	});

});