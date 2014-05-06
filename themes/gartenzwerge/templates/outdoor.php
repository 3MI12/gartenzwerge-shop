<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php require ('documentheader.php'); ?>

</head>

<body>

<?php require ('header.php'); ?>

    <div id="slider">
    	<img src="../resourcen/images/slider1.jpg" width="100%" height="100%;"  />
    </div>

<div id="main">
	<div id="contentMenu">
		<?php require ('contentMenuAdmin.php'); ?>
        <!-- require ($_SERVER['DOCUMENT_ROOT'] . '/template/contentMenuNoAdmin.php');  -->
	</div>

<div id="contentWrapper">
	
    <?php require ('filter.php'); ?>
   <div id="outdoorWrapper" class="content">
    	<div class="title">
        	Outdoor
        </div>

        <div class="outdoor contentText">
			<p>
            	Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam 	   voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
            </p>
		</div>
	</div>

</div>
	
</div>

	<?php require ('footer.php'); ?>

</body>
</html>





