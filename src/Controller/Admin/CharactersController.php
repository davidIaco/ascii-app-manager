<?php
namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\CharactersModel;

class CharactersController extends Controller
{
	
	public function manage (): Response
	{
				
		$this->permission ();
		
// 		$this->response->addHeader("location", "/formation-php/web/auth?action=auth");
// 		return $this->response;		
		
		$model = new CharactersModel();		
		
		$model->create(( string ) filter_input (INPUT_POST, "characters_unicode_name"),
				(string) filter_input(INPUT_POST, "characters_unicode_value"));		
		
		$model->delete ((string) filter_input(INPUT_GET, "characters_unicode_value"));
		
		$model->selectAll();
		
		return  $this->render(
				"characters/manage",
				[
						"user" => array_key_exists ( "user", $_SESSION ) ? $_SESSION ["user"] ["lvl"] : null,
						"model" =>$model
				]
				);
	}
	
}
