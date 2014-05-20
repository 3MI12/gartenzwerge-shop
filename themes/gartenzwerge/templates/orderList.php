<?php $userMode = ($action == 'list'); ?>
<?php if(!empty($data['orders'])): ?>
<?php if($userMode): ?>
<div class="title">
    Meine Bestellungen
</div>
<?php else: ?>
<div class="title">
    Bestellungen
</div>
<?php endif; ?>

<?php foreach($data['orders'] as $orderId => $order): ?>
<div class="orderListItemWrapper">
            <div class="orderInfos">
            	<?php if(!$userMode): ?><div><label>Benutzer</label><span> <?php echo htmlspecialchars($order['user']->getName()); ?></span></div><?php endif; ?>
            	<div><label>bestellt am</label><span><?php echo $order['ordertime']->format(DATE_FORMAT); ?></span></div>
                <div><label>Preis gesamt</label><span><?php echo number_format($order['price']['total'], 2); ?> €</span></div>
            </div>
            <form class="orderDetailButton" action="/order/detail/<?php echo $orderId; ?>">
            	<input class="submit" type="submit" value="Detail">
            </form>
			<?php if(!$order['canceled']): if(user::checkAdmin()): ?>
            <form class="orderCancelButton" action="/order/cancel/<?php echo $orderId; ?>">
            	<input class="submit" type="submit" value="Stornieren">
            </form>
			<?php endif; else: ?>
				<span class="orderCanceled">Storniert!</span>
			<?php endif; ?>
        </div>
<?php endforeach; ?>

<?php else: ?>
<h2>Keine Bestellungen vorhanden</h2>
<?php endif; ?>