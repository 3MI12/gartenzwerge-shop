<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

 <?php require TEMPLATE_PATH . 'documentheader.php'; ?>

</head>

<body>

	<?php require TEMPLATE_PATH . 'header.php'; ?>

<div id="slider">
	<img src="<?php echo FE_THEME_PATH; ?>resourcen/images/slider1.jpg" width="100%" height="100%;"  />
</div>

<div id="deko"></div>

<div id="main">
 
    
	<div id="contentMenu">
    	<?php require TEMPLATE_PATH . 'contentMenuAdmin.php'; ?>
        <!-- require ($_SERVER['DOCUMENT_ROOT'] . '/template/contentMenuNoAdmin.php');  -->
    </div>

    <div id="contentWrapper">

		<?php require TEMPLATE_PATH . 'filter.php'; ?>
    
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

	<?php require TEMPLATE_PATH . 'footer.php'; ?>

</body>

</html>

