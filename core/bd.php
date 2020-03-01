<?php
$bdConnect = mysqli_connect('localhost', 'root', '','marlintesttask');

mysqli_query($bdConnect, "SET NAMES 'utf8'");
/* check connection */
if (!$bdConnect) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


$driver = 'mysql'; // тип базы данных, с которой мы будем работать

$host = 'localhost';// альтернатива '127.0.0.1' - адрес хоста, в нашем случае локального

$db_name = 'marlintesttask'; // имя базы данных

$db_user = 'root'; // имя пользователя для базы данных

$db_password = ''; // пароль пользователя

$charset = 'utf8'; // кодировка по умолчанию

$dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";


$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];


$pdo = new PDO($dsn, $db_user, $db_password, $options);