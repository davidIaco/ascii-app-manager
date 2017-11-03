<?php
namespace ASCII\Model;

use ASCII\Manager\Manager;
use PDO;

class SymbolsModel 
{
	public function create ( string $symbolsName, string $symbolsValue) {
		
		if ( !$symbolsName|| !$symbolsValue) {
			return;
		}
		
		try {
			
			$sth = Manager::getPDO()->prepare(
					"INSERT INTO
					`symbols`( `symbols_name`, `symbols_value`)
					VALUES (:symbols_name, :symbols_value)"
					);
			
			$sth->bindValue ( ":symbols_name", $symbolsName);
			$sth->bindValue ( ":symbols_value", $symbolsValue);
			$sth->execute ();
			
			$this->success = $symbolsName. " has been created";
			
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
	
	public function delete ( string $symbolsValue) {
		
		if ( !$symbolsValue) {
			return;
		}
		
		try {
			$sth = Manager::getPDO()->prepare(
					"DELETE FROM `symbols`
					 WHERE `symbols_value`= :idValue"
					);
			$sth->bindValue ( ":idValue", $symbolsValue);
			$sth->execute();
			
			
			$this->success = $symbolsValue . " has been deleted.";
			
			
		} catch ( \Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
	
	public function selectAll () {
		
		try {
			$sth = Manager::getPDO()->prepare(
					"SELECT`symbols_name`, `symbols_value` FROM `symbols` ORDER BY `symbols_name` ASC");
			$sth->execute();
			$this->results = $sth->fetchAll(PDO::FETCH_OBJ);
			
			$sth->closeCursor();
			
		} catch (\Throwable $e) {
			
			$this->error = $e->getMessage();
		}
	}
}