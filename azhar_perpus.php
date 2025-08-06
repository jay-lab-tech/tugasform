<form action="azhar_perpus.php" method="post">
    <label>Judul Buku:</label><br>
    <input type="text" name="judul" required><br><br>
    <label>Penulis:</label><br>
    <input type="text" name="penulis" required><br><br>
    <label>Penerbit:</label><br>
    <input type="text" name="penerbit" required><br><br>
    <label>Tanggal Terbit:</label><br>
    <input type="date" name="tgl_terbit" required><br><br>
    <label>ISBN:</label><br>
    <input type="text" name="isbn" required><br><br>
    <label>Jumlah stok yang ditambahan:</label><br>
    <input type="number" name="stok" required><br><br>
    <button type="submit">Tambah Buku</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST["judul"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tgl_terbit = $_POST["tgl_terbit"];
    $isbn = $_POST["isbn"];
    $stok = $_POST["stok"];

    echo "Buku dengan judul <strong>'$judul'</strong> yang ditulis oleh <strong>$penulis</strong> dan diterbitkan oleh <strong>$penerbit</strong> pada tanggal <strong>$tgl_terbit</strong> dengan ISBN <strong>$isbn</strong> telah ditambahkan. <br> Jumlah stok yang ditambahkan: <strong>$stok</strong>.";
}
?>