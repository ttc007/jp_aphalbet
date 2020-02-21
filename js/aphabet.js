$('#all').click(function(event) {
	checkall();
});

$("#all-label").click(function(){
	checkall();
});

function checkall() {
	if($("#all").is(':checked')){
	  $('input[type="checkbox"]').attr('checked', true);
	}else{
	  $('input[type="checkbox"]').attr('checked', false);
	}
}