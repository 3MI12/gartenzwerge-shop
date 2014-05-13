<?php //echo '<pre>'; var_dump($data); echo '</pre>'; ?>
<?php require TEMPLATE_PATH . 'filter.php'; ?>
<?php if(!empty($data['article'])): $article = $data['article']; ?>
       <div id="articleWrapper" class="content">
    	<div class="title">
        	<?php echo htmlspecialchars($article->getName()); ?>
        </div>

        <div class="article">
			<div class="articleDetailsWrapper">
				<div class="subtitle">
					Produktdetails
				</div>
                <div class="titleHr"></div>
			    <div class="articleDetails">
					<div class="articleImgContainer">
                    	<?php if(!empty($article->getImage())): ?>
                            <img src="<?php echo htmlspecialchars(FE_THEME_PATH . 'resourcen/images/' . $article->getImage()); ?>" alt="<?php echo htmlspecialchars($article->getName()); ?>" style="height:100%; width:auto; margin:auto auto;" >
                        <?php else: ?>
                            [Kein Artikelbild verfügbar.]
                        <?php endif; ?>
					</div>
                
                    	<form id="articleForm" action="/cart/edit/" method="post">
                            <div>
                            	<label>Artikelnummer</label> <input type="text" name="articelnummer" value="<?php echo htmlspecialchars($article->getArticlenumber()); ?>" readonly="readonly">
                            </div>
                            <div>
                            <label>Geschlecht</label> <input type="text" name="gender" value="<?php echo htmlspecialchars($article->getGender()); ?>" readonly="readonly">
                            </div>
                            <div>
                            <label>Größe</label> <input type="text" name="size" value="<?php echo htmlspecialchars($article->getSize()); ?>" readonly="readonly">
                            </div>
                            <div>
                            <label>Farbe</label> <input type="text" name="color" value="<?php echo htmlspecialchars($article->getColor()); ?>" readonly="readonly">
                            </div>
                            <div>
                            <label>Material</label> <input type="text" name="material" value="<?php echo htmlspecialchars($article->getMaterial()); ?>" readonly="readonly">
                            </div>
                            <div>
                            <label>Lagerbestand</label> <input type="text" name="inventory" value="<?php echo htmlspecialchars($article->getInventory()); ?>" readonly="readonly">
                            </div>
                            <div>
                            <label>Menge</label> <input class="menge" type="number" min="0" max="<?php echo ($article->getInventory()); ?>" name="orderquantity[<?php echo $article->getid(); ?>]" value="<?php echo $_SESSION['order']->getQuantityById($article->getid()); ?>" size="2"> <span>Stück im Warenkorb</span>
                            </div>
                            <div>für nur <span id="price"> <?php echo htmlspecialchars($article->getPrice()); ?> </span> inkl. MWST (<?php echo htmlspecialchars(number_format($article->getVat(), 2)); ?> %) </div>
                            <input id="btn-kaufen" type="submit" name="editcart" value="">
                            <!--<button id="btn-kaufen" type="button"></button>--> 
						</form>
                   
				</div>
			</div>
			<?php echo User::checkAdmin() ? '<form class="bearbeitenButton" action="/article/edit/<?php echo $article->getId(); ?>"><input type="submit" value="Bearbeiten"></form>' : '';?>
            </div>
            <div class="articleTextWrapper">
				<div class="subtitle">
					Produktbeschreibung
				</div>
                <div class="titleHr"></div>
                <div class="articleText">
                 
					<p>
                    	<?php echo htmlspecialchars($article->getDescription()); ?>
                    </p>
				</div>
			</div>
		</div>

	</div>
    
<?php else: ?>
Artikel nicht vorhanden.
<?php endif; ?>