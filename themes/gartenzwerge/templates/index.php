<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

 <?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/documentheader.php'); ?>

</head>

<body>

	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/header.php'); ?>

<div id="slider">
	<img src="resourcen/images/slider1.jpg" width="100%" height="100%;"  />
</div>

<div id="deko"></div>

<div id="main">
 
    
	<div id="contentMenu">
    	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/contentMenuAdmin.php'); ?>
        <!-- require ($_SERVER['DOCUMENT_ROOT'] . '/template/contentMenuNoAdmin.php');  -->
    </div>

    <div id="contentWrapper">

		<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/filter.php'); ?>
    
        <div id="homeWrapper" class="content">
            <div class="title">
                Startseite
            </div>
            
            <div class="contentText">
            	<a href="template/login.php">Anmeldung und Registrierung</a><br />
                <a href="template/artikel.php">Artikel - Einzelansicht(Bsp)</a><br />
                <a href="template/nutzerverwaltung.php">Nutzerverwaltung(Bsp)</a><br />
                <a href="template/artikelverwaltung.php">Artikelverwaltung(Bsp)</a><br />
                <a href="test-usrmgr.php">UserManager</a><br />
                <a href="test-media.php">MediaManager</a>
            </div>
    	</div>
	</div>
</div>


	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'); ?>

</body>

</html>

