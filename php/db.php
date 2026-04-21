<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$dbHost = "127.0.0.1";
$dbUser = "root";
$dbPass = "";
$dbName = "registration_form";

try {
    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
    $conn->set_charset("utf8mb4");
} catch (mysqli_sql_exception $exception) {
    http_response_code(500);
    exit("Database connection failed. Check php/db.php settings.");
}
