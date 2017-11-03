<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>ASCII</title>
		<base href="http://localhost/formation-php/web/" />
		<link rel="stylesheet" type="text/css" href="./node_modules/bootstrap/dist/css/bootstrap.css" />
	</head>
<body>
	<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ASCII</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">            
            <ul class="nav navbar-nav navbar-right">                     
              <li><a href="./admin/fonts?action=create">Fonts Create</a></li>            
              <li><a href="./admin/fonts?action=read">Fonts Read</a></li>
              <li><a href="./admin/characters?action=manage">Characters</a></li>
              <li><a href="./admin/symbols?action=manage">Symbols</a></li>
              <?php if (isset ($user) && $user):?>
              <li><a href="./auth?action=destroy&token=<?= $token ?>" class="glyphicon glyphicon-off btn btn-danger"> Deco</a></li>
              <?php else: ?>
              <li><a href="./auth?action=auth" class="glyphicon glyphicon-flash btn btn-success"> Co</a></li>
              <?php endif;?>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>




	<main>

