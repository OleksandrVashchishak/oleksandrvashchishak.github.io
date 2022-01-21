<?php 

$servertype = "mysql"; // mysql, pgsql
$servername = "localhost:3306";
$serverport = 3306; // mysql: 3306, pgsql: 5432
$username = "cyborgle_wp_ycaln";
$password = "tX##xRaw25a5$#oSIJ^35t";
$dbname = "cyborgle_wp_cybl";
$tablename = "metamaskDB";

try {
        if ($servertype == "pgsql") {
                $dsn = "pgsql:host=$servername;port=$serverport;dbname=$dbname;";
        } elseif ($servertype == "mysql") {
                $dsn = "mysql:host=$servername;port=$serverport;dbname=$dbname;";
        } else {
                die ('DB config error');
        }
        $conn = new PDO($dsn, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e) {
        die($e->getMessage());
}
