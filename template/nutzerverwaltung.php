<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Gartenzwerge</title>

<link rel="stylesheet" href="../css/basic.css" />
<link rel="stylesheet" href="../css/content.css" />
<link rel="stylesheet" href="../css/links.css" />
<link rel="stylesheet" href="../css/forms.css" />

<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:400,300italic,400italic,700,700italic,300' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/script.js"></script>

<!--<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/stellar/stellar.js"></script>
<script type="text/javascript" src="js/script.js"></script>-->

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
        	Nutzerverwaltung
        </div>

        <div class="userManager">
        	<div id="userManagerLabels">
            	<span>ID</span>
                <span>LASTNAME</span>
                <span>FIRSTNAME</span>
                <span>EMAIL</span>
                <span>PASSWORD</span>
            </div>
        
            <form id="userUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="lastname" value="mustermann">
                <input type="text" name="firstname" value="max">      
                <input type="text" name="email" value="blabla@bla-mail.de">
                <input type="text" name="password" value="unknackbar">
                <button class="userButton" id="btn-userUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="userButton" id="btn-userDelete" type="button" formaction="snippet/blabla.php"></button> 
               
               
               	<!--<label>Lastname</label> <input type="text" name="lastname" value="mustermann">
                <label>Firstname</label> <input type="text" name="firstname" value="max">      
                <label>eMail</label> <input type="text" name="email" value="blabla@bla-mail.de">
                <label>Password</label> <input type="text" name="password" value="unknackbar">-->
               
            </form>
            
                <form id="userUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="lastname" value="mustermann">
                <input type="text" name="firstname" value="max">      
                <input type="text" name="email" value="blabla@bla-mail.de">
                <input type="text" name="password" value="unknackbar">
                <button class="userButton" id="btn-userUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="userButton" id="btn-userDelete" type="button" formaction="snippet/blabla.php"></button> 
               
               
               	<!--<label>Lastname</label> <input type="text" name="lastname" value="mustermann">
                <label>Firstname</label> <input type="text" name="firstname" value="max">      
                <label>eMail</label> <input type="text" name="email" value="blabla@bla-mail.de">
                <label>Password</label> <input type="text" name="password" value="unknackbar">-->
               
            </form>
            
                <form id="userUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="lastname" value="mustermann">
                <input type="text" name="firstname" value="max">      
                <input type="text" name="email" value="blabla@bla-mail.de">
                <input type="text" name="password" value="unknackbar">
                <button class="userButton" id="btn-userUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="userButton" id="btn-userDelete" type="button" formaction="snippet/blabla.php"></button> 
               
               
               	<!--<label>Lastname</label> <input type="text" name="lastname" value="mustermann">
                <label>Firstname</label> <input type="text" name="firstname" value="max">      
                <label>eMail</label> <input type="text" name="email" value="blabla@bla-mail.de">
                <label>Password</label> <input type="text" name="password" value="unknackbar">-->
               
            </form>
            
                <form id="userUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="lastname" value="mustermann">
                <input type="text" name="firstname" value="max">      
                <input type="text" name="email" value="blabla@bla-mail.de">
                <input type="text" name="password" value="unknackbar">
                <button class="userButton" id="btn-userUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="userButton" id="btn-userDelete" type="button" formaction="snippet/blabla.php"></button> 
               
               
               	<!--<label>Lastname</label> <input type="text" name="lastname" value="mustermann">
                <label>Firstname</label> <input type="text" name="firstname" value="max">      
                <label>eMail</label> <input type="text" name="email" value="blabla@bla-mail.de">
                <label>Password</label> <input type="text" name="password" value="unknackbar">-->
               
            </form>
            
                <form id="userUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="lastname" value="mustermann">
                <input type="text" name="firstname" value="max">      
                <input type="text" name="email" value="blabla@bla-mail.de">
                <input type="text" name="password" value="unknackbar">
                <button class="userButton" id="btn-userUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="userButton" id="btn-userDelete" type="button" formaction="snippet/blabla.php"></button> 
               
               
               	<!--<label>Lastname</label> <input type="text" name="lastname" value="mustermann">
                <label>Firstname</label> <input type="text" name="firstname" value="max">      
                <label>eMail</label> <input type="text" name="email" value="blabla@bla-mail.de">
                <label>Password</label> <input type="text" name="password" value="unknackbar">-->
               
            </form>
            
                <form id="userUpdateForm" method="post" action="">
            	<input type="text" name="id" value="5">
            	<input type="text" name="lastname" value="mustermann">
                <input type="text" name="firstname" value="max">      
                <input type="text" name="email" value="blabla@bla-mail.de">
                <input type="text" name="password" value="unknackbar">
                <button class="userButton" id="btn-userUpdate" type="button" formaction="snippet/blabla.php"></button> 
                <button class="userButton" id="btn-userDelete" type="button" formaction="snippet/blabla.php"></button> 
               
               
               	<!--<label>Lastname</label> <input type="text" name="lastname" value="mustermann">
                <label>Firstname</label> <input type="text" name="firstname" value="max">      
                <label>eMail</label> <input type="text" name="email" value="blabla@bla-mail.de">
                <label>Password</label> <input type="text" name="password" value="unknackbar">-->
               
            </form>
        
        </div>
			
	</div>

</div>
	
</div>

	<?php require ($_SERVER['DOCUMENT_ROOT'] . '/template/footer.php'); ?>

</body>
</html>





