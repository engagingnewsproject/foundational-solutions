	$stations = new Array("Country", "Rock", "Jazz", "Rap", "Classical", "Pop");
	$stationurl = new Array("#country", "#rock", "#jazz", "#rap", "#classical", "#pop");
	 $num_stations = $stations.length;
  		

		 $(document).ready(function() {
			 
	$("#container h1").lettering();
	//$("#container p").('words').children("span").lettering();

for($i=0; $i<$num_stations; $i++){
	  $dialid = "#dial" + $i;
	  $stationid = "#station" + $i;
	  $("#dials").append("<div class=\"dial\" ><a href=\""+$stationurl[$i]+"\"><span class=\"label\">"+$stations[$i]+"</span><div class=\"dial-button\" id=\"dial"+$i+"\"></div><\/a><\/div>");
	   
	
	 //console.log("Dial id is" + $dialid);
	  //console.log("Station id is" + $stationid);
  $($dialid).click(function() {
	  
	  		var idnum = $(this).attr('id').charAt(4);
			//console.log($stationid);
     		$("#current-station").html("<p>"+$stations[idnum]+"</p>");
		//	alert("#names"+i)
  });
  
  $($dialid).hover(function() {
     		$(this).toggleClass("hover");
		//	alert("#names"+i);
  });
}
   
 });