<?php $userMode = ($action == 'list'); ?>
<?php if(!empty($data['orders'])): ?>
<?php if($userMode): ?>
<h2>Ihre Bestellungen:</h2>
<?php else: ?>
<h2>Bestellungen:</h2>
<?php endif; ?>
<table>
	<thead>
		<tr>
			<?php if(!$userMode): ?><th>Benutzer</th><?php endif; ?>
			<th>bestellt am</th>
			<th>Preis gesamt</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data['orders'] as $orderId => $order): ?>
		<tr>
			<?php if(!$userMode): ?><td><?php echo htmlspecialchars($order['user']->getName()); ?></td><?php endif; ?>
			<td><?php echo $order['ordertime']->format(DATE_FORMAT); ?></td>
			<td><?php echo number_format($order['price']['total'], 2); ?> €</td>
			<td><a href="/order/detail/<?php echo $orderId; ?>">Details anschauen</a></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<?php else: ?>
<h2>Keine Bestellungen vorhanden</h2>
<?php endif; ?>