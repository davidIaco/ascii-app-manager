<?php include __DIR__ . "/../header.php"; ?>

<h1 class="text-center">Authentification</h1>
<hr />

<?php include __DIR__ . "/../ui/alert-box.php";?>

<br><br><br><br><br>
<?php if ( !$user): ?>

<form class="text-center" action="" method="POST">
	<input name="user_mail" placeholder="mail" /><br><br>
	<input name="user_pswd" type="password" placeholder="pswd" /><br><br>
	<input type="hidden" name="token" value="<?= $token ?>"><br>
	<input type="submit" /> 
</form>

<?php endif;?>

<?php include __DIR__ . "/../footer.php"; ?>