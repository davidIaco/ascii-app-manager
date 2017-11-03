<?php
namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;

class CharactersFontsController extends Controller
{
	
	public function manage () {		
				
		$this->permission ();		
		
		$url = ( string ) filter_input ( INPUT_SERVER, "REDIRECT_URL" );
		var_dump($url);
		
// 		var_dump(preg_split("", $url));
	}
}