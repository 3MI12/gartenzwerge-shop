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
<<<<<<< HEAD
		<?php foreach($data['user'] as $sysuser): ?>
		<form id="userUpdateForm" method="post" action="">
			<input disabled type="text" name="UID" value="<?php echo number_format($sysuser->getUid()); ?>">
			<input disabled type="text" name="Lastname" value="<?php echo htmlspecialchars($sysuser->getLastname()); ?>">
			<input disabled type="text" name="Firstname" value="<?php echo htmlspecialchars($sysuser->getFirstname()); ?>">      
			<input disabled type="text" name="email" value="<?php echo htmlspecialchars($sysuser->getEmail()); ?>">
			<input type="checkbox" name="Status" value="1" <?php echo $sysuser->getStatus() ? 'checked' : ''; ?>>
			<input type="checkbox" name="Admin" value="1" <?php echo $sysuser->getAdmin() ? 'checked' : ''; ?>>
			<button class="userButton" name="userStatus" id="btn-userUpdate" type="submit" formaction="/user/edit/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button> 
=======
    	<div class="subtitle">
    		Neuer User
    	</div>
        <div class="titleHr"></div>
    
    	<form id="userCreateForm" method="post" action="">
			<input pattern="[0-9]" name="UID" value="UID" required="required" readonly="readonly">
			<input type="text" name="Lastname" value="Lastname" required="required">
			<input type="text" name="Firstname" value="Firstname" required="required">      
			<input type="email" name="email" value="email" required="required">
			<input type="password" pattern="[A-Za-z0-9_]{8,}" name="password" value="********" required="required">
			<button class="userButton" id="btn-userCreate" type="submit" formaction="" formmethod="post"></button>
		</form>
    	
        <div class="subtitle">
    		Vorhandene User
    	</div>
        <div class="titleHr"></div>
        
		<?php foreach($data as $sysuser): ?>
		<form id="userUpdateForm" method="post" action="">
			<input pattern="[0-9]" name="UID" value="<?php echo number_format($sysuser->getUid()); ?>" required="required">
			<input type="text" name="Lastname" value="<?php echo htmlspecialchars($sysuser->getLastname()); ?>" required="required">
			<input type="text" name="Firstname" value="<?php echo htmlspecialchars($sysuser->getFirstname()); ?>" required="required">      
			<input type="email" name="email" value="<?php echo htmlspecialchars($sysuser->getEmail()); ?>" required="required">
			<input type="password" pattern="[A-Za-z0-9_]{8,}" name="password" value="********" required="required">
			<button class="userButton" id="btn-userUpdate" type="submit" formaction="/user/edit/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button> 
>>>>>>> master
			<button class="userButton" id="btn-userDelete" type="submit" formaction="/user/delete/<?php echo $sysuser->getUid(); ?>" formmethod="post"></button>
		</form>
		<?php endforeach; ?>
	</div>
</div>