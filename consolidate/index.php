<!DOCTYPE html>

<html>

	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Consolidate Log Files</title>
		<link rel="stylesheet"  href="consolidate/_css/jquery.mobile-1.1.1.css" />
		<link rel="stylesheet" href="consolidate/_css/jqm-docs.css"/>
		<script src="consolidate/_js/jquery.js"></script>
		<script src="consolidate/_js/jqm-docs.js"></script>
		<script src="consolidate/_js/jquery.mobile-1.1.1.js"></script>
		
		<?php

		if ($_POST["path"])
		{
			$consolidate = new ConsolidateLogs($_POST["path"], "ConsolidatedLogs");
			$linkInfo = $consolidate->ExecuteProcess();
		}

		class ConsolidateLogs
		{
			//define instance variables
			private $logPath, $logResult, $linkText, $logFiles;

			function __construct($logPathVar, $logResultVar)
			{
				//set instance variables
				$this->logPath = $logPathVar;
				$this->logResult = $logResultVar;
			}

			function ExecuteProcess()
			{	
				$linkText = "New log created";
				$linkHref = $this->logPath . "/" . $this->logResult;
				$linkStuff = "error";
				$consolidated = false;

				try
				{
					if ($handle = opendir($this->logPath)) 
					{
						while (false !== ($entry = readdir($handle))) 
						{
							if ($entry == $this->logResult . ".txt") 
							{
								$linkText = "Log already exists";
								$consolidated = true;
							}
						}
						if (!$consolidated)
						{
							$rootFile = $this->logPath . "/" . $this->logResult;
							$this->logFiles = array($rootFile . ".csv", $rootFile . ".txt");

							if ($handle = opendir($this->logPath))
							{
								while (false !== ($entry = readdir($handle)))
								{
									if (strstr($entry,"txt") != false)
									{
										$ipAddress = substr($entry,0,strlen($entry)-4);

										if (strstr($ipAddress,".") != false)
										{
											$begin = $end = "";
											$fileName = $this->logPath . "/" . $ipAddress . ".txt";
											$fileOpen = fopen($fileName, "r");
											$temp = fread ($fileOpen, filesize($fileName)); 
											fclose($fileOpen); 

											$datalines = explode("\n", $temp);
											$begin = "";

											for ($i = 0; $i < count($datalines)-1; $i++)
											{
												if ($i == 0)
												{
													$begin = $this->ExtractDate($datalines[$i]);
												}
												else 
												{
													$prev = $this->ExtractDate($datalines[$i-1]);
													$curr = $this->ExtractDate($datalines[$i]);

													if (($curr - $prev) > 2)
													{
														$this->WriteToLog($ipAddress, $this->FormatDate($begin), $this->FormatDate($prev), $prev-$begin);
														$begin = $curr;
													}
													elseif ($i == (count($datalines)-2))
													{
														$this->WriteToLog($ipAddress, $this->FormatDate($begin), $this->FormatDate($curr), $curr-$begin);
													}
												}
											}
										}
									}
								}
							}
						}
					}
					closedir($handle);
					$linkStuff = $linkText . "--" . $linkHref;
				}
				catch (Exception $e)
				{
					//do nothing, yet
				}
				return $linkStuff;
			}

			function ExtractDate($dataline)
			{
				$date = explode(",", $dataline);
				return strtotime($date[1]);
			}

			function FormatDate($date)
			{
				return date("m/d/Y g:i:s A", $date);
			}

			function WriteToLog($ipAddress, $beginStr, $endStr, $diff)
			{
				foreach($this->logFiles as $log)
				{
					$logFile = fopen($log, 'a') or die("A problem has occurred. Please contact administrator.");
					$logText = $ipAddress . "," . $beginStr . "," . $endStr . "," . $diff . "\n";
					fwrite($logFile, $logText);
					fclose($logFile);
				}
			}
		}

		?>
		
	</head>

<body>
	
	<div data-role="page" class="type-interior">

		<div data-role="content">
			
			<div class="content-primary">

				<form action="#" method="post">
				
					<h2>Consolidate Log Files</h2>

					<p class="poll-title">Enter the path to the log files below<br/><i>(exclude "/" on start and end of path)</i></p>

					<div data-role="fieldcontain" class="formdetails">
						<label for="path"><b>File Path:</b></label><br/>
						<input type="text" name="path" id="path" data-mini="true" value="p2-polls/_logs" style="width:230px;margin-top:5px;" />
					</div>
					
					<div class="ui-block-a">
						<button type="submit" id="process-logs" data-theme="d">Submit</button>
					</div>
					
					<?php	
						echo '<br/><br/><br/><br/>';
						if ($linkInfo == "error")
						{
							echo '<div><i>An error has occurred during process.<br/>Please ensure the path is correct.</i></div>';
						}						
						elseif ($linkInfo != null)
						{ 
							$link = explode("--", $linkInfo);
							echo '<div><a rel="external" href="' . $link[1] . '.txt" id="link">' . $link[0] . ' - TXT</a></div>';
							echo '<div><a rel="external" href="' . $link[1] . '.csv" id="link">' . $link[0] . ' - CSV</a></div>';
						}
					?>
					
				</form>
			
			</div>	

		</div>
	
	</div>

</body>

</html>
