$(document).ready(function() {
    var which = (Math.floor(Math.random() * 2) == 1) ? "<advertisement>" : "<poll>";
	var begin = new Date();
	var frequent = "ping";
	begin = begin.toString();
	if (which == "<advertisement>")
	{
		$(".type-interior").css("display","none");
		$("#ad").css("display","block");
	}
	else
	{
		$(".type-interior").css("display","block");
		$("#ad").css("display","none");
	}
	setInterval(function(){
		$.ajax({
			type: "POST",
			url: "_code/ProcessPoll.php",
			data: { type : frequent, start : begin, render : which }
		})
	},1000);
	
});