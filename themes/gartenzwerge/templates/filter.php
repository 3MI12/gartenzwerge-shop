<div id="filter">
		<form action="">
			<div id="filterCheckbox">
				<div>
                    <input type="checkbox" name="male" value="Männlich"> Männlich
                </div>	
                <div>
                    <input type="checkbox" name="female" value="Weiblich"> Weiblich
                </div>
			</div>

			<div id="filterSelectbox">
    			<label>Farbe</label>
	        	<select name="farbe" size="1">
			  		<option value="blau">blau</option>
					<option value="rot">rot</option>
					<option value="braun">braun</option>
					<option value="blau">gelb</option>
					<option value="blau">gruen</option>
	    		</select>
		
                <label>Material</label>
				<select name="material" size="1">
					<option value="keramik">Keramik</option>
					<option value="plastik">Plastik</option>
				</select>
			</div>
            <div id="rangeBox">
                <label>20</label><input type="range" name="preis" value="80" min="20" max="160" onchange="updateRangeDisplay(this.value);" /><label>160</label>
                <input type="text" id="rangeDisplay" value="80" />
            </div>
		</form>
</div>