<form action="daffa_mimake.php" method="post">
    <label>Nama Barang:</label>
    <input type="text" name="nama" required><br>

    <label>Jumlah Tambahan:</label>
    <input type="number" name="jumlah" required><br>

    <label>Tanggal Restock:</label>
    <input type="date" name="tgl_restock" required><br>

    <label>Kode_Barang:</label>
    <input type="number" name="Kode_Barang" required><br>

    <label>Jenis_Barang:</label>
    <input type="text" name="Jenis_Barang" required><br>

    <label>Jumlah_Barang:</label>
    <input type="number" name="Jumlah_Barang" required><br>

    <label>Harga_Modal:</label>
    <input type="number" name="Harga_Modal" required><br>

    <label>Harga_Jual:</label>
    <input type="number" name="Harga_Jual" required><br>

    <label>Tanggal_Input:</label>
    <input type="date" name="Tanggal_Input" required><br><br>

    <table border="">
        <tr>
            <th>Nama Barang</th>
            <th>Jumlah Tambahan</th>
            <th>Tanggal Restock</th>
            <th>Kode Barang</th>
            <th>Jenis Barang</th>
            <th>Jumlah Barang</th>
            <th>Harga Modal</th>
            <th>Harga Jual</th>
            <th>Tanggal Input</th>
            <tr>
            <td><?php echo htmlspecialchars($_POST['nama']); ?></td>
            <td><?php echo htmlspecialchars($_POST['jumlah']); ?></td>
            <td><?php echo htmlspecialchars($_POST['tgl_restock']); ?></td>
            <td><?php echo htmlspecialchars($_POST['Kode_Barang']); ?></td>
            <td><?php echo htmlspecialchars($_POST['Jenis_Barang']); ?></td>
            <td><?php echo htmlspecialchars($_POST['Jumlah_Barang']); ?></td>
            <td><?php echo htmlspecialchars($_POST['Harga_Modal']); ?></td>
            <td><?php echo htmlspecialchars($_POST['Harga_Jual']); ?></td>
            <td><?php echo htmlspecialchars($_POST['Tanggal_Input']); ?></td>
        </tr><br>
        </tr>
    </table border="1">
        









    <button type="submit">Restock Barang</button>
</form>
<?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $jumlah = $_POST["jumlah"];
    $tgl_restock = $_POST["tgl_restock"];
    $Kode_Barang = $_POST["Kode_Barang"];


    echo "barang yang telah direstock: $nama dengan jumlah $jumlah pada tanggal $tgl_restock.";
}
?>
