<?php if(!empty($data['user'])): $user = $data['user']; ?>
<div class="title">
    Nutzerkonto bearbeiten
</div>

<?php require THEME_PATH . 'templates/errorList.php'; ?>
<form id="userEditForm" action="" method="post">
<div>
    <label>Titel</label> <input type="text" name="title" value="<?php echo htmlspecialchars($user->getTitle()); ?>" required="required">
    <label>Vorname</label> <input type="text" name="firstname" value="<?php echo htmlspecialchars($user->getFirstname()); ?>" required="required">
    <label>Nachname</label><input type="text" name="lastname" value="<?php echo htmlspecialchars($user->getLastname()); ?>" required="required">
    <label>eMail</label><input type="text" name="email" value="<?php echo htmlspecialchars($user->getEmail()); ?>" required="required">
    <label>Passwort</label><input type="password" name="password" value="" required="required">
    <input type="submit" class="submit" name="userEdit" value="Speichern">
</div>
<div>
    <label>Straße</label><input type="text" name="street" value="<?php echo htmlspecialchars($user->getStreet()); ?>">
    <label>Postleitzahl</label><input type="text" name="zip" value="<?php echo htmlspecialchars($user->getZip()); ?>">
    <label>Ort</label><input type="text" name="city" value="<?php echo htmlspecialchars($user->getCity()); ?>">
    <label>Telefon</label><input type="text" name="phone" value="<?php echo htmlspecialchars($user->getPhone()); ?>">
    <label>Bank</label><input type="text" name="bank" value="<?php echo htmlspecialchars($user->getBank()); ?>">
    <label>IBAN</label><input type="text" name="iban" value="<?php echo htmlspecialchars($user->getIban()); ?>">
    <label>BIC</label><input type="text" name="bic" value="<?php echo htmlspecialchars($user->getBic()); ?>">
</div>

</form>
<?php endif; ?>