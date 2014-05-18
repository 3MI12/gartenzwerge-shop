<?php require THEME_PATH . 'templates/errorList.php'; ?>

<?php if(!empty($data['order'])): $order = $data['order']; $price = $order['price']; ?>
<h2>Bestellungs-Details:</h2>
<dl>
	<dt>Benutzer:</dt><dd><a href="/user/show/<?php echo $order['user']->getid(); ?>"><?php echo htmlspecialchars($order['user']->getName()); ?></a></dd>
	<dt>bestellt am:</dt><dd><?php echo $order['ordertime']->format(DATE_FORMAT); ?></dd>
	<dt>Summe Artikel:</dt><dd><?php echo number_format($price['articles'], 2); ?> €</dd>
	<dt>Verpackung & Versand:</dt><dd><?php echo number_format($price['shipping'], 2); ?> €</dd>
	<dt>Preis gesamt:</dt><dd><?php echo number_format($price['total'], 2); ?> €</dd>
</dl>
<table>
	<caption>Artikel</caption>
	<thead>
		<tr>
			<th>Artikel</th>
			<th>Anzahl</th>
			<th>Einzelpreis</th>
			<th>Preis</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data['order']['positions'] as $article): ?>
		<tr>
			<td><?php echo htmlspecialchars($article->getName()); ?></td>
			<td><?php echo $article->getQuantity(); ?></td>
			<td><?php echo number_format($article->getPrice(), 2); ?></td>
			<td><?php echo number_format($article->getPrice() * $article->getQuantity(), 2); ?> €</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php endif; ?>