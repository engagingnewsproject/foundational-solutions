#########################
#   Project 1 - Links   #
#########################

Description: 

	This code project provides a logging mechanism for the "Project 1 - Links" initiative

Notes:

	There are three components that this project provides: '_code' folder, '_logs' folder, and
	embedded code in landing/article files
	
	1. The '_code' folder contains the PHP code (filename = LinksLogging.php) that logs user data
	2. The '_logs' folder contains the log files (filenames = LinksLogging.txt, LinksLogging.csv)
	3. The embedded code is then placed inside the landing/article pages to call the logging code
	
	Additional note for bullet #2 above: The difference between the .txt and .csv files is that
	the .txt file can be viewed in the browser and the .csv file can be downloaded/viewed in excel.
	Once the user results are completed, it likely makes sense to manipulate the data in excel,
	versus trying to conduct data analysis in the text file; however, for quick viewing, the text
	file is the easiest to consume.

Instructions:

	1. Upload the '_code' folder to the root of the website
	2. Upload the '_logs' folder to the root of the website
	3. Change permissions of log files (LinksLogging.txt, LinksLogging.csv) to Read/Write (777)
	4. Ensure that the landing/article pages are at the root of the website and not in subfolders
	5. Ensure that the landing/article pages have .php extension (ex. rename 'file.html' to 'file.php')
	6. Add the following code inside the <head> tags of each landing/article page:
	
		<?php 
				//include the logging script
				require_once '_code/LinksLogging.php';
			
				//set the name of the page
				$page = "<insert-page-name>";
			
				//call logging script class
				$log = new LinksLogging($page);
			
				//execute the logging function
				$log->WriteToFile();
		?>