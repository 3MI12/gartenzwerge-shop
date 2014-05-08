<div class="title">
Nutzerverwaltung
</div>
<div id="userManagerWrapper" class="content">
<?php if(!empty($data['user'])): $user = $data['user']; ?>
	<h3><?php echo htmlspecialchars($user->getTitle()." ".$user->getFirstname()." ".$user->getLastname()); ?></h3>
	<p>eMail: <?php echo htmlspecialchars($user->getEmail()); ?></p>
	<p>Kundennummer: <?php echo number_format($user->getUid()); ?></p>
	<dl>
		<dt>Straße:</dt>
		<dd><?php echo htmlspecialchars($user->getStreet()); ?></dd>
		<dt>Postleitzahl:</dt>
		<dd><?php echo htmlspecialchars($user->getZip()); ?></dd>
		<dt>Ort:</dt>
		<dd><?php echo htmlspecialchars($user->getCity()); ?></dd>
		<dt>Telefon:</dt>
		<dd><?php echo htmlspecialchars($user->getPhone()); ?></dd>
		<dt>Bank:</dt>
		<dd><?php echo htmlspecialchars($user->getBank()); ?></dd>
		<dt>BIC:</dt>
		<dd><?php echo htmlspecialchars($user->getBic()); ?></dd>
		<dt>IBAN:</dt>
		<dd><?php echo htmlspecialchars($user->getIban()); ?></dd>
	</dl>
	<a href="/user/edit/<?php echo $user->getUid(); ?>">Bearbeiten</a>
<?php else: ?>
User nicht vorhanden.
<?php endif; ?>
</div>