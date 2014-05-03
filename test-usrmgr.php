<h1>UserManager</h1>
<h3>create sysuser</h3>
<form method="post" action="template/snippet/create-sysuser.php">
Titel: <select id="" name="title" size="1"> <option value="Herr">Herr</option> <option value="Frau">Frau</option> </select><br>
Firstname: <input type="text" name="firstname"><br>
Lastname: <input type="text" name="lastname"><br>
eMail: <input type="text" name="email"><br>
Password: <input type="text" name="password"><br>
<input type="submit" name="Button" value="submit">
</form>

<h3>update sysuser</h3>
<form method="post" action="template/snippet/create-sysuser.php">
eMail: <input type="text" name="email"><br>
Password: <input type="text" name="password"><br>

Firstname: <input type="text" name="firstname"><br>
Lastname: <input type="text" name="lastname"><br>
<input type="submit" name="Button" value="submit">
</form>

<h3>delete sysuser</h3>
<form method="post" action="template/snippet/delete-sysuser.php">
eMail: <input type="text" name="email"><br>
Password: <input type="text" name="password"><br>
<input type="submit" name="Button" value="submit">
</form>

<h3>show id sysuser</h3>
<form method="post" action="template/snippet/id-sysuser.php">
eMail: <input type="text" name="email"><br>
<input type="submit" name="Button" value="submit">
</form>

<h3>show sysuser</h3>
<form method="post" action="template/snippet/show-sysuser.php">
ID: <input type="text" name="id"><br>
<input type="submit" name="Button" value="submit">
</form>

<h3>login sysuser</h3>
<form method="post" action="template/snippet/login-sysuser.php">
eMail: <input type="text" name="email"><br>
Password: <input type="text" name="password"><br>
<input type="submit" name="Button" value="submit">
</form>