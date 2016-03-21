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
		<script src="_js/custom-advertise.js"></script>
		<script src="_js/jquery.cookie.js"></script>
		
		<?php
			$rootDir = "/home/deployer/apps/stroud/p2-polls";
			$adURL = "http://www.toxel.com/wp-content/uploads/2008/05/creativeadvertising11.jpg";
			require_once $rootDir . '/_code/ProcessPoll.php';
		?>
		
	</head>

<body>
	
	<div id="ad">
		<img src="<?php echo $adURL; ?>" width="485px" height="230px" />
	</div>
		
	<div data-role="page" class="type-interior">

		<div data-role="content">
			
			<div class="content-primary">

				<form action="#" method="post">

					<?php if ($results == null) { ?>
					
						<p class="poll-title">
							What percentage of Americans say that the 2010 healthcare law recently upheld by the Supreme Court will make things better for them?
						</p>

						<div data-role="fieldcontain" class="formdetails">
						
							<input type="range" name="slider" id="slider" value="<?php if(!$response) echo 0; else echo $response; ?>" min="0" max="100" data-highlight="true" />
							
							<input type="hidden" name="slider-poll-name" value="A">
							<input type="hidden" name="slider-poll-answer" value="35-41">
							<input type="hidden" name="slider-poll-correct-txt" value="Nice work! <br/><br/> Approximately 38% of Americans say that the 2010 healthcare law recently upheld by the Supreme Court will make things better for them, according to Gallup. In addition, 42% say that it will make things worse and 13% say that it will make no difference.">
							<input type="hidden" name="slider-poll-incorrect-txt" value="You answered XXX%. <br/><br/> The correct answer is: Approximately 38% of Americans say that the 2010 healthcare law recently upheld by the Supreme Court will make things better for them, according to Gallup. In addition, 42% say that it will make things worse and 13% say that it will make no difference.">
							
						</div>
						
						<div class="ui-block-a"><button type="submit" data-theme="d">Submit</button></div>
					
					<?php } else { ?>
					
						<div class="ui-bar ui-bar-e">

							<p><?php echo $results; ?></p>
							<p><a href="pollA-Advertisement.php" rel="external">Back to poll</a></p>
						
						</div>
					
					<?php } ?>
					
				</form>
			
			</div><!--/content-primary -->		

		</div><!-- /content -->
	
	</div><!-- /page -->

</body>

</html>
