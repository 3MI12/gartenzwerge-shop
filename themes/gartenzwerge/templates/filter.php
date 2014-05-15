<div id="filter">
	<div id="filterError">
    	Es muss mindestens ein Geschlecht und mindestens eine Kategorie ausgewählt werden!	
    </div>
		<form onsubmit="filter()">
			<div id="filterCheckboxGender">
				<div>
                    <input type="checkbox" name="male" value="male" checked="checked"> Männlich
                </div>	
                <div>
                    <input type="checkbox" name="female" value="female" checked="checked"> Weiblich
                </div>
			</div>
            <div id="filterCheckboxCategory">
				<div>
                    <input type="checkbox" name="indoor" value="indoor" checked="checked"> Indoor
                </div>	
                <div>
                    <input type="checkbox" name="outdoor" value="outdoor" checked="checked"> Outdoor
                </div>
			</div>

			<div id="filterSelectbox">
    			<label>Farbe</label>
	        	<select name="farbe" size="1">
               		<option value="-">-</option>
			  		<option value="blau">blau</option>
					<option value="rot">rot</option>
					<option value="braun">braun</option>
					<option value="gelb">gelb</option>
	    		</select>
		
                <label>Material</label>
				<select name="material" size="1">
                	<option value="-">-</option>
					<option value="Keramik">Keramik</option>
					<option value="Plastik">Plastik</option>
				</select>
			</div>
            <div id="rangeBox">
                <div id="rangeBoxMin">
                	<div>
                		<input type="text" class="rangeDisplay" id="rangeMinDisplay" value="20" />cm
                    </div>
                    <input type="range" name="groesseMin" value="20" min="20" max="80" onchange="updateRangeMinDisplay(this.value);" />
                    
                </div>
                 <div id="rangeBoxMax">
                    <input type="range" name="groesseMax" value="160" min="80" max="160" onchange="updateRangeMaxDisplay(this.value);" />
                    <div>
                    	<input type="text" class="rangeDisplay" id="rangeMaxDisplay" value="160" />cm
                	</div>
                </div>
            </div>
          		
		</form>
        <button id="btn-filter" onclick="filter()
                ">Artikel filtern</button>
</div>