<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php require ('documentheader.php'); ?>

<body>

<?php require ('header.php'); ?>

    <div id="slider">
    	<img src="../resourcen/images/slider1.jpg" width="100%" height="100%;"  />
    </div>
    
    <div id="deko"></div>

<div id="main">
	<div id="contentMenu">
		<?php require ('contentMenuAdmin.php'); ?>
	</div>

<div id="contentWrapper">
	
    <?php require ('filter.php'); ?>
  <div id="loginWrapper" class="content">
	
    <div class="title">
    	Registrierung und Anmeldung
    </div>
    
    <div class="subtitle">
    	Anmeldung
    </div>
    <div class="titleHr"></div>
    
        <form id="loginForm" method="post" action="snippet/login-sysuser.php">
       		<label>eMail</label> <input type="text" name="email" ><br>
        	<label>Password</label> <input type="text" name="password"><br>
        	<input class="submit" type="submit" name="Einloggen" value="Einloggen">
        </form>
    
     <div class="subtitle">
    	Registrierung
    </div>
    <div class="titleHr"></div>
   
       	<form id="regForm" method="post" action="snippet/create-sysuser.php">
            <label>Titel</label> <select id="" name="title" size="1"> <option value="Herr">Herr</option> <option value="Frau">Frau</option> </select><br>
            <label>Firstname</label> <input type="text" name="firstname"><br>
            <label>Lastname</label> <input type="text" name="lastname"><br>
            <label>eMail</label> <input type="text" name="email"><br>
            <label>Password</label> <input type="text" name="password"><br>
            <input class="submit" type="submit" name="Registrieren" value="Registrieren">
		</form>
  </div>

</div>
	
</div>

	<?php require ('footer.php'); ?>

</body>
</html>





