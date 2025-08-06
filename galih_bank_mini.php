<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'index';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Mini</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            align-items: center;
        }
        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            width: 400px;
            height: 700px;
            margin: auto;
            text-align: center;
        }
        .c {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        button {
            background-color: #2863a7;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px;
        }
        input[type="text"] {
            width: 70%;
            padding: 10px;
            margin: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="c">
        <div class="card">
            <?php
            if ($page == 'tabungan') {
                echo '<h1>Tabungan</h1>
                <form action="?page=tabungan" method="post">
                    <label for="nama">Masukkan nama anda</label><br>
                    <input type="text" id="nama" name="nama" required><br>
                    <label for="norek">Masukkan nomor rekening anda</label><br>
                    <input type="text" id="norek" name="norek" required><br>
                    <label for="saldo">Masukkan saldo yang ingin anda tabungkan</label><br>
                    <input type="text" id="saldo" name="saldo" required><br>
                    <button type="submit">Simpan</button>
                </form>';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nama = htmlspecialchars($_POST['nama']);
                    $norek = htmlspecialchars($_POST['norek']);
                    $saldo = htmlspecialchars($_POST['saldo']);
                    echo "<div style='margin-top:20px;padding:10px;border:1px solid #28a745;background:#eafbe7;'>";
                    echo "Data berhasil disimpan:<br>";
                    echo "Nama: $nama <br>";
                    echo "No. Rekening: $norek <br>";
                    echo "Saldo: $saldo <br>";
                    echo "</div>";
                }
                echo '<a href="bankmini.php"><button>Kembali</button></a>';

            } elseif ($page == 'tarik') {
                echo '<h1>Tarik Tunai</h1>
                <form action="?page=tarik" method="post">
                    <label for="nama">Masukkan nama anda</label><br>
                    <input type="text" id="nama" name="nama" required><br>
                    <label for="norek">Masukkan nomor rekening anda</label><br>
                    <input type="text" id="norek" name="norek" required><br>
                    <label for="saldo">Masukkan saldo yang ingin anda tarik</label><br>
                    <input type="text" id="saldo" name="saldo" required><br>
                    <button type="submit">Simpan</button>
                </form>';

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $nama = htmlspecialchars($_POST['nama']);
                    $norek = htmlspecialchars($_POST['norek']);
                    $saldo = htmlspecialchars($_POST['saldo']);
                    echo "<div style='margin-top:20px;padding:10px;border:1px solid #28a745;background:#eafbe7;'>";
                    echo "Data berhasil disimpan:<br>";
                    echo "Nama: $nama <br>";
                    echo "No. Rekening: $norek <br>";
                    echo "Saldo: $saldo <br>";
                    echo "</div>";
                }
                echo '<a href="bankmini.php"><button>Kembali</button></a>';

            } else {
                echo '<h1>Welcome to Bank Mini</h1>
                <a href="bankmini.php?page=tabungan"><button>Tabungan</button></a>
                <a href="bankmini.php?page=tarik"><button>Tarik Tunai</button></a>';
            }
            ?>
        </div>
    </div>
</body>
</html>
