<?php //echo '<pre>'; var_dump($data); echo '</pre>'; ?>
<?php require TEMPLATE_PATH . 'filter.php'; ?>
<?php if(!empty($data['article'])): $article = $data['article']; ?>
	<h3><?php echo htmlspecialchars($article->getName()); ?></h3>
	<?php if(!empty($article->getImage())): ?>
		<img src="<?php echo htmlspecialchars(FE_THEME_PATH . 'resourcen/images/' . $article->getImage()); ?>" alt="<?php echo htmlspecialchars($article->getName()); ?>">
	<?php else: ?>
		[Kein Artikelbild verfügbar.]
	<?php endif; ?>
	<p><?php echo htmlspecialchars($article->getDescription()); ?></p>
	<dl>
		<dt>Kategorie:</dt>
		<dd><?php echo htmlspecialchars($article->getCategory()); ?></dd>
		<dt>Artikelnummer:</dt>
		<dd><?php echo htmlspecialchars($article->getArticlenumber()); ?></dd>
		<dt>Geschlecht:</dt>
		<dd><?php echo htmlspecialchars($article->getGender()); ?></dd>
		<dt>Größe:</dt>
		<dd><?php echo htmlspecialchars($article->getSize()); ?></dd>
		<dt>Farbe:</dt>
		<dd><?php echo htmlspecialchars($article->getColor()); ?></dd>
		<dt>Material:</dt>
		<dd><?php echo htmlspecialchars($article->getMaterial()); ?></dd>
		<dt>Preis:</dt>
		<dd><?php echo htmlspecialchars(number_format($article->getPrice(), 2)); ?> EUR</dd>
		<dt>MwSt:</dt>
		<dd><?php echo htmlspecialchars(number_format($article->getVat(), 2)); ?> %</dd>
		<dt>Lagerbestand:</dt>
		<dd><?php echo htmlspecialchars($article->getInventory()); ?></dd>
	</dl>
	<form action="/cart/edit/" method="post">
	<input type="number" min="0" max="<?php echo ($article->getInventory()); ?>" name="orderquantity[<?php echo $article->getid(); ?>]" value="<?php echo $_SESSION['order']->getQuantityById($article->getid()); ?>" size="2"> Stück im Warenkorb
	<input type="submit" name="editcart" value="updaten">
	</form>
	<a href="/article/edit/<?php echo $article->getId(); ?>">[Bearbeiten]</a>
<?php else: ?>
Artikel nicht vorhanden.
<?php endif; ?>