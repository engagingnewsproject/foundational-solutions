<?php

class LinksLogging
{
		//define instance variables
		private $ipAddress, $currTime, $pageName;

		function __construct($page) 
		{
				//set instance variables
				$this->ipAddress = $_SERVER["REMOTE_ADDR"];
				$this->currTime = date("F j Y g:i:sA",time()-18000);
				$this->pageName = $page;
		}

		function __deconstruct() 
		{
				// do nothing, yet
		}

		function WriteToFile() 
		{	
				//create array of log files
				$logPath = array("_logs/LinksLogging.csv", "_logs/LinksLogging.txt");
				
				//loop through log files
				foreach($logPath as $log)
				{
					  //open file with append
						$logFile = fopen($log, 'a') or die("A problem has occurred. Please contact administrator.");
						
						//create text string to add
						$logText = $this->ipAddress . "," . $this->currTime . "," . $this->pageName . "\n";
						
						//write to file
						fwrite($logFile, $logText);
						
						//close file
						fclose($logFile);
				}
		}
}

?>