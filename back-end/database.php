<?php
$stmt = null;
$host = "localhost";
$port = "3306";
$dbname = "project_abundance";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=$charset";
$dbusername = 'admin'; 
$dbpassword = 'admin';

$conn = new PDO($dsn, $dbusername, $dbpassword);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);