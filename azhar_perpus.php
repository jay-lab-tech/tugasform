<form action="azhar_perpus.php" method="post" enctype="multipart/form-data">
    <label>Judul Buku:</label><br>
    <input type="text" name="judul" required><br><br>
    <label>Kode Buku:</label><br>
    <input type="number" name="kode_buku" required><br><br>
    <label>Jenis Buku:</label><br>
    <input type="text" name="jenis_buku" required><br><br>
    <label>Penulis:</label><br>
    <input type="text" name="penulis" required><br><br>
    <label>Penerbit:</label><br>
    <input type="text" name="penerbit" required><br><br>
    <label>Tanggal Terbit:</label><br>
    <input type="date" name="tgl_terbit" required><br><br>
    <label>ISBN:</label><br>
    <input type="number" name="isbn" required><br><br>
    <label>Jumlah stok yang ditambahan:</label><br>
    <input type="number" name="stok" required><br><br>
    <label>Cover Buku:</label><br>
    <input type="file" name="cover" accept="image/*" required><br><br>
    <button type="submit">Tambah Buku</button>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode_buku = $_POST["kode_buku"];
    $judul = $_POST["judul"];
    $jenis_buku = $_POST["jenis_buku"];
    $penulis = $_POST["penulis"];
    $penerbit = $_POST["penerbit"];
    $tgl_terbit = $_POST["tgl_terbit"];
    $isbn = $_POST["isbn"];
    $stok = $_POST["stok"];

    // Proses upload cover
    $cover = $_FILES["cover"];
    $cover_name = "";
    if ($cover["error"] == 0) {
        $cover_name = "uploads/" . basename($cover["name"]);
        move_uploaded_file($cover["tmp_name"], $cover_name);
    }

    echo "<h3>Data Buku Baru</h3>";
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Kode Buku</th><th>Jenis Buku</th><th>Judul Buku</th><th>Penulis</th><th>Penerbit</th><th>Tanggal Terbit</th><th>ISBN</th><th>Jumlah Stok</th><th>Cover Buku</th></tr>";
    echo "<tr>";
    echo "<td>$kode_buku</td>";
    echo "<td>$jenis_buku</td>";
    echo "<td>$judul</td>";
    echo "<td>$penulis</td>";
    echo "<td>$penerbit</td>";
    echo "<td>$tgl_terbit</td>";
    echo "<td>$isbn</td>";
    echo "<td>$stok</td>";
    echo "<td>";
    if ($cover_name) {
        echo "<img src='$cover_name' width='100'>";
    } else {
        echo "Tidak ada cover";
    }
    echo "</td>";
    echo "</tr>";
    echo "</table>";
}
?>
