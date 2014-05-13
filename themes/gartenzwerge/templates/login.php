<div id="loginWrapper" class="content">
	<div class="title">
    Registrierung und Anmeldung
    </div>
    
    <div class="subtitle">
    	Anmeldung
    </div>
    <div class="titleHr"></div>
        <form id="loginForm" method="post" action="/user/login/">
       		<label>eMail</label> <input type="text" name="email" ><br>
        	<label>Password</label> <input type="text" name="password"><br>
        	<input name="login" class="submit" type="submit" value="Einloggen">
        </form>
     <div class="subtitle">
    	Registrierung
    </div>
    <div class="titleHr"></div>
       	<form id="regForm" method="post" action="/user/edit/">
            <label>Titel</label> <select id="" name="title" size="1"> <option value="Herr">Herr</option> <option value="Frau">Frau</option> </select><br>
            <label>Firstname</label> <input type="text" name="firstname"><br>
            <label>Lastname</label> <input type="text" name="lastname"><br>
            <label>eMail</label> <input type="text" name="email"><br>
            <label>Password</label> <input type="text" name="password"><br>
            <input class="submit" type="submit" name="userRegister" formmethod="post" value="Registrieren">
		</form>
  </div>



