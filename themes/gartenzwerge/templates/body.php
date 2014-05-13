<body>
	<div id="wrapper">
		<?php require TEMPLATE_PATH . 'header.php'; ?>
       XXX
        <div id="main">
            <div id="contentMenu">
            <?php 
                $headeradmin = User::checkAdmin() ? 'contentMenuAdmin.php' : 'contentMenuNoAdmin.php';
                require TEMPLATE_PATH . $headeradmin; 
            ?>
            </div>
            <div id="contentWrapper">
            <?php
				include TEMPLATE_PATH. 'messages.php';
                $template = isset($template) ? $template : '404';
                $templateFile = TEMPLATE_PATH.$template.'.php';
                if(file_exists($templateFile)) {
                    include $templateFile;
                }
                else {
                    echo 'Kein passendes Template gefunden!';
                }
            ?>
                <!--<div id="contentDeko"></div>-->
            </div>
        </div>
        

    </div>
    <div id="slider">
        <img src="<?php echo FE_THEME_PATH; ?>resourcen/images/slider2.jpg" width="100%" height="100%;"  />
    </div>
    <?php require TEMPLATE_PATH . 'footer.php'; ?>
</body>
</html>

