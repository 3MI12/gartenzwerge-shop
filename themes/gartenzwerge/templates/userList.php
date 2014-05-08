<div class="title">
Nutzerverwaltung
</div>

<div id="userManagerWrapper" class="content">
	<div id="userManagerLabels">
		<span>Kundennummer</span>
		<span>Vorname</span>
		<span>Nachname</span>
		<span>eMail</span>
		<span>Status</span>
		<span>Admin</span>
	</div>
		<?php foreach($data['user'] as $sysuser): ?>
		<form id="userUpdateForm" method="post" action="/user/edit/">
			<input disabled type="text" name="UID" value="<?php echo number_format($sysuser->getUid()); ?>">
			<input disabled type="text" name="Lastname" value="<?php echo htmlspecialchars($sysuser->getLastname()); ?>">
			<input disabled type="text" name="Firstname" value="<?php echo htmlspecialchars($sysuser->getFirstname()); ?>">      
			<input disabled type="text" name="email" value="<?php echo htmlspecialchars($sysuser->getEmail()); ?>">
			<input type="checkbox" name="Status" value="1" <?php echo $sysuser->getStatus() ? 'checked' : ''; ?>>
			<input type="checkbox" name="Admin" value="1" <?php echo $sysuser->getAdmin() ? 'checked' : ''; ?>>
			<button class="userButton" name="userStatus" id="btn-userUpdate" type="submit" formaction="/user/edit/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button>
			<button class="userButton" name="userDetail" id="btn-userDelete" type="submit" formaction="/user/show/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button>
		</form>
		<?php endforeach; ?>
	</div>
	<p><a href="/user/edit/">////////NEUER NUTZER////////</a></p>
</div>
