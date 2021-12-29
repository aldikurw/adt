<?php
require_once "../../config/app.php";

$authorized = false;
if (isset($_SESSION["level_akun"])) {
    if ($_SESSION["level_akun"] === "pelanggan") {
        $authorized = $db->has("pelanggan", ["id_pelanggan" => $_SESSION["id_pelanggan"]]);
        if (!$authorized) {
            header("Location: ../masuk");
            exit();
        }
    } elseif ($_SESSION["level_akun"] === "admin") {
        header("Location: ../../admin");
        exit();
    }
} else {
    header("Location: ../masuk");
    exit();
}