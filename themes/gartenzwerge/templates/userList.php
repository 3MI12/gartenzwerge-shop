<div class="title">
Nutzerverwaltung
</div>

<div id="userManagerWrapper" class="content">
	<div id="userManagerLabels">
		<span>Knr.</span>
		<span>Vorname</span>
		<span>Nachname</span>
		<span>eMail</span>
		<span>Status</span>
		<span>Admin</span>
	</div>
    
    <div class="subtitle">
    	Neuer User
    </div>
    <div class="titleHr"></div>
    <div>
    	<form id="userCreateForm" method="post" action="/user/edit/">
			<input disabled type="text" name="UID" value="">
			<input type="text" name="Lastname" value="Mustermann">
			<input type="text" name="Firstname" value="Max">      
			<input type="text" name="email" value="max.mustermann@brokkolimails.de">
			<div class="checkboxStatus">
                <input type="checkbox" checked="" name="Status" value=""/>
                <label ></label>
  			</div>
            <div class="checkboxAdmin">
                <input type="checkbox" checked="" name="Admin" value=""/>
                <label></label>
  			</div>
			<button class="userButton" name="userStatus" id="btn-userUpdate" type="submit" formaction="/user/edit/" formmethod="post"></button>
		</form>
        <!--<p><a href="/user/edit/">////////NEUER NUTZER////////</a></p>-->
    </div>
    <div class="subtitle">
    	Liste der User
    </div>
    <div class="titleHr"></div>
    
		<?php foreach($data['user'] as $sysuser): ?>
		<form id="userUpdateForm" method="post" action="/user/edit/">
			<input disabled type="text" name="UID" value="<?php echo number_format($sysuser->getUid()); ?>">
			<input disabled type="text" name="Lastname" value="<?php echo htmlspecialchars($sysuser->getLastname()); ?>">
			<input disabled type="text" name="Firstname" value="<?php echo htmlspecialchars($sysuser->getFirstname()); ?>">      
			<input disabled type="text" name="email" value="<?php echo htmlspecialchars($sysuser->getEmail()); ?>">
            <div class="checkboxStatus">
                <input type="checkbox" name="Status" value="" checked="<?php echo $sysuser->getStatus() ? 'checked' : ''; ?>" />
                <label></label>
  			</div>
            
            <div class="checkboxAdmin">
                <input type="checkbox" name="Admin" value="" checked="<?php echo $sysuser->getAdmin() ? 'checked' : ''; ?>" />
                <label ></label>
  			</div>

            <button class="userButton" name="userStatus" id="btn-userUpdate" type="submit" formaction="/user/edit/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button>
			<button class="userButton" name="userDetail" id="btn-userDetail" type="submit" formaction="/user/show/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button>
		</form>
		<?php endforeach; ?>
	</div>
	
</div>
