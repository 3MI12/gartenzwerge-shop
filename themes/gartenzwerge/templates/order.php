<?php //echo '<pre>'; var_dump($data); echo '</pre>'; ?>

<div class="title">
    Warenkorb
</div>

<?php require THEME_PATH . 'templates/errorList.php'; ?>
<?php if(!empty($data['positions'])): ?>

<form id="orderShowForm" action="/cart/edit/" method="post">
	<?php $articleInc = 1; ?>
	<?php foreach($data['positions'] as $position): $article = $position['article']; $quantity = $position['quantity']; ?>
    
    <div class="subtitle">
    	Artikel <?php echo $articleInc;  $articleInc++; ?>
    </div>
    <div class="orderHr"></div>
         <div class="orderShowArticle">
            <label>Artikel</label><input type="text" value="<?php echo htmlspecialchars($article->getName()); ?>" readonly disabled="disabled"/>
            <label>Preis</label><input type="text" value="<?php echo number_format($article->getPrice(), 2); ?>" readonly disabled="disabled"/>
            <label>verfügbar</label><input type="text" value="<?php echo $article->getInventory(); ?>" readonly disabled="disabled"/>
            <label>Anzahl</label><input type="number" min="0" max="<?php echo ($article->getInventory()); ?>" name="orderquantity[<?php echo $article->getid(); ?>]" value="<?php echo $quantity; ?>" size="2">
            
         </div>
	<?php endforeach; ?>
    <input id="warenkorbUpdate" type="submit" name="editcart" value="Warenkorb updaten">
    <div id="sumPrice">
    	Gesamtsumme <span style="color:#D8A758;"> <?php echo number_format($data['sumPrices'], 2); ?> €</span>
    </div>
    
</form>

<form id="orderShowBuy" action="/cart/order" method="post">
	<label>jetzt <span style="color:#D8A758;">kostenpflichtig</span> bestellen</label><input type="submit" name="ordercart" value="">
</form>

<?php else: ?>
<p>Noch keine Artikel im Warenkorb.</p>
<?php endif; ?>