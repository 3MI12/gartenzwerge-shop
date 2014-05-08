<?php //echo '<pre>'; var_dump($data); echo '</pre>'; ?>
<h2>Warenkorb</h2>
<?php require THEME_PATH . 'templates/errorList.php'; ?>
<?php if(!empty($data['positions'])): ?>
<form action="/cart/edit/" method="post">
	<table>
		<thead>
			<tr><th>Artikel</th><th>Preis</th><th>verfügbar</th><th>Anzahl</th></tr>
		</thead>
		<tfoot>
			<tr><td colspan="4">Gesamtsumme: <?php echo number_format($data['sumPrices'], 2); ?></td></tr>
			<tr><td colspan="4"><input type="submit" name="editcart" value="Warenkorb updaten"></td></tr>
		</tfoot>
		<tbody>
		<?php foreach($data['positions'] as $position): $article = $position['article']; $quantity = $position['quantity']; ?>
			<tr>
				<td><?php echo htmlspecialchars($article->getName()); ?></td>
				<td><?php echo number_format($article->getPrice(), 2); ?></td>
				<td><?php echo $article->getInventory(); ?></td>
				<td><input type="number" min="0" max="<?php echo ($article->getInventory()); ?>" name="orderquantity[<?php echo $article->getid(); ?>]" value="<?php echo $quantity; ?>" size="2"> Stück</td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</form>
<form action="/cart/order" method="post">
<input type="submit" name="ordercart" value="Kostenpflichtig bestellen">
</form>
<?php else: ?>
<p>Noch keine Artikel im Warenkorb.</p>
<?php endif; ?>