<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;


require __DIR__ . "/../vendor/autoload.php";

return Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
		ASCII\Manager\Manager::getDoctrine()
		);
