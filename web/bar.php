<?php

// session_start();


// $userAgent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");
// $ip = filter_input(INPUT_SERVER, "REMOTE_ADDR");


// if (!$userAgent || !$ip) {
// 	header ("HTTP/1.1 500 Internal Server Error");
// 	exit;
	
// } else if ( !array_key_exists("user", $_SESSION)) {
		
// 	$_SESSION["user"] = [
// 			"userAgent"=>$userAgent,
// 			"token"=>$token,
// 			"ip"=>$ip,
// 			"time"=>$time,
// 	];
// } else if ($userAgent !== $_SESSION["user"]["userAgent"] 
// 			|| $ip !== $_SESSION["user"]["ip"]) {
				
// 			session_destroy();
// 		die("banane");
// }



// var_dump($_SESSION);

session_start();

if ( !array_key_exists("token", $_SESSION)) {
	
	$_SESSION["token"] = uniqid();
}

$token = filter_input(INPUT_POST, "token");

if ( $token && $token !== $_SESSION["token"]) {
	die ("hummm hummmm");
}

$user = filter_input(INPUT_POST, "user");
$pswd = filter_input(INPUT_POST, "pswd");

if ( $user === "sgh@ya.fr" && $pswd === "secret") {
	die("ok");
}

?>
<form action="" method="POST">
	<input name="user" />
	<input name="pswd" />
	<input type="hidden" name="token" value="<?php $_SESSION["token"]?>">
	<input type="submit" />
</form>
