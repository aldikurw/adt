<?php
require_once "../../config/app.php";

if (isset($_SESSION["id_pelanggan"])) {
    $id_exist = $db->has("pelanggan", ["id_pelanggan" => $_SESSION["id_pelanggan"]]);
    if ($id_exist) {
        header("Location: ../dashboard");
        exit();
    } else {
        session_destroy();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pelanggan</title>
    <link rel="shortcut icon" href="../../assets/images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../../assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="../../assets/css/app.css">
    <link rel="stylesheet" href="../../assets/css/pages/auth.css">
</head>

<body>
<div id="auth">

    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <div class="auth-logo">
                    <a href="../.."><img src="../../assets/images/logo/logo.png" alt="Logo"></a>
                </div>

                <h1 class="auth-title"><a href="../.."><</a> Daftar</h1>

                <form>
                    <div class="col-12 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="nama_lengkap" placeholder="#" required>
                            <label for="nama_lengkap">Nama Lengkap</label>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="username" placeholder="#" required>
                            <label for="username">Username</label>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-6 mb-3">
                        <div class="form-floating input-group">
                            <input type="password" class="form-control" name="password" placeholder="#" required>
                            <div class="input-group-text" style="font-size: 0.8em">
                                <input class="form-check-input me-2" type="checkbox" name="show_password"> Show
                            </div>
                            <label for="password">Password</label>
                        </div>
                    </div>

                    <div class="col-6 col-md-12 mb-3">
                        <div class="form-floating">
                            <select class="form-select" name="jenis_layanan" required>
                                <option value="" selected disabled hidden>Pilih</option>
                                <option value="Home">Home</option>
                                <option value="Hotspot voucher">Hotspot voucher</option>
                            </select>
                            <label for="jenis_layanan">Jenis layanan</label>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mb-3 d-none">
                        <div class="form-floating">
                            <select class="form-select" name="paket_home_wifi" required>
                                <option value="" selected disabled hidden>Pilih</option>
                            </select>
                            <label for="paket_home_wifi">Paket home wifi</label>
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="nik" placeholder="NIK" required>
                            <label for="nik">NIK</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="form-floating">
                            <select class="form-select" name="jenis_kelamin" required>
                                <option value="" selected disabled hidden>Pilih</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                        </div>

                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="kontak" placeholder="Kontak" required>
                            <label for="kontak">Kontak</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-3">
                        <div class="input-group form-floating">
                            <select class="form-select" name="alamat" required>
                                <option value="" selected disabled hidden>Pilih</option>
                                <option value="_alamat_lain">Lainnya</option>
                            </select>
                            <label for="alamat">Alamat</label>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mb-3 d-none">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="alamat_lain" placeholder="Alamat lain">
                            <label for="alamat_lain">Alamat lain</label>
                        </div>
                    </div>
                    <div class="col-12 position-relative mb-3">
                        <label>Pin alamat</label>
                        <input type="hidden" name="lng" required>
                        <input type="hidden" name="lat" required>
                        <div class="map" id="daftar-map"></div>
                    </div>
                    <div class="col-12">
                        <label>Foto KTP</label>
                        <input type="file" class="filepond" name="foto_ktp" data-max-file-size="3MB">
                    </div>
                    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Daftar</button>
                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class="text-gray-600">Sudah mempunyai akun? <a href="../masuk" class="font-bold"
                                                                      >Masuk</a>.</p>
                </div>

            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">

            </div>
        </div>
    </div>

</div>
</body>

</html>
