<?php

namespace ASCII\Controller;

use ASCII\Http\Response;

abstract class Controller {
	
	protected $response;
	
	public function __construct() {
		$this->response = new Response;
		
		session_start();
		
		if ( !array_key_exists("token", $_SESSION)) {
			
			$_SESSION["token"] = password_hash(uniqid(), PASSWORD_DEFAULT);
			
		} elseif (array_key_exists("user", $_SESSION)
				&& $_SESSION["user"]["ip"] !== filter_input(INPUT_SERVER, "REMOTE_ADDR")
				&& $_SESSION["user"]["userAgent"] !== filter_input(INPUT_SERVER, "HTTP_USER_AGENT")
				) {
			die("get out of my site");
		}
	}
	
	private function getTemplateName(string $template): string {
		
		return __DIR__ . "./../../app/views/" . $template . ".php";
	}
	
	protected function render(string $template, array $data): Response {
		
		$fileName= $this->getTemplateName ( $template );		
		
			if (is_file ( $fileName )) {
				
				extract($data);
				
				ob_start ();
				
				include $fileName;
				
				$outPut = ob_get_contents ();
				
				ob_end_clean ();
				
				$this->response->setBody($outPut);
				
				return $this->response;
		}
		throw new \Exception("Template: " . $template . " is not a file !!");
	}
	
	protected function permission() {
		if ( !($_SESSION["user"]["lvl"] == "superadmin") && !( $_SESSION["user"]["lvl"] == "admin") ) {
			
			return $this->redirect ();

		}
	}
	protected function redirect() {
		$this->response->addHeader("location", "/formation-php/web/auth?action=auth");
		return $this->response;
	}

}