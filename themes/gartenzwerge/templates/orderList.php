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
            	<div><label>Benutzer</label><span><?php if(!$userMode): ?> <?php echo htmlspecialchars($order['user']->getName()); ?> <?php endif; ?></span></div>
            	<div><label>bestellt am</label><span><?php echo $order['ordertime']->format(DATE_FORMAT); ?></span></div>
                <div><label>Preis gesamt</label><span><?php echo number_format($order['price']['total'], 2); ?> €</span></div>
            </div>
            <form class="orderDetailButton" action="/order/detail/<?php echo $orderId; ?>">
            	<input class="submit" type="submit" value="Detail">
            </form>
        </div>
<?php endforeach; ?>

<?php else: ?>
<h2>Keine Bestellungen vorhanden</h2>
<?php endif; ?>