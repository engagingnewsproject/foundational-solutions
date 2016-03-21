// Author: Josh Rachner
// Desciption: JavaScript code for Dr Stroud - TimeTrack
// Completed: 7-3-2011

/** TRACK TIME CLASS **/

function TrackTime() {

	var timeMarker = 120;
	
	// Main Function
	this.musicPlayer = function(youTubeLinkUnder, youTubeLinkOver, stationNumber) {
		var init = 0;
		var now = new Date(); 
		tickerYear = now.getFullYear()+10;
		tickerTime = '01/01/' + tickerYear + ' 01:00 PM';
		if (!$.cookie('elapsedTime')) {
			$.cookie('elapsedTime', init);
		}
		this.writePlayer(youTubeLinkUnder, youTubeLinkOver, stationNumber);
		this.keepCounting(tickerTime, stationNumber);
	}
	
	// Writes YT Player
	this.writePlayer = function(youTubeLinkUnder, youTubeLinkOver, stationNumber) {
		var elapsedTime = 0;
		if ($.cookie('elapsedTime') != 0) {
			$.cookie('elapsedTime', parseInt($.cookie('elapsedTime')) - 1);
			elapsedTime = parseInt($.cookie('elapsedTime'));
		}
		var youTubeMedia = "";
		if (elapsedTime < timeMarker || $.cookie('stationNumber') == stationNumber) {
			youTubeMedia = youTubeLinkUnder;
		}
		else {
			youTubeMedia = youTubeLinkOver;
		}
		minVar = this.zeroPad(Math.floor(elapsedTime/60),2);
		secVar = this.zeroPad(elapsedTime%60,2);
		document.write('<embed src="' + youTubeMedia + '" hidden height="1" width="1" autostart="true" starttime="' + minVar + ':' + secVar + ':00' + '">');
	}
	
	// Pads the numbers for format XX:XX
	this.zeroPad = function(num,count) {
		var numZeropad = num + '';
		while(numZeropad.length < count) {
			numZeropad = "0" + numZeropad;
		}
		return numZeropad;
	}
	
	// Continues Counting
	this.CountBack = function(secs, stationNumber) {
		if (secs < 0) {
			return;
		}
		var seconds = parseInt($.cookie('elapsedTime')) + 1;
		$.cookie('elapsedTime', seconds);
		//document.getElementById("cntdwn").innerHTML = $.cookie('elapsedTime') + " ---- " + stationNumber + " ---- " + $.cookie('stationNumber');
		
		/** Save station at 2 minutes **/
		if (seconds >= timeMarker) {
			if ($.cookie('stationNumber') == null || $.cookie('stationNumber') == "") {
				$.cookie('stationNumber', stationNumber);
			}
		}
		
		if (CountActive)
		{
			var that = this;
			setTimeout(function(){that.CountBack(secs+CountStepper,stationNumber)}, SetTimeOutPeriod);
		}
	}
	
	// Kicks Off Counting
	this.keepCounting = function(tickerTime, stationNumber) {
		if (typeof(TargetDate)=="undefined")
			TargetDate = tickerTime;
		if (typeof(CountActive)=="undefined")
			CountActive = true;
		if (typeof(CountStepper)!="number")
			CountStepper = -1;
		CountStepper = Math.ceil(CountStepper);
		if (CountStepper == 0)
			CountActive = false;
		SetTimeOutPeriod = (Math.abs(CountStepper)-1)*1000 + 990;
		//document.write("<span id='cntdwn'></span>");
		dthen = new Date(TargetDate);
		dnow = new Date();
		if (CountStepper>0)
			ddiff = new Date(dnow-dthen);
		else
			ddiff = new Date(dthen-dnow);
		gsecs = Math.floor(ddiff.valueOf()/1000);
		this.CountBack(gsecs,stationNumber);
	}
}

/** END TRACK TIME CLASS **/
