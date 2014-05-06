<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/documentheader.php'); ?>

</head>

<body>

<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/header.php'); ?>

    <div id="slider">
    	<img src="../resourcen/images/slider1.jpg" width="100%" height="100%;"  />
    </div>

<div id="main">
	<div id="contentMenu">
		<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/contentMenuAdmin.php'); ?>
        <!-- require ($_SERVER['DOCUMENT_ROOT'] . '/template/contentMenuNoAdmin.php');  -->
	</div>

<div id="contentWrapper">
	
    <?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/filter.php'); ?>
   <div id="articleWrapper" class="content">
    	<div class="title">
        	Gartenzwerg Norbert
        </div>

        <div class="article">
			<div class="articleDetailsWrapper">
				<div class="subtitle">
					Produktdetails
				</div>
                <div class="titleHr"></div>
			    <div class="articleDetails">
					<div class="articleImgContainer">
                    	<img src="../resourcen/images/gartenzwerg1-s.jpg" style="height:100%; width:auto; margin:auto auto;" />
                    </div>
                
                    	<form id="articleForm" method="post" action="">
                            <label>Artikelnummer</label> <input type="text" name="artikelnummer" value="22233-11" readonly="readonly">
                            <label>Geschlecht</label> <input type="text" name="geschlecht" value="männlich" readonly="readonly">
                            <label>Größe</label> <input type="text" name="groeße" value="120cm" readonly="readonly">
                            <label>Farbe</label> <input type="text" name="farbe" value="blau" readonly="readonly">
                            <label>Material</label> <input type="text" name="material" value="Keramik" readonly="readonly">
                            <label>Menge</label> <input class="menge" type="text" name="menge" value="1">
                            <div>für nur <span id="preis"> 29,90€ </span> (inkl. MWST) </div>
                            <button id="btn-kaufen" type="button"></button> 
						</form>
                    
				</div>
			</div>

            <div class="articleTextWrapper">
				<div class="subtitle">
					Produktbeschreibung
				</div>
                <div class="titleHr"></div>
                <div class="articleText">
					<p>
                    Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam 	                    voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.
                    </p>
				</div>
			</div>
		</div>

	</div>

</div>
	
</div>

	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'); ?>

</body>
</html>





