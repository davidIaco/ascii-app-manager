<?php
namespace ASCII\Controller\Admin;

use ASCII\Controller\Controller;
use ASCII\Http\Response;
use ASCII\Model\FontsModel;

class FontsController extends Controller
{
		
	public function read (): Response
	{
		
		if ( !($_SESSION["user"]["lvl"] == "superadmin") && !( $_SESSION["user"]["lvl"] == "admin") ) {
			
			$this->response->addHeader("location", "/formation-php/web/auth?action=auth");
			return $this->response;
		}
		
		$model = new FontsModel();
		$model->selectAll();		
		
		return  $this->render(
				"fonts/read",
				[
					"user" => array_key_exists ( "user", $_SESSION ) ? $_SESSION ["user"] ["lvl"] : null,
					"model" => $model
				]
		);
	}
	
	public function create (): Response
	{
		
		$this->permission ();
		
		if ($_SESSION["user"]["lvl"] == "admin") {
			$this->response->addHeader("location", "/formation-php/web/admin/fonts?action=read");
			return $this->response;
		}
		
		$model = new FontsModel();
		
		$model->create(( string ) filter_input (INPUT_POST, "fonts_name"),
						(int) filter_input(INPUT_POST, "fonts_line_height"));	
		
		return  $this->render(
				"fonts/create",
				[
					"model" =>$model
				]
		);
	}
	
	
	
}
