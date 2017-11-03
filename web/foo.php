
<?php
$dsn = "mysql:host=localhost;
		dbname=ascii;
		charset=UTF8";
$user = "root";
$psw = "";
$options = "?";

$dbh = new PDO ( $dsn, $user, $psw );

$dbh->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$fontName = "Arial";
$fontHeight = 6;

try {
	$sql = "INSERT INTO 
		`fonts`( `fonts_name`, `fonts_line_height`) 
		VALUES (:fonts_name, :fonts_line_height)";
	
	$sth = $dbh->prepare ( $sql );
	
	$sth->bindValue ( "fonts_name", "Ma super font" );
	$sth->bindValue ( "fonts_line_height", 8 );
	$sth->execute ();
	
	echo "Content";
	
} catch ( Throwable $e ) {
	
	echo "Pas content" . $e->getMessage ();
}