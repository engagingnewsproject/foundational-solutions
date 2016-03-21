<html>

<head>
		<?php 
				//include the logging script
				require_once '_code/LinksLogging.php';
				
				//set the name of the page
				$page = "landing";
				
				//call logging script class
				$log = new LinksLogging($page);
				
				//execute the logging function
				$log->WriteToFile();
		?>
</head>

<body>

<h2>Don't be left out! All the cool kids are doing it.</h2>

<p><a href="article1.php">Contraversal topic #1</a></p>
<p><a href="article2.php">Contraversal topic #2</a></p>
<p><a href="article3.php">Contraversal topic #3</a></p>

<hr style="margin-top:50px">

<h4>View log files:</h4>

<p><a href="_logs/LinksLogging.csv">CSV Format</a></p>
<p><a href="_logs/LinksLogging.txt">TXT Format</a></p>

<h4>View README file:</h4>

<p><a href="README.txt">TXT Format</a></p>

</body>

</html>
