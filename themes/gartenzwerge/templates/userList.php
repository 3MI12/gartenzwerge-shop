<div class="title">
Nutzerverwaltung
</div>
<div id="userManagerWrapper" class="content">
	    
    <div class="subtitle">
    	Neuer User
    </div>
    <div class="titleHr"></div>
    	<form id="regForm" method="post" action="/user/edit/">
            <label>Titel</label> <select id="" name="title" size="1"> <option value="Herr">Herr</option> <option value="Frau">Frau</option> </select>
            <label>Vorname</label> <input type="text" name="firstname" required="required">
            <label>Nachname</label> <input type="text" name="lastname" required="required">
            <label>eMail</label> <input type="email" name="email" required="required">
            <label>Passwort</label> <input type="password" name="password" required="required">
            <input class="submit" type="submit" name="userRegister" formmethod="post" value="Anlegen">
		</form>
    <div class="subtitle">
    	Liste der User
    </div>
    <div class="titleHr"></div>
    <div id="userManagerLabels">
		<span>Knr.</span>
		<span>Vorname</span>
		<span>Nachname</span>
		<span>eMail</span>
		<span>Status</span>
		<span>Admin</span>
	</div>
    
		<?php foreach($data['user'] as $sysuser): ?>
		<form id="userUpdateForm" method="post" action="/user/edit/">
			<input disabled type="text" name="ID" value="<?php echo number_format($sysuser->getId()); ?>">
			<input disabled type="text" name="Firstname" value="<?php echo htmlspecialchars($sysuser->getFirstname()); ?>"> 
			<input disabled type="text" name="Lastname" value="<?php echo htmlspecialchars($sysuser->getLastname()); ?>">     
			<input disabled type="email" name="email" value="<?php echo htmlspecialchars($sysuser->getEmail()); ?>">
            <div class="checkboxStatus">
                <input type="checkbox" name="Status" value="<?php echo $sysuser->getStatus() ? 'true' : 'false'; ?>" checked="<?php echo $sysuser->getStatus() ? 'checked' : ''; ?>" />
                <label></label>
  			</div>
            
            <div class="checkboxAdmin">
                <input type="checkbox" name="Admin" value="<?php echo $sysuser->getAdmin() ? 'true' : 'false'; ?>" checked="<?php echo $sysuser->getAdmin() ? 'checked' : ''; ?>" />
                <label ></label>
  			</div>

            <button class="userButton" name="userStatus" id="btn-userUpdate" type="submit" formaction="/user/edit/<?php echo $sysuser->getId(); ?>" formmethod="post"></button>
			<button class="userButton" name="userDetail" id="btn-userDetail" type="submit" formaction="/user/show/<?php echo $sysuser->getId(); ?>" formmethod="post"></button>
		</form>
		<?php endforeach; ?>
	</div>
	
</div>
