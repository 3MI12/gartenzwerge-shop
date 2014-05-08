<?php //echo '<pre>'; var_dump($data); echo '</pre>'; ?>
<?php if(!empty($data['article'])): $article = $data['article']; ?>
<h2>Artikel anlegen/bearbeiten</h2>
<?php require THEME_PATH . 'templates/errorList.php'; ?>
<form action="" method="post">
<label>Artikelnummer: <input type="text" name="articlenumber" value="<?php echo htmlspecialchars($article->getArticlenumber()); ?>"></label>
<label>Name: <input type="text" name="name" value="<?php echo htmlspecialchars($article->getname()); ?>"></label>
<label>Bildpfad: <input type="text" name="image" value="<?php echo htmlspecialchars($article->getimage()); ?>"></label>
<label>Geschlecht: <input type="text" name="gender" value="<?php echo htmlspecialchars($article->getgender()); ?>"></label>
<label>Größe: <input type="text" name="size" value="<?php echo htmlspecialchars($article->getsize()); ?>"></label>
<label>Farbe: <input type="text" name="color" value="<?php echo htmlspecialchars($article->getcolor()); ?>"></label>
<label>Material: <input type="text" name="material" value="<?php echo htmlspecialchars($article->getmaterial()); ?>"></label>
<label>Beschreibung: <textarea name="description"><?php echo htmlspecialchars($article->getdescription()); ?></textarea></label>
<label>Preis: <input type="text" name="price" value="<?php echo htmlspecialchars(number_format($article->getprice(), 2)); ?>"></label>
<label>MwSt: <input type="text" name="vat" value="<?php echo htmlspecialchars(number_format($article->getvat(), 2)); ?>"></label>
<label>Lagerbestand: <input type="text" name="inventory" value="<?php echo htmlspecialchars($article->getinventory()); ?>"></label>
<label>Kategorie: <input type="text" name="category" value="<?php echo htmlspecialchars($article->getcategory()); ?>"></label>
<label><input type="checkbox" name="active" value="1" <?php echo $article->getactive() ? 'checked' : ''; ?>> Aktiv</label>
<input type="submit" name="editsubmit" value="Absenden">
<input type="hidden" name="id" value="<?php echo htmlspecialchars($article->getid()); ?>">
</form>
<?php endif; ?>