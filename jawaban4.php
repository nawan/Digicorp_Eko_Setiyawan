<?php
function cari_bilangan_terbesar_kedua($angka)
{
    //validasi jika di dalam array angkanya tidak lebih dari 2
    if (count($angka) < 2) {
        return null;
    }

    //mengurutkan angka menjadi array
    rsort($angka);

    //menampilkan urutan angka terbesar kedua, urutan pertama array [0]
    return $angka[1];
}

//mendeklarasikan suatu array
$data = [4, 3, 2, 1, 5];
echo cari_bilangan_terbesar_kedua($data);
