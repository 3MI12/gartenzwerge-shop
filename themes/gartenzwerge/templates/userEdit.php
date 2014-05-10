<?php if(!empty($data['user'])): $user = $data['user']; ?>
<h2>Nutzerkonto bearbeiten</h2>
<?php require THEME_PATH . 'templates/errorList.php'; ?>
<form action="" method="post">
<p><label>Titel: <input type="text" name="title" value="<?php echo htmlspecialchars($user->getTitle()); ?>"></label></p>
<p><label>Vorname: <input type="text" name="firstname" value="<?php echo htmlspecialchars($user->getFirstname()); ?>"></label></p>
<p><label>Nachname: <input type="text" name="lastname" value="<?php echo htmlspecialchars($user->getLastname()); ?>"></label></p>
<p><label>eMail: <input type="text" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>"></label></p>
<p><label>Passwort: <input type="text" name="password" value=""></label></p>
<p><label>Straße: <input type="text" name="street" value="<?php echo htmlspecialchars($user->getStreet()); ?>"></label></p>
<p><label>Postleitzahl: <input type="text" name="zip" value="<?php echo htmlspecialchars($user->getZip()); ?>"></label></p>
<p><label>Ort: <input type="text" name="city" value="<?php echo htmlspecialchars($user->getCity()); ?>"></label></p>
<p><label>Telefon: <input type="text" name="phone" value="<?php echo htmlspecialchars($user->getPhone()); ?>"></label></p>
<p><label>Bank: <input type="text" name="bank" value="<?php echo htmlspecialchars($user->getBank()); ?>"></label></p>
<p><label>IBAN: <input type="text" name="iban" value="<?php echo htmlspecialchars($user->getIban()); ?>"></label></p>
<p><label>BIC: <input type="text" name="bic" value="<?php echo htmlspecialchars($user->getBic()); ?>"></label></p>
<input type="submit" name="userEdit" value="Absenden">
</form>
<?php endif; ?>