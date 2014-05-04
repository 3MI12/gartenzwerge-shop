<h1>Media-Manager</h1>
<h3>upload image</h3>
<form method="post" enctype="multipart/form-data" action="template/snippet/upload-image.php">
Image: <input type="file" name="Image"><br>
Product ID: <input type="text" name="email"><br>
<input type="submit" name="Button" value="upload">
</form>

<h3>get image</h3>
<form method="post" action="template/snippet/get-image.php">
Product ID: <input type="text" name="email"><br>
<input type="submit" name="Button" value="download">
</form>