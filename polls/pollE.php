<!DOCTYPE html>

<html>

	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Project #2 - Polls</title>
		<link rel="stylesheet"  href="_css/jquery.mobile-1.1.1.css" />
		<link rel="stylesheet" href="_css/jqm-docs.css"/>
		<link rel="stylesheet" href="_css/custom.css"/>
		<script src="_js/jquery.js"></script>
		<script src="_js/jqm-docs.js"></script>
		<script src="_js/jquery.mobile-1.1.1.js"></script>
		
		<?php
			echo '<script src="_js/custom.js"></script>';
			$rootDir = "/home/deployer/apps/stroud/p2-polls";
			$adURL = "http://www.toxel.com/wp-content/uploads/2008/05/creativeadvertising11.jpg";
			require_once $rootDir . '/_code/ProcessPoll.php';
		?>
		
	</head>

<body>
	
	<div id="ad">
		<img src="<?php echo $adURL; ?>" />
	</div>

	<div data-role="page" class="type-interior">

	<div data-role="content">
		
		<div class="content-primary">

		<form action="#" method="post">

			<p class="poll-title">What percentage of the estimated 2012 federal budget will be spent on Social Security?</p>

			<div data-role="fieldcontain" class="formdetails">
			 	<input type="range" name="slider" id="slider" value="<?php if(!$response) echo 0; else echo $response; ?>" min="0" max="100" data-highlight="true" />
			
				<input type="hidden" name="poll-name" value="E">
				<input type="hidden" name="poll-answer" value="17-23">
				<input type="hidden" name="poll-correct-txt" value="Nice work! <br/><br/> Approximately 20% of the estimated 2012 federal budget is devoted to paying for Social Security, according to the federal Office of Management and Budget.">
				<input type="hidden" name="poll-incorrect-txt" value="You answered XXX%. <br/><br/> The correct answer is: Approximately 20% of the estimated 2012 federal budget is devoted to paying for Social Security, according to the federal Office of Management and Budget.">
			
			</div>
			
			<div class="ui-block-a"><button type="submit" data-theme="d">Submit</button></div>
			
			<?php if ($results != null) { ?>
			
				<div class="ui-bar ui-bar-e">

					<p><?php echo $results; ?></p>
				
				</div>
			
			<?php } ?>
			
		</form>
	
		<!--<div class="separation"></div>-->
	
		<!--<p><a href="landing.php" target="_self">GO BACK</a></p>-->
	
	</div><!--/content-primary -->		

</div><!-- /content -->
	
</div><!-- /page -->

</body>
</html>