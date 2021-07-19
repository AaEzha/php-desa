<h2>Tambah Data SK Usaha</h2>

<?php
if (isset($_POST['nik'])) {
    $nik = htmlspecialchars(trim($_POST['nik']));
    $nama_pemilik = htmlspecialchars(trim($_POST['nama_pemilik']));
    $bidang_usaha = htmlspecialchars(trim($_POST['bidang_usaha']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $tanggal_berdiri = htmlspecialchars(trim($_POST['tanggal_berdiri']));
    $nomor_telephone = htmlspecialchars(trim($_POST['nomor_telephone']));

    mysqli_query($conn, "insert into tb_sk_usaha(nama_pemilik,bidang_usaha,nik_pemilik,nomor_telephone,alamat,tanggal_berdiri) values('$nama_pemilik','$bidang_usaha','$nik','$nomor_telephone','$alamat','$tanggal_berdiri')");
    header("Location: home.php?page=usaha");
}
?>

<form method="POST" action="">
    <fieldset>
        <div class="form-group">
            <label for="nik">NIK</label>
            <select class="form-control" id="nik" name="nik" required>
                <?php
                $data = mysqli_query($conn, "select * from tb_data_penduduk order by nama asc");
                while ($d = mysqli_fetch_array($data)) : ?>
                    <option value="<?= $d['nik']; ?>"><?= $d['nama']; ?> - <?= $d['nik']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_pemilik">Nama Pemilik</label>
            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Nama Pemilik" required>
        </div>
        <div class="form-group">
            <label for="bidang_usaha">Bidang Usaha</label>
            <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha" placeholder="Bidang Usaha" required>
        </div>
        <div class="form-group">
            <label for="tanggal_berdiri">Tanggal Berdiri</label>
            <input type="date" class="form-control" id="tanggal_berdiri" name="tanggal_berdiri" placeholder="Tanggal Berdiri" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
        </div>
        <div class="form-group">
            <label for="nomor_telephone">No Telephone</label>
            <input type="text" class="form-control" id="nomor_telephone" name="nomor_telephone" placeholder="No Telephone" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=usaha" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>