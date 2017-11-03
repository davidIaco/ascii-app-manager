<?php
namespace ASCII\Model;

use ASCII\Manager\Manager;
use PDO;

class CharactersModel
{
	
	public function create ( string $charactersUnicodeName, string $charactersUnicodeValue) {
		
		if ( !$charactersUnicodeName || !$charactersUnicodeValue) {
			return;
		}
		
		try {
			
			$sth = Manager::getPDO()->prepare(
					"INSERT INTO
					`characters`" . "( `characters_unicode_name`, `characters_unicode_value`)"
					. " VALUES (:characters_unicode_name, :characters_unicode_value)"
					);
			
			$sth->bindValue ( ":characters_unicode_name", $charactersUnicodeName);
			$sth->bindValue ( ":characters_unicode_value", $charactersUnicodeValue);
			$sth->execute ();
			
			$this->success = $charactersUnicodeName. " has been created.";
			
		} catch (\Throwable $e) {
			$this->error = $e->getMessage();
		}
	}
	
	public function delete ( string $charactersValue) {
				
		if ( !$charactersValue) {
			return;
		}
		
		try {
			$sth = Manager::getPDO()->prepare(
					"DELETE FROM `characters`
					 WHERE `characters_unicode_value`= :idValue"
			);
			$sth->bindValue ( ":idValue", $charactersValue);
			$sth->execute();			
			
			$this->success = $charactersValue. " has been deleted.";			
			
		} catch ( \Throwable $e) {
			$this->error = $e->getMessage();
		}		
	}

	
	public function selectAll () {
		
		try {
			
			$sth = Manager::getPDO()->prepare(
					"SELECT`characters_unicode_name`, `characters_unicode_value` FROM `characters`");
			$sth->execute();
			$this->results = $sth->fetchAll(PDO::FETCH_OBJ);			
			
		} catch (\Throwable $e) {
			
			$this->error = $e->getMessage();
		}
	}
}