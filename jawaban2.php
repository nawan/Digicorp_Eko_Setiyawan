<?php
class Siswa
{
    public $nrp;
    public $nama;
    public $daftarNilai = [];

    public function __construct($nrp, $nama)
    {
        $this->nrp = $nrp;
        $this->nama = $nama;
    }

    //menambahkan dan menampilkan mapel dan nilai
    public function TambahDaftarNilai($mapel, $nilai)
    {
        if (count($this->daftarNilai) < 3) {
            $this->daftarNilai[] = new Nilai($mapel, $nilai);
        }
    }
}

class Nilai
{
    public $mapel;
    public $nilai;

    public function __construct($mapel, $nilai)
    {
        $this->mapel = $mapel;
        $this->nilai = $nilai;
    }
}

/**JAWABAN A */

//membuat objek siswa
$siswa = new Siswa("1234567854", "Budi");

//menambahkan nilai ke dalam daftar nilai siswa
$siswa->TambahDaftarNilai("Inggris", 100);
$siswa->TambahDaftarNilai("Indonesia", 80);
$siswa->TambahDaftarNilai("Jepang", 70);

//cetak daftar nilai
echo "Daftar nilai Siswa " . $siswa->nama . " dengan No NRP " . $siswa->nrp . "\n";
foreach ($siswa->daftarNilai as $nilai) {
    echo "- Mapel:" . $nilai->mapel . ", Nilai:" . $nilai->nilai . "\n";
}

/**JAWABAN B */

//membuat siswa baru dengan mapel inggris nilainya 100
$siswa_baru = new Siswa('76423788238', 'Deni');
$siswa_baru->TambahDaftarNilai("Inggris", 100);

//cetak siswa baru
echo "\nInformasi Siswa Baru:\n";
echo "- NRP: " . $siswa_baru->nrp . "\n";
echo "- NRP: " . $siswa_baru->nama . "\n";
foreach ($siswa_baru->daftarNilai as $nilai) {
    echo "- Mapel: " . $nilai->mapel . ", Nilai: " . $nilai->nilai . "\n";
}


/**JAWABAN C */

//script random string
function random_string($banyaknya = 10)
{
    return substr(str_shuffle(str_repeat(
        $generateNama = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',
        ceil($banyaknya / strlen($generateNama))
    )), 1, $banyaknya);
}

//membuat array untuk menampilkan daftar siswa
for ($i = 1; $i < 10; $i++) {
    $nama = random_string();
    $daftarMapel = ["Inggris", "Indonesia", "Jepang"];
    $mapel = $daftarMapel[array_rand($daftarMapel)];
    $nilai = rand(0, 100);

    //objek
    $siswa = new Siswa(strval($i), $nama);
    $siswa->TambahDaftarNilai($mapel, $nilai);
    $daftarSiswa[] = $siswa;
}

//cetak info siswa yang digenerate
echo "\ndaftar 10 Siswa:\n";
foreach ($daftarSiswa as $siswa) {
    echo "- Nama: " . $siswa->nama . "\n";
    echo "- Daftar Nilai :\n";
    foreach ($siswa->daftarNilai as $nilai) {
        echo "- Mapel: " . $nilai->mapel . ", Nilai:" . $nilai->nilai . "\n";
    }
}
