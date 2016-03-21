$(document).ready(function() {
    var which = (Math.floor(Math.random() * 2) == 1) ? "<slider>" : "<choice>";
	var begin = new Date();
	var frequent = "ping";
	begin = begin.toString();
	if (!$.cookie('type2')) {
		$.cookie('type2',which);
		which = $.cookie('type2');
	}
	else {
		which = $.cookie('type2');
	}
	if (which == "<slider>") {
		$("#slider-poll").css("display","block");
		$("#choice-poll").css("display","none");
	}
	else {
		$("#slider-poll").css("display","none");
		$("#choice-poll").css("display","block");
	}
	setInterval(function(){
		$.ajax({
			type: "POST",
			url: "_code/ProcessPoll.php",
			data: { type : frequent, start : begin, render : which }
		})
	},1000);
});