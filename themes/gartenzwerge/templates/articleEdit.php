<?php if(!empty($data['article'])): $article = $data['article']; ?>
<h2>Artikel anlegen/bearbeiten</h2>
<form action="" method="post">
<label>Artikelnummer: <input type="text" name="articlenumber" value="<?php echo htmlspecialchars($article['articlenumber']); ?>"></label>
<label>Name: <input type="text" name="name" value="<?php echo htmlspecialchars($article['name']); ?>"></label>
<label>Bildpfad: <input type="text" name="image" value="<?php echo htmlspecialchars($article['image']); ?>"></label>
<label>Geschlecht: <input type="text" name="gender" value="<?php echo htmlspecialchars($article['gender']); ?>"></label>
<label>Größe: <input type="text" name="size" value="<?php echo htmlspecialchars($article['size']); ?>"></label>
<label>Farbe: <input type="text" name="color" value="<?php echo htmlspecialchars($article['color']); ?>"></label>
<label>Material: <input type="text" name="material" value="<?php echo htmlspecialchars($article['material']); ?>"></label>
<label>Beschreibung: <textarea name="description"><?php echo htmlspecialchars($article['description']); ?></textarea></label>
<label>Preis: <input type="text" name="price" value="<?php echo htmlspecialchars($article['price']); ?>"></label>
<label>MwSt: <input type="text" name="vat" value="<?php echo htmlspecialchars($article['vat']); ?>"></label>
<label>Lagerbestand: <input type="text" name="inventory" value="<?php echo htmlspecialchars($article['inventory']); ?>"></label>
<label>Kategorie: <input type="text" name="category" value="<?php echo htmlspecialchars($article['category']); ?>"></label>
<input type="submit" name="editsubmit" value="Absenden">
<input type="hidden" name="id" value="<?php echo htmlspecialchars($article['id']); ?>">
</form>
<?php endif; ?>