<?php if(!empty($data['user'])): $user = $data['user']; ?>
<div class="title">
Mein Konto
</div>
<div id="userShowWrapper" class="content">
    <div class="subtitle">
    	<?php echo htmlspecialchars($user->getTitle()." ".$user->getFirstname()." ".$user->getLastname()); ?>
    </div>
    <div class="titleHr"></div>
    
    <div>
    	<label>eMail</label><span><?php echo htmlspecialchars($user->getEmail()); ?></span>
    </div>
	<div>
    	<label>Kundennummer</label><span><?php echo number_format($user->getId()); ?></span>
    </div>
    <div>
    	<label>Postleitzahl</label><span><?php echo htmlspecialchars($user->getZip()); ?></span>
    </div>
    <div>
    	<label>Ort</label><span><?php echo htmlspecialchars($user->getCity()); ?></span>
    </div>
    <div>
    	<label>Straße</label><span><?php echo htmlspecialchars($user->getStreet()); ?></span>
    </div>
    <div>
    	<label>Telefon</label><span><?php echo htmlspecialchars($user->getPhone()); ?></span>
    </div>
    <div>
    	<label>Bank</label><span><?php echo htmlspecialchars($user->getBank()); ?></span>
    </div>
    <div>
    	<label>BIC</label><span><?php echo htmlspecialchars($user->getBic()); ?></span>
    </div>
    <div>
    	<label>IBAN</label><span><?php echo htmlspecialchars($user->getIban()); ?></span>
    </div>
   
    <form id="userEditBtn" method="post" action="/user/edit/<?php echo $user->getId(); ?>">
	<input name="edit" class="submit" type="submit" formmethod="post" value="Bearbeiten">
	</form>
    
    <form id="orderForm" method="post" action="/order/">
	<input name="orderShow" class="submit" type="submit" formmethod="post" value="Meine Bestellungen">
	</form>
    
	<form id="loginForm" method="post" action="/user/login/">
	<input name="logout" class="submit" type="submit" formmethod="post" value="Ausloggen">
	</form>
</div>
<?php else: ?>
User nicht vorhanden.
<?php endif; ?>
