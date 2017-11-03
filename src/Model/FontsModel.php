<?php
namespace ASCII\Model;

use ASCII\Manager\Manager;
use PDO;

class FontsModel 
{
	
	public function create ( string $fontsName, int $fontsLineHeight) {
		
		if ( !$fontsName || !$fontsLineHeight) {
			return;
		}
		
		try {
			
			$sth = Manager::getPDO()->prepare(
					"INSERT INTO
					`fonts`( `fonts_name`, `fonts_line_height`)
					VALUES (:fonts_name, :fonts_line_height)"
			);			
			
			$sth->bindValue ( ":fonts_name", $fontsName);
			$sth->bindValue ( ":fonts_line_height", $fontsLineHeight);
			$sth->execute ();
			
			$this->success = $fontsName . " has been created";
			
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
	
	public function selectAll () {
		
		try {
			$sth = Manager::getPDO()->prepare(
					"SELECT`fonts_name` FROM `fonts`");
			$sth->execute();
			$this->results = $sth->fetchAll(PDO::FETCH_OBJ);			
			
		} catch (\Throwable $e) {
			
			$this->error = $e->getMessage();
		}
	}
}