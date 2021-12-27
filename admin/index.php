<?php
session_start();

if (isset($_SESSION["id_pelanggan"])) {
    header("Location: dashboard");
} else {
    header("Location: masuk");
}