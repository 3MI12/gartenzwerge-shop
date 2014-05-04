<?php
require_once($_SERVER['DOCUMENT_ROOT']."/shop/shopUserManager.php");

echo loginUser($_POST["email"], $_POST["password"]);

