<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bank App</title>
</head>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }
    .nav {
        margin-bottom: 20px;
        padding: 10px;
        background-color: #224fd6ff;
        color: white;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    a {
        margin-right: 10px;
        color: white;
        text-decoration: none;
        border: none;
    }
    form {
        margin-bottom: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        

    }
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        font-size: large;

    }
    input[type="number"], select {
        width: 80%;
        padding: 5px;
        margin-bottom: 10px;
    }
    input[type="submit"] {
        padding: 10px 15px;
        background-color: #224fd6ff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    .c{
        display: flex;
        justify-content: center;
    }
    .card {
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
        width: 300px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        align-items: center;
    }
    option {
        padding: 5px;
        font-size: large;
        background-color: #f9f9f9;
        color: #333;
    }
    .hasil-box {
        background: rgba(34, 79, 214, 0.15);
        border: 1px solid #224fd6ff;
        border-radius: 8px;
        padding: 15px;
        margin-top: 15px;
        color: #224fd6ff;
        font-weight: bold;
    }
</style>
<body>
    <div class="nav">
        <a href="?page=cek">Cek Saldo</a> | 
        <a href="?page=setor">Setor</a> | 
        <a href="?page=tarik">Tarik</a>
    <hr>
    </div>
    <div class="c">
        <div class="card">
            <?php
            $data_nasabah = [
                "123" => ["nama" => "Galih", "saldo" => 5000000],
                "321" => ["nama" => "Azhar", "saldo" => 7500000],
                "213" => ["nama" => "Daffa", "saldo" => 12000000]
            ];

            $page = isset($_GET['page']) ? $_GET['page'] : 'cek';

            // Halaman cek saldo
            if ($page == 'cek') {
                ?>
                <form method="post">
                    <label>Pilih Nasabah:</label>
                    <select name="no_rekening">
                        <option value="123">Galih</option>
                        <option value="321">Azhar</option>
                        <option value="213">Daffa</option>
                    </select>
                    <input type="submit" value="Cek Saldo">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $no_rekening = $_POST['no_rekening'];
                    if (array_key_exists($no_rekening, $data_nasabah)) {
                        $nasabah = $data_nasabah[$no_rekening];
                        echo '<div class="hasil-box">';
                        echo "Nama: " . htmlspecialchars($nasabah['nama']) . "<br>";
                        echo "Nomor Rekening: " . htmlspecialchars($no_rekening) . "<br>";
                        echo "Saldo: Rp " . number_format($nasabah['saldo'], 2, ',', '.');
                        echo '</div>';
                    }
                }
            }

            // Halaman setor
            if ($page == 'setor') {
                ?>
                <form method="post">
                    <label>Pilih Nasabah:</label>
                    <select name="no_rekening">
                        <option value="123">Galih</option>
                        <option value="321">Azhar</option>
                        <option value="213">Daffa</option>
                    </select>
                    <label>Jumlah Setor:</label>
                    <input type="number" name="jumlah_setor" min="10000" required>
                    <input type="submit" value="Setor">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $no_rekening = $_POST['no_rekening'];
                    $jumlah_setor = (int)$_POST['jumlah_setor'];
                    if (array_key_exists($no_rekening, $data_nasabah)) {
                        $nasabah = $data_nasabah[$no_rekening];
                        $saldo_sekarang = $nasabah['saldo'];
                        $saldo_baru = $saldo_sekarang + $jumlah_setor;
                        echo '<div class="hasil-box">';
                        echo "Setor berhasil!<br>";
                        echo "Nama: " . htmlspecialchars($nasabah['nama']) . "<br>";
                        echo "Nomor Rekening: " . htmlspecialchars($no_rekening) . "<br>";
                        echo "Jumlah disetor: Rp " . number_format($jumlah_setor, 2, ',', '.') . "<br>";
                        echo "Saldo sebelumnya: Rp " . number_format($saldo_sekarang, 2, ',', '.') . "<br>";
                        echo "Saldo baru: Rp " . number_format($saldo_baru, 2, ',', '.');
                        echo '</div>';
                    }
                }
            }

            // Halaman tarik
            if ($page == 'tarik') {
                ?>
                <form method="post">
                    <label>Pilih Nasabah:</label>
                    <select name="no_rekening">
                        <option value="123">Galih</option>
                        <option value="321">Azhar</option>
                        <option value="213">Daffa</option>
                    </select>
                    <label>Jumlah Tarik:</label>
                    <input type="number" name="jumlah_tarik" min="10000" required>
                    <input type="submit" value="Tarik">
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $no_rekening = $_POST['no_rekening'];
                    $jumlah_tarik = (int)$_POST['jumlah_tarik'];
                    if (array_key_exists($no_rekening, $data_nasabah)) {
                        $nasabah = $data_nasabah[$no_rekening];
                        $saldo_sekarang = $nasabah['saldo'];
                        if ($saldo_sekarang >= $jumlah_tarik) {
                            $saldo_baru = $saldo_sekarang - $jumlah_tarik;
                            echo "Penarikan berhasil!<br>";
                            echo '<div class="hasil-box">';
                            echo "Nama: " . htmlspecialchars($nasabah['nama']) . "<br>";
                            echo "Nomor Rekening: " . htmlspecialchars($no_rekening) . "<br>";
                            echo "Jumlah ditarik: Rp " . number_format($jumlah_tarik, 2, ',', '.') . "<br>";
                            echo "Saldo sebelumnya: Rp " . number_format($saldo_sekarang, 2, ',', '.') . "<br>";
                            echo "Saldo baru: Rp " . number_format($saldo_baru, 2, ',', '.');
                            echo '</div>';
                        } else {
                            echo "Saldo tidak cukup!";
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</body>
</html>