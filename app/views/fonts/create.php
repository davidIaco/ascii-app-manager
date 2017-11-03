<?php include  __DIR__ . "/../header.php"; ?>


<h1 class="text-center">
	Fonts
	<small class="glyphicon glyphicon-pencil"></small>
</h1>
<hr />

<?php include __DIR__ . "/../ui/alert-box.php";?>

<section class="container-fluid col-xs-6 col-xs-offset-3">
	<form action="" method="post">
	<div class="form-group">
    <label>Font name</label>
    <input name="fonts_name" class="form-control" placeholder="Lettre majuscule A">
  </div>
  <div class="form-group">
    <label>Line height</label>
    <input name="fonts_line_height" type="number" class="form-control" placeholder="4" >
  </div>  
  <button type="submit" class="btn btn-primary">Create a font</button>	
	</form>
</section>

<?php  include __DIR__ . "/../footer.php";?>
