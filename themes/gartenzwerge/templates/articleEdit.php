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
                                    <label>Artikelnummer</label> <input type="text" name="articlenumber" value="<?php echo htmlspecialchars($article->getArticlenumber()); ?>" required="required">
                                </div>
                                <div>
                                    <label>Name</label> <input type="text" name="name" value="<?php echo htmlspecialchars($article->getname()); ?>" required="required">
                                </div>
								<div>
			                    	<label>Bild</label> 
                                    <input type="text" name="imagePlaceholder" value="Durchsuchen...">
                                    <input type="file" name="image" value="<?php echo htmlspecialchars($article->getimage()); ?>">
			                    </div>
                                <div>
                                    <label>Geschlecht</label> 
                                    <select name="gender" required="required" >
                                    	<option selected="selected"><?php echo htmlspecialchars($article->getgender()); ?></option> 
                                    	<option value="male">male</option>
                                        <option value="female">female</option>
                                    </select>   
                                </div>
                                <div>
                                    <label>Größe</label> <input type="number" name="size" min="5" step="1" value="<?php echo htmlspecialchars($article->getsize()); ?>" required="required">
                                </div>
                                <div>
                                    <label>Farbe</label> 
                                    <select name="color" required="required" >
                                    	<option selected="selected"><?php echo htmlspecialchars($article->getcolor()); ?></option> 
                                    	<option value="blau">blau</option>
                                        <option value="rot">rot</option>
                                        <option value="gelb">gelb</option>
                                        <option value="grün">grün</option>
                                    </select>      
                                </div>
                                <div>
                                    <label>Material</label>
                                    <select name="material" required="required">
                                    	<option selected="selected"><?php echo htmlspecialchars($article->getmaterial()); ?></option> 
                                    	<option value="Keramik">Keramik</option>
                                        <option value="Plastik">Plastik</option>
                                        <option value="Papier">Papier</option>
                                        <option value="Holz">Holz</option>
                                    </select>      
                                </div>
                            </div>    
                            <div>
                                <div>
                                    <label>Lagerbestand</label> <input type="text" name="inventory" value="<?php echo htmlspecialchars($article->getinventory()); ?>" required="required">
                                </div>
                               <div>
                                    <label>Preis </label> <input type="number" min="1" step="1" name="price" value="<?php echo htmlspecialchars(number_format($article->getprice(), 2)); ?>"required="required">
                                </div>
                                <div>
                                    <label>MwSt</label> <input type="number" name="vat" min="19" step="1" value="<?php echo htmlspecialchars(number_format($article->getvat(), 2)); ?>"required="required">
                                </div>
                                <div>
                                    <label>Kategorie</label> 
                                     <select name="category" required="required" >
                                    	<option selected="selected"><?php echo htmlspecialchars($article->getcategory()); ?></option> 
                                    	<option value="Indoor">Indoor</option>
                                        <option value="Outdoor">Outdoor</option>
                                    </select> 
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
                            	<textarea name="description" required="required"><?php echo htmlspecialchars($article->getdescription()); ?></textarea>
                            </div>
                          		<input class="submit" type="submit" name="editsubmit" value="Absenden">
                            <!--<button id="btn-kaufen" type="button"></button>--> 
                            	<input type="hidden" name="id" value="<?php echo htmlspecialchars($article->getid()); ?>">
						</form>
                </div>
		</div>
	</div>
</div>
    