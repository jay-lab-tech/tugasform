<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="bank_tarik.php" method="post">
    <label for="nasabah">Pilih Nasabah:</label>
    <select id="nasabah" name="no_rekening">
        <option value="123">Budi Santoso</option>
        <option value="321">Siti Aminah</option>
        <option value="213">Joko Widodo</option>
    </select>
    <br><br>
    <label for="tarik">masukan saldi yang inign anda tarik</label>
    <input type="number" id="jumlah_tarik" name="jumlah_tarik" min="10000" required>
    <input type="submit" value="Tarik Uang">
</form>
    <?php
    $data_nasabah = [
    "123" => [
        "nama" => "Budi Santoso",
        "saldo" => 5000000
    ],
    "321" => [
        "nama" => "Siti Aminah",
        "saldo" => 7500000
    ],
    "213" => [
        "nama" => "Joko Widodo",
        "saldo" => 12000000
    ]
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $no_rekening = $_POST['no_rekening'];
    $jumlah_tarik = (int)$_POST['jumlah_tarik'];

    if (array_key_exists($no_rekening, $data_nasabah)) {

        $nasabah = $data_nasabah[$no_rekening];
        $saldo_sekarang = $nasabah['saldo'];

        if ($saldo_sekarang >= $jumlah_tarik) {

            $data_nasabah[$no_rekening]['saldo'] += $jumlah_tarik;

            echo "Penarikan berhasil!<br>";
            echo "Nasabah: " . htmlspecialchars($nasabah['nama']) . "<br>";
            echo "Jumlah ditarik: Rp " . number_format($jumlah_tarik, 2, ',', '.') . "<br>";
            echo "Saldo sebelumnya: Rp " . number_format($saldo_sekarang, 2, ',', '.') . "<br>";
            echo "Sisa Saldo: Rp " . number_format($data_nasabah[$no_rekening]['saldo'], 2, ',', '.');
            
        } else {

            echo "Maaf, saldo tidak mencukupi untuk melakukan penarikan ini.<br>";
            echo "Saldo Anda saat ini: Rp " . number_format($saldo_sekarang, 2, ',', '.');
        }

    } else {
        echo "Nomor rekening tidak valid.";
    }
}
?>
</body>
</html>