<?php
require_once($_SERVER['DOCUMENT_ROOT']."/shop/shopUserManager.php");

createSysUser($_POST["title"], $_POST["firstname"], $_POST["lastname"], $_POST["email"], $_POST["password"]);