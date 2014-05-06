<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

 <?php require ('documentheader.php'); ?>

</head>

<body>

	<?php require ('header.php'); ?>

<div id="slider">
	<img src="../resourcen/images/slider1.jpg" width="100%" height="100%;"  />
</div>

<div id="deko"></div>

<div id="main">
 
    
	<div id="contentMenu">
    	<?php require ('contentMenuAdmin.php'); ?>
        <!-- require ($_SERVER['DOCUMENT_ROOT'] . '/template/contentMenuNoAdmin.php');  -->
    </div>

    <div id="contentWrapper">

		<?php require ('filter.php'); ?>
    
        <div id="homeWrapper" class="content">
            <div class="title">
                Startseite
            </div>
            
            <div class="contentText">
            	<a href="login.php">Anmeldung und Registrierung</a><br />
                <a href="artikel.php">Artikel - Einzelansicht(Bsp)</a><br />
                <a href="nutzerverwaltung.php">Nutzerverwaltung(Bsp)</a><br />
                <a href="artikelverwaltung.php">Artikelverwaltung(Bsp)</a><br />
            </div>
			
	<?php
		$template = isset($template) ? $template : '404';
		$templateFile = TEMPLATE_PATH.$template.'.php';
		if(file_exists($templateFile)) {
			include $templateFile;
		}
		else {
			echo 'Kein passendes Template gefunden!';
		}
	?>
			
    	</div>
	</div>
</div>

	<?php require ('footer.php'); ?>

</body>

</html>

