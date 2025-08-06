<form action="daffa_mimake.php" method="post">
    <label>Nama Barang:</label>
    <input type="text" name="nama" required><br>

    <label>Jumlah Tambahan:</label>
    <input type="text" name="jumlah" required><br>

    <label>Tanggal Restock:</label>
    <input type="date" name="tgl_restock" required><br><br>

    <button type="submit">Restock Barang</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $jumlah = $_POST["jumlah"];
    $tgl_restock = $_POST["tgl_restock"];


    echo "barang yang telah direstock: $nama dengan jumlah $jumlah pada tanggal $tgl_restock.";
}
?>