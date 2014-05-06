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
   <div id="profilWrapper" class="content">
    	<div class="title">
        	Mein Profil
        </div>

        <div class="subtitle">
    		Meine Daten
    	</div>
    <div class="titleHr"></div>
   
       	<form id="profilForm" method="post" action="snippet/create-sysuser.php">
            <label>Titel</label> <select id="" name="title" size="1"> <option value="Herr">Herr</option> <option value="Frau">Frau</option> </select><br>
            <label>Firstname</label> <input type="text" name="firstname"><br>
            <label>Lastname</label> <input type="text" name="lastname"><br>
            <label>eMail</label> <input type="text" name="email"><br>
            <label>Password</label> <input type="text" name="password"><br>
            <input class="submit" type="submit" name="speichern" value="Speichern">
		</form>
	</div>
		
        <div class="subtitle">
    		Meine Bestellungen
    	</div>
    	<div class="titleHr"></div>
    
</div>
	
</div>

	<?php require ('footer.php'); ?>

</body>
</html>





