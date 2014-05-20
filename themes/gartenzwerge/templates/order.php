<?php //echo '<pre>'; var_dump($data); echo '</pre>'; ?>

<div class="title">
    Warenkorb
</div>

<?php require THEME_PATH . 'templates/errorList.php'; ?>

<?php if(empty($data['positions']) || !count($data['positions'])): ?>
	<div>Noch keine Artikel im Warenkorb.</div>
<?php else: ?>
<form id="orderShowForm" action="/cart/edit/" method="post">
	<?php $count = 1; $price = $data['price']; ?>
	<?php foreach($data['positions'] as $article): ?>
    
    <div class="subtitle">
    	Artikel <?php echo $count++; ?>
    </div>
    <div class="orderHr"></div>
         <div class="orderShowArticle">
            <label>Artikel</label><input type="text" value="<?php echo htmlspecialchars($article->getName()); ?>" readonly disabled="disabled"/>
            <label>Preis</label><input type="text" value="<?php echo number_format($article->getPrice(), 2); ?>" readonly disabled="disabled"/>
            <label>verfügbar</label><input type="text" value="<?php echo $article->getInventory(); ?>" readonly disabled="disabled"/>
            <label>Anzahl</label><input type="number" min="0" max="<?php echo $article->getInventory(); ?>" name="orderquantity[<?php echo $article->getArticleid(); ?>]" value="<?php echo $article->getQuantity(); ?>" size="2">
            
         </div>
	<?php endforeach; ?>
    <input id="warenkorbUpdate" type="submit" name="editcart" value="Warenkorb updaten">
    <div id="sumPrice">
    	Summe Artikel <span style="color:#D8A758;"> <?php echo number_format($price['articles'], 2); ?> €</span>
    </div>

	<div id="shippingFee">
		Verpackung & Versand <span style="color:#D8A758;"> <?php echo number_format($price['shipping'], 2); ?> €</span>
	</div>
	
    <div id="sumPrice">
    	Gesamtsumme <span style="color:#D8A758;"> <?php echo number_format($price['total'], 2); ?> €</span>
    </div>
    
</form>

<form id="orderShowBuy" action="/cart/order/" method="post">
	<label>jetzt <span style="color:#D8A758;">kostenpflichtig</span> bestellen</label><input type="submit" name="ordercart" value="">
</form>
<?php endif; ?>