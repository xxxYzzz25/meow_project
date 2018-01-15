<?php
$dsn = "mysql:host=localhost;port=3306;dbname=bd103g2;charset=utf8";
$user = "root";
$psw = "acSql3306";
$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION);
$pdo = new PDO( $dsn, $user,$psw, $options );
?>