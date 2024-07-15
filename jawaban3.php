<?php
//array lampu
$lampu = ['merah', 'kuning', 'hijau'];
//mendefinisikan urutan array
$array = 0;

function tampilLampu()
{
    global $lampu, $array;

    //logika dalam menampilkan array
    $warna = $lampu[$array];
    //operasi ketika array ditampilkan maka akan menjalankan array berikutnya
    //namun jika urutan array sudah paling terakhir maka akan kembali ke awal
    $array = ($array + 1) % count($lampu);
    return $warna;
}

echo tampilLampu() . "\n"; //merah
echo tampilLampu() . "\n"; //kuning
echo tampilLampu() . "\n"; //hijau
echo tampilLampu() . "\n"; //merah lagi
