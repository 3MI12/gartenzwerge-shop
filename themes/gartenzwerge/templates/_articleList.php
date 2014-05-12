<?php require TEMPLATE_PATH . 'filter.php'; ?>
<h2>Artikelliste:</h2>
<ul>
<?php foreach($data['articles'] as $article): ?>
	<li>
		<a href="/article/list/<?php echo $article->getId(); ?>">
		<h3><?php echo htmlspecialchars($article->getName()); ?></h3>
		<?php if(!empty($article->getImage())): ?>
			<img src="<?php echo htmlspecialchars(FE_THEME_PATH . 'resourcen/images/' . $article->getImage()); ?>" alt="<?php echo htmlspecialchars($article->getName()); ?>">
		<?php else: ?>
			[Kein Artikelbild verfügbar.]
		<?php endif; ?>
		</a>
		<p>Preis: <?php echo number_format($article->getPrice(), 2); ?></p>
		<a href="/article/edit/<?php echo $article->getId(); ?>">[Bearbeiten]</a>
	</li>
<?php endforeach; ?>
</ul>