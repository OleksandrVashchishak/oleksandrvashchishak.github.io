<?php
$servername = "db23";
$username = "testsoftb_blog";
$password = "qhBEAiLNW";
$BDname = "testsoftb_blog";

$mysqli = new mysqli($servername, $username, $password, $BDname);
$mysqli->set_charset("utf8mb4");

if ($mysqli -> connect_error) {
    printf("Error DB: %s\n", $mysqli -> connect_error);
    exit();
};