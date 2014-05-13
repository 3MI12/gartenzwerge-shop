<div id="contentMenuLogin" class="contentMenuItem"><a href="/user/login/">Hallo <?php echo htmlspecialchars(User::getSessionUsername()); ?></a></div>
<div id="contentMenuArticleManager" class="contentMenuItem" ><a href="/order/list/">Bestellverwaltung</a></div>
<div id="contentMenuUserManager" class="contentMenuItem" ><a href="/user/list/">Nutzerverwaltung</a></div>
<?php require ('suche.php'); ?>