<?php require THEME_PATH . 'templates/errorList.php'; ?>

<?php if(!empty($data['order'])): $order = $data['order']; $price = $order['price']; ?>
<div class="title">
    Bestellung im Detail
</div>

<div class="orderDetailWrapper">
            <div class="orderInfos">
            	<div><label>Benutzer</label><span><a href="/user/show/<?php echo $order['user']->getid(); ?>"><?php echo htmlspecialchars($order['user']->getName()); ?></a></span></div>
            	<div><label>bestellt am</label><span><?php echo $order['ordertime']->format(DATE_FORMAT); ?></span></div>
                <div><label>Summe Artikel</label><span><?php echo number_format($price['articles'], 2); ?> €</span></div>
                <div><label>Verpackung & Versand</label><span><?php echo number_format($price['shipping'], 2); ?> €</span></div>
                <div><label>Preis gesamt</label><span style="color:#D8A758;"><?php echo number_format($price['total'], 2); ?> €</span></div>
            </div>
</div>

<div class="subtitle">
	Artikel
</div>
<div class="titleHr"></div>

<?php foreach($data['order']['positions'] as $article): ?>
<div class="orderDetailWrapper">
            <div class="orderInfos">
            	<div><label>Artikel</label><span><?php echo htmlspecialchars($article->getName()); ?></span></div>
            	<div><label>Anzahl</label><span><?php echo $article->getQuantity(); ?></span></div>
                <div><label>Einzelpreis</label><span><?php echo number_format($article->getPrice(), 2); ?></span></div>
                <div><label>Preis</label><span style="color:#D8A758;"><?php echo number_format($article->getPrice() * $article->getQuantity(), 2); ?> €</span></div>
            </div>
</div>
<?php endforeach; ?>

<?php endif; ?>