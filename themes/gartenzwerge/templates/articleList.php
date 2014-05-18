<?php require TEMPLATE_PATH . 'filter.php'; ?>

	<div class="title">
    	Artikelliste
    </div>

<div id="articleList">

<?php echo User::checkAdmin() ? '<form id="neuerArtikel" action="/article/edit/"><input type="submit" value="Neuer Artikel"></form>' : '';?>

<?php foreach($data['articles'] as $article): ?>
	<a class="articleListItemLink" href="/article/list/<?php echo $article->getId(); ?>">
		<div class="articleListItemWrapper">
            <div class="articleListImgContainer">
                <?php if(!empty($article->getImage())): ?>
                    <img src="<?php echo htmlspecialchars('/media/' . $article->getImage() .'-small.jpg'); ?>" alt="<?php echo htmlspecialchars($article->getName()); ?>" style="height:100%; width:auto; margin:auto auto;">
                <?php else: ?>
                    Kein<br />Artikelbild<br />verfügbar.
                <?php endif; ?>
            </div>
            <div class="articleInfos">
            	<div class="articleName"><label>Name</label><span><?php echo htmlspecialchars($article->getName()); ?></span></div>
            	<div class="articlePrice"><label>Preis in €</label><span><?php echo number_format($article->getPrice(), 2); ?></span></div>
                <div class="articleSize"><label>Größe in cm</label><span><?php echo htmlspecialchars($article->getSize(), 2); ?></span></div>
                <div class="articleGender"><label>Geschlecht</label><span><?php echo htmlspecialchars($article->getGender(), 2); ?></span></div>
                <div class="articleMaterial"><label>Material</label><span><?php echo htmlspecialchars($article->getMaterial(), 2); ?></span></div>
                <div class="articleColor"><label>Farbe</label><span><?php echo htmlspecialchars($article->getColor(), 2); ?></span></div>
                <div class="articleCategory"><label>Kategorie</label><span><?php echo htmlspecialchars($article->getCategory(), 2); ?></span></div>
            </div>
            <?php echo User::checkAdmin() ? '<form class="bearbeitenButton" action="/article/edit/'.$article->getId().'"><input type="submit" value="Bearbeiten"></form>' : '';?>
        </div>
		</a>
		
<?php endforeach; ?>

</div>