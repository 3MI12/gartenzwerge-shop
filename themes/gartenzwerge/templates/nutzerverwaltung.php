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

	<?php require ('footer.php'); ?>

</body>
</html>





