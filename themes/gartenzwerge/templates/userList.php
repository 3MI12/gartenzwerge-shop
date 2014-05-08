<div class="title">
Nutzerverwaltung
</div>

<div id="userManagerWrapper" class="content">
	<div id="userManagerLabels">
		<span>ID</span>
		<span>LASTNAME</span>
		<span>FIRSTNAME</span>
		<span>EMAIL</span>
		<span>PASSWORD</span>
	</div>
		<?php foreach($data as $sysuser): ?>
		<form id="userUpdateForm" method="post" action="">
			<input type="text" name="UID" value="<?php echo number_format($sysuser->getUid()); ?>">
			<input type="text" name="Lastname" value="<?php echo htmlspecialchars($sysuser->getLastname()); ?>">
			<input type="text" name="Firstname" value="<?php echo htmlspecialchars($sysuser->getFirstname()); ?>">      
			<input type="text" name="email" value="<?php echo htmlspecialchars($sysuser->getEmail()); ?>">
			<input type="text" name="password" value="********">
			<button class="userButton" id="btn-userUpdate" type="submit" formaction="/user/edit/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button> 
			<button class="userButton" id="btn-userDelete" type="submit" formaction="/user/delete/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button>
		</form>
		<?php endforeach; ?>
	</div>
</div>