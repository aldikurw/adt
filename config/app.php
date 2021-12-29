<?php
session_start();
date_default_timezone_set("Asia/Jakarta");

require_once "Medoo.php";

use Medoo\Medoo;

$config["host"] = "localhost";
$config["username"] = "root";
$config["password"] = "";
$config["db"] = "my-isp";

$db = new Medoo([
    'type' => 'mysql',
    'host' => $config["host"],
    'database' => $config["db"],
    'username' => $config["username"],
    'password' => $config["password"]
]);

$sql_details = array(
    'host' => $config["host"],
    'user' => $config["username"],
    'pass' => $config["password"],
    'db'   => $config["db"]
);

if (!$db->has("tahun", ["tahun" => date("Y")])) {
    $db->insert("tahun", ["tahun" => date("Y")]);
}


$response["success"] = false;
$response["message"] = "Terjadi kesalahan";