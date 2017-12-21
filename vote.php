<?php

/// Setting up variables and cookie name.
$id = $_POST['id'];
$action = $_POST['action'];
$cookie_name = '1stBitcoinOption' . $id;

/// Now update the cookie upon the call. Sets it for one year.
if($action=='vote_up'){
	$votes_up = '1';
	$cookie_value= '1';
	setcookie($cookie_name, $cookie_value, time() + (86400 * 365.25), "/"); // 86400 = 1 day

}elseif($action=='vote_down'){	
	$votes_down = '0';
	$cookie_value= null;
	setcookie($cookie_name, $cookie_value, time() + (86400 * 365.25), "/"); // 86400 = 1 day
}

/// Returns (DONE)
if($votes_up){
	echo 'Enabled :)';
}

if($votes_down=='0'){
	echo "Disabled";
}

?>