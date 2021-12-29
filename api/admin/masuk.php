<?php
require_once "../../config/app.php";

$response["success"] = false;
$response["message"] = "Terjadi kesalahan";

$data = json_decode(file_get_contents("php://input"));
$result = $db->select("admin", "id_admin", ["username" => $data->username, "password" =>$data->password]);
if (count($result)) {
    $_SESSION["id_admin"] = $result[0];
    $_SESSION["level_akun"] = "admin";

    $response["success"] = true;
    $response["message"] = "Berhasil login";
} else {
    $response["message"] = "Username atau password salah";
}
echo json_encode($response);