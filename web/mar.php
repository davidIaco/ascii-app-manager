<?php

$pswd = [
		"fifi",
		"riri",
		"secret",
		"loulou",
];


$url = "http://localhost/formation-php/web/bar.php";

foreach ( $pswd as $val) {
	
	$body = file_get_contents($url, false, stream_context_create( [
			
			$data = [
					"user" => "sgh@ya.fr",
					"pswd" => $val,
					"token" => "?"
			],
			
			"http" => [
					"method" => "POST",
					"header" => "Content-type: application/x-www-form-urlencoded",
					"content" => http_build_query($data)
			]
	]));
	var_dump($body);
	
}

