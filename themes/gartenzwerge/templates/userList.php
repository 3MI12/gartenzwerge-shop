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
    	<form id="userUpdateForm" method="post" action="/user/edit/">
			<input disabled type="text" name="UID" value="">
			<input disabled type="text" name="Lastname" value="">
			<input disabled type="text" name="Firstname" value="">      
			<input disabled type="text" name="email" value="">
			<input type="checkbox" name="Status" value="1">
			<input type="checkbox" name="Admin" value="1">
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
            <div class="checkbox" id="checkboxStatus">
                <input type="checkbox" id="checkboxInput" checked="checked" name="Status" value="1" <?php echo $sysuser->getStatus() ? 'checked' : ''; ?> />
                <label id="checkboxInput"></label>
  			</div>
            
            <div class="checkbox" id="checkboxAdmin">
                <input type="checkbox" id="checkboxInput" name="Admin" value="1" <?php echo $sysuser->getAdmin() ? 'checked' : ''; ?> />
                <label id="checkboxInput"></label>
  			</div>
            
            <!--
			<input type="checkbox" name="Status" value="1" <?php echo $sysuser->getStatus() ? 'checked' : ''; ?>>
			<input type="checkbox" name="Admin" value="1" <?php echo $sysuser->getAdmin() ? 'checked' : ''; ?>>
			
            -->
            <button class="userButton" name="userStatus" id="btn-userUpdate" type="submit" formaction="/user/edit/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button>
			<button class="userButton" name="userDetail" id="btn-userDetail" type="submit" formaction="/user/show/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button>
		</form>
		<?php endforeach; ?>
	</div>
	
</div>
