<div id="contentMenuLogin" class="contentMenuItem"><?php echo User::loginStatus() ? '<a href="/user/login/">Hallo '.htmlspecialchars($_SESSION['user']->getName()).'</a>' : '<a href="/user/login/">Anmeldung</a>'; ?></div>
<?php require ('suche.php'); ?>