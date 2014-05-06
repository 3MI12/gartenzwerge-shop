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
   <div id="userManagerWrapper" class="content">
    	<div class="title">
        	Artikelverwaltung
        </div>

        <div class="articleManager">
        	<!--<div id="articleManagerLabels">
            	<span>ID</span>
                <span>Artikelname</span>
                <span>Größe</span>
                <span>Farbe</span>
                <span>Material</span>
                <span>Menge</span>
                <span>Preis</span>
            </div>-->
        	
            <form id="newArticle" class="articleUpdateForm" method="post" action="">
            	<input type="text" name="id" value="ID">
            	<input type="text" name="artikelName" value="Atrikelname">
                <input type="text" name="groesse" value="Größe">      
                <input type="text" name="farbe" value="Farbe">
                <input type="text" name="material" value="Material">
                <input type="text" name="menge" value="Menge">
                <input type="text" name="preis" value="Preis">
                <button class="articleButton btn-articleText" id="btn-articleText" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleImage" type="button" formaction="snippet/blabla.php"></button>
                <button class="articleButton" id="btn-articleUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <div class="imageUpload">
                	<div class="articleImgContainer">
                    	<img src="../resourcen/images/gartenzwerg1-s.jpg" style="height:100%; width:auto; margin:auto auto;" />
                    </div>
                </div> 
                <textarea class="articleText" name="text">Produktbeschreibung</textarea> 
            </form>
            
            <form class="articleUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="artikelName" value="Gartenzwerg Norbert">
                <input type="text" name="groesse" value="120cm">      
                <input type="text" name="farbe" value="blau">
                <input type="text" name="material" value="Keramik">
                <input type="text" name="menge" value="20">
                <input type="text" name="preis" value="29,90">
                <button class="articleButton btn-articleText" id="btn-articleText" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleImage" type="button" formaction="snippet/blabla.php"></button>
                <button class="articleButton" id="btn-articleUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleDelete" type="button" formaction="snippet/blabla.php"></button>
                <div class="imageUpload">
                	<div class="articleImgContainer">
                    	<img src="../resourcen/images/gartenzwerg1-s.jpg" style="height:100%; width:auto; margin:auto auto;" />
                    </div>
                </div> 
                <textarea class="articleText" name="text">Produktbeschreibung</textarea> 
            </form>
            
            <form class="articleUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="artikelName" value="Gartenzwerg Norbert">
                <input type="text" name="groesse" value="120cm">      
                <input type="text" name="farbe" value="blau">
                <input type="text" name="material" value="Keramik">
                <input type="text" name="menge" value="20">
                <input type="text" name="preis" value="29,90">
                <button class="articleButton btn-articleText" id="btn-articleText" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleImage" type="button" formaction="snippet/blabla.php"></button>
                <button class="articleButton" id="btn-articleUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleDelete" type="button" formaction="snippet/blabla.php"></button> 
                <textarea class="articleText" name="text">Produktbeschreibung</textarea> 
            </form>
            
            <form class="articleUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="artikelName" value="Gartenzwerg Norbert">
                <input type="text" name="groesse" value="120cm">      
                <input type="text" name="farbe" value="blau">
                <input type="text" name="material" value="Keramik">
                <input type="text" name="menge" value="20">
                <input type="text" name="preis" value="29,90">
                <button class="articleButton btn-articleText" id="btn-articleText" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleImage" type="button" formaction="snippet/blabla.php"></button>
                <button class="articleButton" id="btn-articleUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleDelete" type="button" formaction="snippet/blabla.php"></button> 
                <textarea class="articleText" name="text">Produktbeschreibung</textarea> 
            </form>
            
            <form class="articleUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="artikelName" value="Gartenzwerg Norbert">
                <input type="text" name="groesse" value="120cm">      
                <input type="text" name="farbe" value="blau">
                <input type="text" name="material" value="Keramik">
                <input type="text" name="menge" value="20">
                <input type="text" name="preis" value="29,90">
                <button class="articleButton btn-articleText" id="btn-articleText" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleImage" type="button" formaction="snippet/blabla.php"></button>
                <button class="articleButton" id="btn-articleUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleDelete" type="button" formaction="snippet/blabla.php"></button> 
                <textarea class="articleText" name="text">Produktbeschreibung</textarea> 
            </form>
            
            <form class="articleUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="artikelName" value="Gartenzwerg Norbert">
                <input type="text" name="groesse" value="120cm">      
                <input type="text" name="farbe" value="blau">
                <input type="text" name="material" value="Keramik">
                <input type="text" name="menge" value="20">
                <input type="text" name="preis" value="29,90">
                <button class="articleButton btn-articleText" id="btn-articleText" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleImage" type="button" formaction="snippet/blabla.php"></button>
                <button class="articleButton" id="btn-articleUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="articleButton" id="btn-articleDelete" type="button" formaction="snippet/blabla.php"></button> 
                <textarea class="articleText" name="text">Produktbeschreibung</textarea>  
            </form>
           
           
       </div>
			
	</div>

</div>
	
</div>

	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'); ?>

</body>
</html>





