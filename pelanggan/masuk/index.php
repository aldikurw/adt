<?php
require_once "../../config/app.php";

$authorized = false;
if (isset($_SESSION["level_akun"])) {
    if ($_SESSION["level_akun"] === "pelanggan") {
        $authorized = $db->has("pelanggan", ["id_pelanggan" => $_SESSION["id_pelanggan"]]);
        if ($authorized) {
            header("Location: ../dashboard");
            exit();
        }
    } else {
        header("Location: ../../admin");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk Pelanggan</title>
    <link rel="shortcut icon" href="../../assets/images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="stylesheet" href="../../assets/css/pages/auth.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="../../assets/js/app.js"></script>
</head>

<body>
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="../.."><img src="../../assets/images/logo/logo.png" alt="Logo"></a>
                </div>

                <h1 class="auth-title"><a href="../.."><</a> Masuk</h1>

                <form>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" name="username" placeholder="#">
                        <label>Username</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" placeholder="#">
                        <label>Password</label>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg">Masuk</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Belum mempunyai akun? <a href="daftar" class="font-bold"
                                                                      >Daftar</a>.</p>
                    <!--                        <p><a class="font-bold" href="auth-forgot-password.html">Lupa kata sandi?</a>.</p>-->
                </div>

            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    document.forms[0].onsubmit = evt => {
        evt.preventDefault();
        fetch("../../api/pelanggan/masuk.php", {
            method: "POST",
            body: formDataToJson(new FormData(document.forms[0]))
        })
            .then(response => response.json())
            .then(result => {
                if (result.success) {
                    location.href = "../dashboard";
                } else {
                    showToast(result.success, result.message);
                }
            });
    }
</script>
</body>

</html>
