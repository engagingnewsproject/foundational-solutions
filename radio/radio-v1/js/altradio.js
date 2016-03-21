	$stations = new Array("KMFA 89.5",
"KNCT 91.3",
"KHFI 96.7",
"KASE 100.7",
"KROX 101.5",
"KLZT 107.1");
	$descriptions = new Array("Classical", "Easy Listening", "Top 40", "Country", "Alternative", "Adult Hits");
	$stationurl = new Array("station1a.html", "station2a.html", "station3a.html", "station4a.html", "station5a.html", "station6a.html");
	 $num_stations = $stations.length;
  		

		 $(document).ready(function() {
			 
	$("#container h1").lettering();
	//$("#container p").('words').children("span").lettering();

for($i=0; $i<$num_stations; $i++){
	  $dialid = "#dial" + $i;
	  $stationid = "#station" + $i;
	  $("#dials").append("<div class=\"dial\" ><a href=\""+$stationurl[$i]+"\"><span class=\"label\">"+$stations[$i]+"</span><div class=\"dial-button\" id=\"dial"+$i+"\"></div><span class=\"description\">"+$descriptions[$i]+"</span><\/a><\/div>");
	   
	
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