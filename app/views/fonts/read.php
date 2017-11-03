<?php include __DIR__ . "/../header.php"; ?>

<h1 class="text-center">
		Fonts
	<small class="glyphicon glyphicon-book"></small>	
</h1>
<hr />
<?php include __DIR__ . "/../ui/results.php";?>

<section class="container-fluid col-xs-8 col-xs-offset-2">
	<form action="" method="post">
	<div class="btn-group btn-group-lg">
	
	<?php if (isset($model->results)): ?>
	<?php foreach ($model->results as $key => $value): ?>
	
	<a type="button" class="btn btn-primary"
			href="./admin/fonts/<?=$model->results[$key]->fonts_name?>?action=manage">
			<?= $model->results[$key]->fonts_name ?></a>
	
	<?php endforeach; ?>
	<?php endif; ?>
		</div>
	<br>
	<br>
	<?php if ( $_SESSION["user"]["lvl"] == "superadmin"):?>
<a class="btn btn-primary" href="./admin/fonts?action=create">Go to Create a font</a>
<?php endif;?>	
</form>
</section>

<?php include __DIR__ . "/../footer.php"; ?>