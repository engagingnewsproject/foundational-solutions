<html>

<head>
		<?php 
				//include the logging script
				require_once '_code/LinksLogging.php';
	
				//set the name of the page
				$page = "article1";
	
				//call logging script class
				$log = new LinksLogging($page);
	
				//execute the logging function
				$log->WriteToFile();
		?>
</head>

<body>

<h2>Contraversal topic #1</h2>

<p>
		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque nisi leo, rhoncus quis facilisis ut, rutrum quis ipsum. In feugiat pretium magna et lacinia. Ut vel turpis nunc, quis euismod odio. Nunc luctus vulputate semper. Curabitur lobortis gravida tempor. Pellentesque eget justo et erat faucibus accumsan. Sed magna augue, viverra vitae feugiat eget, malesuada quis quam. Proin nec elit at est mattis consectetur. Duis aliquam aliquet eros, non vulputate mauris ultrices id. Ut ultricies arcu a ante varius a ultrices orci suscipit. Pellentesque malesuada imperdiet tristique. Duis non commodo massa. Nulla et purus lectus. Pellentesque scelerisque gravida mi, sit amet ullamcorper ipsum imperdiet ac. Aenean malesuada nunc eu orci ullamcorper non gravida sem ornare.

		Suspendisse porttitor erat sit amet ipsum hendrerit eget commodo nulla scelerisque. Nunc vulputate euismod eros, ac convallis mauris dignissim molestie. Integer gravida, urna non auctor ultricies, elit neque convallis lorem, ut rhoncus libero augue ut nisl. Donec tempus bibendum arcu eget convallis. Etiam iaculis quam id felis ultricies vitae semper enim pulvinar. Pellentesque ultricies dui non nibh egestas rutrum. Duis et augue lorem, id euismod mauris. Phasellus fringilla laoreet condimentum. Integer nec velit nisl, sed lobortis dui. Ut ac nisi justo. Vivamus at elit nec lacus tincidunt iaculis. Sed iaculis auctor facilisis. Aenean ac convallis felis.

		Praesent hendrerit, mauris et iaculis ultricies, mauris lorem feugiat justo, id consequat augue neque eget turpis. Sed diam sem, volutpat vel posuere et, placerat vel nibh. Suspendisse porttitor tristique pulvinar. Nunc at odio nulla, quis tincidunt dolor. Morbi auctor mollis mauris ut iaculis. In sodales, diam sed laoreet dignissim, felis velit porttitor felis, vitae ultrices ante leo vel neque. Nunc ornare, massa a interdum facilisis, justo arcu viverra ligula, ac semper elit elit vitae orci. Pellentesque feugiat nulla odio. Ut sed turpis nisl, non pellentesque elit.
</p>

<p>
		<a href="landing.php">Go Back</a>
</p>

</body>

</html>
