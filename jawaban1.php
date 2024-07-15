<?php
function generate($user)
{
    //cek apakah user sudah memiliki array token apa belum
    if (!isset($_SESSION['tokens'][$user])) {
        $_SESSION['tokens'][$user] = [];
    }

    //generate random token
    $token = bin2hex(random_bytes(16));

    //input token ke dalam array
    array_push($_SESSION['tokens'][$user], $token);
    //jika jumlah token melebihi 10, hapus token paling awal
    if (count($_SESSION['tokens'][$user]) > 10) {
        array_shift($_SESSION['tokens'][$user]);
    }

    //mengembalikan hasil generate
    return $token;
}

function verify_token($user, $token)
{
    //mengecek apakah user memiliki token
    if (isset($_SESSION['tokens'][$user])) {
        //mencari token
        $cari = array_search(
            $token,
            $_SESSION['tokens'][$user],
            true
        );
        //jika token ditemukan
        if ($cari !== false) {
            unset($_SESSION['tokens'][$user][$cari]);
            return true;
        }
        //jika token ditak ketemu atau tidak sama
        return false;
    }
}


session_start();
/**JAWABAN A */
//generate
$user = "Budi Doremi";
$token1 = generate($user);
$token2 = generate($user);

//cetak
echo "Token 1 => $user: $token1\n";
echo "Token 2 => $user: $token2\n";

/**JAWABAN B */
//verifikasi token 1
$findToken = verify_token($user, $token1);
if ($findToken) {
    echo "Token 1 Berhasil Terverifikasi dan Terhapus. \n";
} else {
    echo "Token 1 Tidak Ditemukan";
}

//verifikasi token 2
$findToken = verify_token($user, $token2);
if ($findToken) {
    echo "Token 2 Berhasil Terverifikasi dan Terhapus. \n";
} else {
    echo "Token 2 Tidak Ditemukan";
}

session_destroy();
