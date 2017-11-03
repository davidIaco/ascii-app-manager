<?php
use ASCII\Http\Response;
use ASCII\Controller\Admin\FontsController;
use ASCII\Controller\Admin\charactersController;
use ASCII\Controller\Admin\SymbolsController;
use ASCII\Controller\Admin\CharactersFontsController;
use ASCII\Entity\User;
use ASCII\Entity\UserLvl;
use ASCII\Controller\Auth\AuthController;
use ASCII\Manager\Manager;

require './../vendor/autoload.php';

// $user = new User();
// $userLvl = new UserLvl();

// try {
// 	$em = require __DIR__ . '/../app/config/bootstrap.php';
	
// 	$userlvl = $em->getRepository(UserLvl::class)->findOneBy(["lvlName"=>"admin"]);
			
// 	$user->setUserLvl($userLvl);
// 	$user->setUserMail("superToto@ya.fr");
// 	$user->setUserPswd("superadmin");
// 	$userLvl->setLvlName("superadmin");
	
// 	$em->persist($user);
// 	$em->flush();
	
// 	die("content");
// } catch (Throwable $e) {
// 	die("pas content" . (string)$e);
// }

// exit;

// $user = Manager::getDoctrine()->getRepository(User::class)->findOneBy(["userMail"=>"toto@ya.fr"]);

// var_dump($user->getUserMail());
// exit;

try {	
	
	$url = ( string ) filter_input ( INPUT_SERVER, "REDIRECT_URL" );
	$action = ( string ) filter_input ( INPUT_GET, "action" );
	
	$route = [ 
			"/formation-php/web/auth" => AuthController::class,
			"/formation-php/web/admin/fonts" => FontsController::class,
			"/formation-php/web/admin/fonts/[a-zA-Z0-9-_\s]{1,32}" => CharactersFontsController::class,
			"/formation-php/web/admin/characters" => CharactersController::class,
			"/formation-php/web/admin/symbols" => SymbolsController::class
	];	
	
	foreach ( $route as $routeUrl => $className ) {
		
		$routePropre = str_replace("/", "\/", $routeUrl);
		
		if ( preg_match("/^" . $routePropre . "$/", $url)) {			
			
			$controller = new $className ();
			
			if (method_exists ( $controller, $action )) {
				
				$response = $controller->{$action} ();
				break;
			} 
		}
	}
	if (! isset ( $response )) {
		$response = new Response ();
		$response->setStatus ( 404, "Not found" );
		$response->setBody ( "Aucune route correspondante" );
	}
	header ( $response->getStatus () );
	foreach ( $response->getHeader () as $key => $value ) {
		header ( $key . ": " . $value );
	}
	
	echo $response->getBody ();
} catch ( Throwable $e ) {
	header ( "HTTP/1.1 500 Internal Server Error" );
	echo "<h1>Error: </h1>" . $e->getMessage ();
}
