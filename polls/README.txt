#########################
#   Project 2 - Polls   #
#########################

Description: 

	This code project provides poll questions (with logging) for the "Project 2 - Polls" initiative

Notes:

	There are six components that this project provides: '_code' folder, '_css' folder, '_images'
	folder, '_js' folder, '_logs' folder, and embedded code in the poll files (ex. pollA.php)
	
	1. The '_code' folder contains the PHP code for poll logic and logging
	2. The '_css' folder contains the stylesheets for the poll files
	3. The '_images' folder contains the images used in the poll files
	4. The '_js' folder contains the JavaScript code for the poll files
	5. The '_logs' folder contains the logging files for the polls
	6. The embedded code is placed inside the poll files (ex. pollA.php)
	
	Additional note for bullet #5 above: The difference between the .txt and .csv files is that
	the .txt file can be viewed in the browser and the .csv file can be downloaded/viewed in excel.
	Once the user results are completed, it likely makes sense to manipulate the data in excel,
	versus trying to conduct data analysis in the text file; however, for quick viewing, the text
	file is the easiest to consume.
	
	The administrator of this code project should not have to modify any PHP, JS, CSS, or image files.
	The only code that needs to be modified for implementing this solution is the .php files at the
	root of the project (ex. pollA.php). Once the solution is deployed and the users are utilizing the
	polls, the other component that needs attention is the log files in the data anlysis process.

Instructions:

	1. Upload the '_code' folder to the root of the website
	2. Upload the '_css' folder to the root of the website
	3. Upload the '_images' folder to the root of the website
	4. Upload the '_js' folder to the root of the website
	5. Upload the '_logs' folder to the root of the website
	6. Change permissions of log files in '_logs' folder to R/W/E (777)
	7. Upload the pollX.php files (the baseline files provide polls for A-E)
	8. Embed an iframe in the Qualtrics survey to point directly to each poll file
	9. To create a new poll file, make a copy of A or B (depending on the type of poll)
	   and modify the following in the poll file:
	
		CHANGE TITLE (this applies for both types of polls):
		
			<p class="post-title">Enter your title here</p>
		
		CHANGE POLL ANSWERS (this is only for choice polls, replace <enter-value> text):
		
			<input type="radio" name="radio-choice" id="radio-choice-1" value="<enter-value>" <?php if ($response == "<enter-value>") {echo ' checked="checked"';} ?> />
	   	<label for="radio-choice-1">a) <enter-value>%</label>
		
			<input type="radio" name="radio-choice" id="radio-choice-2" value="<enter-value>" <?php if ($response == "<enter-value>") {echo ' checked="checked"';} ?> />
	   	<label for="radio-choice-2">a) <enter-value>%</label>
    
	    <input type="radio" name="radio-choice" id="radio-choice-3" value="<enter-value>" <?php if ($response == "<enter-value>") {echo ' checked="checked"';} ?> />
	   	<label for="radio-choice-3">a) <enter-value>%</label>
    
	    <input type="radio" name="radio-choice" id="radio-choice-4" value="<enter-value>" <?php if ($response == "<enter-value>") {echo ' checked="checked"';} ?> />
	   	<label for="radio-choice-4">a) <enter-value>%</label>
	
		CHANGE HIDDEN FIELDS (this applies to both types of polls):
		
			<input type="hidden" name="poll-name" value="<enter-poll-letter>">
			<input type="hidden" name="poll-answer" value="<enter-value>">
			<input type="hidden" name="poll-correct-txt" value="Nice work! <br/><br/> <enter-correct-response-text>">
			<input type="hidden" name="poll-incorrect-txt" value="You answered XXX%. <br/><br/> <enter-incorrect-response-text>">	
		
			Note: for open-ended polls, the second line of code above should have a range as the answer (ex. 35-41)


Additional notes (10/14):

	1. Re-upload all files to the server (you should receive a link to the zip file)
	2. Make modifications to the poll text - please see step 9 above
	3. Change the entire '_logs' directory to R/W/E (777) - please see step 6 above
	4. Modify the following files (these are critical configurations):
	
    pollX.php (lines 19 and 20): 
			$rootDir = "/home/deployer/apps/stroud/p2-polls";
			$adURL = "http://www.toxel.com/wp-content/uploads/2008/05/creativeadvertising11.jpg"; 
		
		_code/PollsLogging.php (line 17): 
			$this->rootDir = "/home/deployer/apps/stroud/p2-polls";
			
		_code/ProcessPoll.php (line 3):
			$rootDir = "/home/deployer/apps/stroud/p2-polls";

	
	