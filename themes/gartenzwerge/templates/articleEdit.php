<?php //echo '<pre>'; var_dump($data); echo '</pre>'; ?>

<?php if(!empty($data['article'])): $article = $data['article']; ?>

<?php require THEME_PATH . 'templates/errorList.php'; ?>

<?php endif; ?>

<div id="articleWrapper" class="content">
    	<div class="title">
        	Artikel anlegen/bearbeiten
        </div>

        <div class="article">
			<div class="articleDetailsWrapper">
				<div class="articleDetails">
					
                
                    	<form id="articleEditForm" action="" method="post" enctype="multipart/form-data">
                        	<div class="articleImgContainer">
                  				<?php if(!empty($article->getImage())): ?>
		                            <img src="<?php echo htmlspecialchars('/media/'. $article->getImage() . '-medium.jpg'); ?>" alt="<?php echo htmlspecialchars($article->getName()); ?>" style="height:100%; width:auto; margin:auto auto;" >
		                        <?php else: ?>
		                            [Kein Artikelbild verfügbar.]
		                        <?php endif; ?>
                    		</div>
                            <div>
                                <div>
                                    <label>Artikelnummer</label> <input type="text" name="articlenumber" value="<?php echo htmlspecialchars($article->getArticlenumber()); ?>">
                                </div>
                                <div>
                                    <label>Name</label> <input type="text" name="name" value="<?php echo htmlspecialchars($article->getname()); ?>">
                                </div>
								<div>
			                    	<label>Bild</label> <input type="file" name="image" value="<?php echo htmlspecialchars($article->getimage()); ?>">
			                    </div>
                                <div>
                                    <label>Geschlecht</label> <input type="text" name="gender" value="<?php echo htmlspecialchars($article->getgender()); ?>">
                                </div>
                                <div>
                                    <label>Größe</label> <input type="text" name="size" value="<?php echo htmlspecialchars($article->getsize()); ?>">
                                </div>
                                <div>
                                    <label>Farbe</label> <input type="text" name="color" value="<?php echo htmlspecialchars($article->getcolor()); ?>">
                                </div>
                                <div>
                                    <label>Material</label> <input type="text" name="material" value="<?php echo htmlspecialchars($article->getmaterial()); ?>">
                                </div>
                            </div>    
                            <div>
                                <div>
                                    <label>Lagerbestand</label> <input type="text" name="inventory" value="<?php echo htmlspecialchars($article->getinventory()); ?>">
                                </div>
                               <div>
                                    <label>Preis </label> <input type="text" name="price" value="<?php echo htmlspecialchars(number_format($article->getprice(), 2)); ?>">
                                </div>
                                <div>
                                    <label>MwSt</label> <input type="text" name="vat" value="<?php echo htmlspecialchars(number_format($article->getvat(), 2)); ?>">
                                </div>
                                <div>
                                    <label>Kategorie</label> <input type="text" name="category" value="<?php echo htmlspecialchars($article->getcategory()); ?>">
                                </div>
                                
                                <div>
                                    <label>Aktiv</label>
                                    <div class="checkboxArticleActive">
                                        <input type="checkbox" name="active" value="1" <?php echo $article->getactive() ? 'checked' : ''; ?>>
                                        <label id="checkboxInput"></label>
  									</div>
                                </div> 
                            </div>
                            <div>
                            	<textarea name="description"><?php echo htmlspecialchars($article->getdescription()); ?></textarea>
                            </div>
                          		<input class="submit" type="submit" name="editsubmit" value="Absenden">
                            <!--<button id="btn-kaufen" type="button"></button>--> 
                            	<input type="hidden" name="id" value="<?php echo htmlspecialchars($article->getid()); ?>">
						</form>
                   
				</div>
		
            
		</div>

	</div>
</div>
    