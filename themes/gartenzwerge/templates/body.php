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
	<?php require TEMPLATE_PATH . 'footer.php'; ?>
</body>
</html>

