<?php

namespace ASCII\Controller\Auth;

use ASCII\Controller\Controller;
use ASCII\Entity\User;
use ASCII\Manager\Manager;

class AuthController extends Controller {
	public function auth() {
		
		try {
			
			$model = new \stdClass ();
			
			if (array_key_exists ( "user", $_SESSION )) {
				throw new \Exception ( "you're already logged" );
			}
			
			if (! ($mail = filter_input ( INPUT_POST, "user_mail" )) 
					|| ! ($pswd = filter_input ( INPUT_POST, "user_pswd" )) 
					|| ! ($token = filter_input ( INPUT_POST, "token" )) 
					|| ! ($token === $_SESSION ["token"])) {
				
				throw new \RuntimeException ();
				
			} elseif (! ($user = Manager::getDoctrine ()->getRepository ( User::class )->findOneBy ( [ 
					"userMail" => $mail 
			] ))) {
				throw new \OutOfBoundsException ();
			}
			
			if (! password_verify ( $pswd, $user->getUserPswd () )) {
				throw new \OutOfBoundsException ();
			}
			$_SESSION ["user"] = [ 
					"userAgent" => filter_input ( INPUT_SERVER, "HTTP_USER_AGENT" ),
					"ip" => filter_input ( INPUT_SERVER, "REMOTE_ADDR" ),
					"time" => time (),
					"lvl" => $user->getUserLvl ()->getLvlName (),
					"id" => $user->getUserId () 
			];
			$model->success = "you are logged";
		} catch ( \OutOfBoundsException $e ) {
			$error = "Bad credentials";
		} catch ( \RuntimeException $e ) {
		} catch ( \Throwable $e ) {
			$error = $e->getMessage ();
		} finally {
			
			$model->error = isset ( $error ) ? $error : null;
			return $this->render ( "auth/auth", [ 
					"token" => $_SESSION ["token"],
					"user" => array_key_exists ( "user", $_SESSION ) ? $_SESSION ["user"] ["lvl"] : null,
					"model" => $model 
			] );
		}
	}
	public function destroy() {
		
		try {
			
			$model = new \stdClass ();
			if (! array_key_exists ( "user", $_SESSION )) {
				
				throw new \Exception ( "You are still log out" );
			}
			
			if (! ($token = filter_input ( INPUT_GET, "token" ))) {
				
				throw new \Exception ( "You should not try" );
			}
			session_destroy ();
			$_SESSION = [ ];
			session_start();
			$model->success = "you are log out";
			
		} catch ( \Throwable $e ) {
			
			$model->error = $e->getMessage ();
		} finally {
			
			return $this->render ( "auth/destroy", [ 
					
					"model" => $model,
					"user" => array_key_exists ( "user", $_SESSION ) ? $_SESSION ["user"] ["lvl"] : null,
					"token" => array_key_exists ( "user", $_SESSION ) ? $_SESSION ["token"] : null,					
					header('Refresh: 2; URL=http://localhost/formation-php/web/auth?action=auth')
					
			] );
		}
	}
}