<?php
namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\SymbolsModel;

class SymbolsController extends Controller
{
	
	public function manage (): Response
	{
		
		$this->permission ();
		
		$model = new SymbolsModel();
		
		$model->create(( string ) filter_input (INPUT_POST, "symbols_name"),
				(string) filter_input(INPUT_POST, "symbols_value"));
		
		$model->delete ((string) filter_input(INPUT_GET, "symbols_value"));
		
		$model->selectAll();
		
		return  $this->render(
				"symbols/manage",
				[
						"user" => array_key_exists ( "user", $_SESSION ) ? $_SESSION ["user"] ["lvl"] : null,
						"model" =>$model
				]
				);
	}
}