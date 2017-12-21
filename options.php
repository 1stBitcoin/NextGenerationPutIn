<?php
require("prepare.php"); 
?>  
<!DOCTYPE html>
<html lang="en">
<head>

<title>Settings page</title>

<!-- CSS & JS & Optional tracker -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<style>
.votespad {
	font-size: 21px;
	vertical-align: middle;
	margin-left: -6px;
	margin-top: -2px;
	background-color: white;
	-moz-border-radius: 6px;
	-webkit-border-radius: 6px;
	border-radius: 6px;
	display: inline-block;
	border: 2px solid #3168E8;
	color: #000;
	padding: 7px 7px 5px;
}

</style>
</head>
<body>

<br><br>
	<h1>Put in / Out:</h1>


<span class='votespad' style="background-color: #4bffff;"><div style="text-align: center"><i class="fa fa-commenting" aria-hidden="true"></i>&nbsp;Discus comments:&nbsp;
<!--						/// set new ID! -->
<span class='votespad'><div class='votes_count' id="votes_countdisqus"><?php 
if(!$userOption['disqus'] or $userOption['disqus'] == '0'){
	echo 'Disabled';  
}elseif($userOption['disqus'] == '1'){
	echo 'Enabled';  
				/// set new ID!
} ?><span class='vote_buttons' id="vote_buttonsdisqus">
<?php if($userOption['disqus'] == '1'){
	echo '<a href="javascript:;" class="vote_down" id="disqus"><i class="recaplogo fa fa-minus-circle i_thumbs fa-lg" style="color:red;"></i></a>';
}else{
	echo '<a href="javascript:;" class="vote_up" id="disqus"><i class="recaplogo fa fa-check-square-o i_thumbs fa-lg" style="color:green;"></i></a>';
} ?></span></div></div></span><br>





<span class='votespad' style="background-color: #5f92f5;"><div style="text-align: center"><i class="fa fa-facebook-official" aria-hidden="true"></i>&nbsp;Facebook components:&nbsp;
<!--						/// set new ID! -->
<span class='votespad'><div class='votes_count' id="votes_countfacebook"><?php 
if(!$userOption['facebook'] or $userOption['facebook'] == '0'){
	echo 'Disabled';  
}elseif($userOption['facebook'] == '1'){
	echo 'Enabled';  
				/// set new ID!
} ?><span class='vote_buttons' id="vote_buttonsfacebook">
<?php if($userOption['facebook'] == '1'){
	echo '<a href="javascript:;" class="vote_down" id="facebook"><i class="recaplogo fa fa-minus-circle i_thumbs fa-lg" style="color:red;"></i></a>';
}else{ 
	echo '<a href="javascript:;" class="vote_up" id="facebook"><i class="recaplogo fa fa-check-square-o i_thumbs fa-lg" style="color:green;"></i></a>';
} ?></span></div></div></span><br>






<br>
<a href="index.php"><h2>index</h2></a>


</body>

<script>
$(function(){
	$("a.vote_up").click(function(){
	//get the id
	the_id = $(this).attr('id');
	
	// show the spinner
	$(this).parent().html("<i class='fa fa-spinner fa-spin'></i>");
	
	//fadeout the vote-count 
	$("span#votes_count"+the_id).fadeOut("fast");
	
	//the main ajax request
		$.ajax({
			type: "POST",
			data: "action=vote_up&id="+$(this).attr("id"),
			url: "vote.php",
			success: function(msg)
			{
				$("div#votes_count"+the_id).html(msg);
				//fadein the result 
				$("div#votes_count"+the_id).fadeIn();
				//remove the spinner
				$("span#vote_buttons"+the_id).remove();
			}
		});
	});
	
	$("a.vote_down").click(function(){
	//get the id
	the_id = $(this).attr('id');
	
	// show the spinner
	$(this).parent().html("<i class='fa fa-spinner fa-spin'></i>");
	
	//the main ajax request
		$.ajax({
			type: "POST",
			data: "action=vote_down&id="+$(this).attr("id"),
			url: "vote.php",
			success: function(msg)
			{
				$("div#votes_count"+the_id).html(msg);
				//fadein the result
				$("div#votes_count"+the_id).fadeIn();
				//remove the spinner
				$("span#vote_buttons"+the_id).remove();
			}
		});
	});
});

</script>

</html>