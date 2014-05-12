<div id="filter">
		<form onsubmit="filter()">
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
               		<option value="-">-</option>
			  		<option value="blau">blau</option>
					<option value="rot">rot</option>
					<option value="braun">braun</option>
					<option value="blau">gelb</option>
					<option value="blau">gruen</option>
	    		</select>
		
                <label>Material</label>
				<select name="material" size="1">
                	<option value="-">-</option>
					<option value="keramik">Keramik</option>
					<option value="plastik">Plastik</option>
				</select>
			</div>
            <div id="rangeBox">
                <div id="rangeBoxMin">
                	<span>min. Größe</span>
                    <label>20cm</label>
                    <input type="range" name="groesseMin" value="20" min="20" max="80" onchange="updateRangeMinDisplay(this.value);" />
                    <label>80cm</label>
                    <input type="text" class="rangeDisplay" id="rangeMinDisplay" value="20" />
                </div>
                 <div id="rangeBoxMax">
                 	<span>max. Größe</span>
                    <label>80cm</label>
                    <input type="range" name="groesseMax" value="160" min="80" max="160" onchange="updateRangeMaxDisplay(this.value);" />
                    <label>160cm</label>
                    <input type="text" class="rangeDisplay" id="rangeMaxDisplay" value="160" />
                </div>
            </div>
          		
		</form>
        <button id="btn-filter" onclick="filter()
                ">filtern</button>
</div>