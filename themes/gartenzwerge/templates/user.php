<div class="title">
Nutzerverwaltung
</div>
<div id="userManagerWrapper" class="content">
<?php if(!empty($data['user'])): $user = $data['user']; ?>
	<h3><?php echo htmlspecialchars($user->getTitle()." ".$user->getFirstname()." ".$user->getLastname()); ?></h3>
	<p>eMail: <?php echo htmlspecialchars($user->getEmail()); ?></p>
	<p>Kundennummer: <?php echo number_format($user->getUid()); ?></p>
	<p>Straße: <?php echo htmlspecialchars($user->getStreet()); ?></p>
	<p>Postleitzahl: <?php echo htmlspecialchars($user->getZip()); ?></p>
	<p>Ort: <?php echo htmlspecialchars($user->getCity()); ?></p>
	<p>Telefon: <?php echo htmlspecialchars($user->getPhone()); ?></p>
	<p>Bank: <?php echo htmlspecialchars($user->getBank()); ?></p>
	<p>BIC: <?php echo htmlspecialchars($user->getBic()); ?></p>
	<p>IBAN: <?php echo htmlspecialchars($user->getIban()); ?></p>
	<p><a href="/user/edit/<?php echo $user->getUid(); ?>">////////BEARBEITEN////////</a></p>
<?php else: ?>
User nicht vorhanden.
<?php endif; ?>
</div>