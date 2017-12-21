<?php
require("prepare.php"); 
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
</style>
</head>

<body>

<h1>Standard page with content</h1>
<div><span style="font-size:55px;">C</span>ontent worth commenting</div>
<br><?php 

// Show some content if user has accepted add-on
if($userOption['disqus'] == '1'){ ?>
	<i class="fa fa-commenting fa-4x" style="color:#4bffff;"aria-hidden="true"></i><br>
<?php 
	// Added exeption for styling
	if($userOption['facebook'] == '1'){ ?><br><br><br><br><br><?php } 
} 

// Show some content if user has accepted add-on
if($userOption['facebook'] == '1'){ ?>
	<i class="fa fa-facebook fa-4x" style="color:#5f92f5;" aria-hidden="true"></i>
<?php } ?>

<br><br><a href="options.php"><h2>Enable / Disable Add-ons</h2></a>

</body>
</html>

