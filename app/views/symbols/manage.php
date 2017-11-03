
<?php include __DIR__ . "/../header.php"; ?>

<h1 class="text-center">
	<small class="glyphicon glyphicon-euro"></small>
		Symbols
	<small class="glyphicon glyphicon-usd"></small>	
</h1>
<hr />
	<?php include __DIR__ . "/../ui/results.php";?>
	<?php include __DIR__ . "/../ui/alert-box.php";?>

<section class="container-fluid col-xs-8 col-xs-offset-2">
	<form action="" method="post">
	<?php if ( $_SESSION["user"]["lvl"] == "superadmin"):?>
	<div class="btn-group btn-group-lg">   
  <button type="submit" class="btn btn-primary">Create a symbol</button>   	
	</div><?php endif;?>
<div class="form-group container-fluid col-xs-6 col-xs-offset-3">
    <label>Symbol name</label>
    <input name="symbols_name" class="form-control" placeholder="Lettre majuscule A">
  </div>
  <div class="form-group container-fluid col-xs-6 col-xs-offset-3">
    <label>Symbol value</label>
    <input name="symbols_value" class="form-control" placeholder=A >
  </div>
  </form>		
</section>

	<section class="container-fluid col-xs-10 col-xs-offset-1">
	<div class="form-group">
	<?php if (isset($model->results)): ?>
	<?php foreach ($model->results as $object): ?>
	
		<div class="form-group col-xs-5 col-xs-offset-1" >
	<input name="symbols_name" disabled class="form-control" value="
		<?= filter_var($object->symbols_name, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH)?>"> 
		</div>
	<div class="form-group col-xs-3" >
		<input name="symbols_value" disabled class="form-control" value="
			<?= filter_var($object->symbols_value, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_ENCODE_HIGH)?>"> 
	</div>
		<div class="form-group col-xs-1">			
	<a class="btn btn-danger glyphicon glyphicon-trash"
			href="./admin/symbols?action=manage&symbols_value=<?=urlencode($object->symbols_value)?>"></a>
	</div>	 	
	<?php endforeach; ?>
	<?php endif; ?>
	</div>	
		</section>
	<br>
	<br>
	

<?php include __DIR__ . "/../footer.php"; ?>
