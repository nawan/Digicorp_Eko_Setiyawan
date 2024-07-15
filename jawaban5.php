<?php
function hitungKarakter($kalimat)
{
    //menghitung kemunculan setiap karakter dalam array
    $karakter = array_count_values(str_split($kalimat));

    //logika dalam mengambil karakter dengan kemunculan terbanyak
    arsort($karakter);
    $kemunculan = key($karakter);
    $hitung = current($karakter);

    //format output
    return "$kemunculan $hitung" . "X";
}
//memanggil method
echo hitungKarakter('welllcome') . "\n";
echo hitungKarakter('strawberry') . "\n";
