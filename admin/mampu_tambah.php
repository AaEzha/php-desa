<h2>Tambah Data SK Tidak Mampu</h2>

<?php
if (isset($_POST['nik'])) {
    $nik = htmlspecialchars(trim($_POST['nik']));
    $nomor_surat = htmlspecialchars(trim($_POST['nomor_surat']));
    $nama_terkait = htmlspecialchars(trim($_POST['nama_terkait']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $pekerjaan = htmlspecialchars(trim($_POST['pekerjaan']));
    $tanggal_buat = htmlspecialchars(trim($_POST['tanggal_buat']));

    mysqli_query($conn, "insert into tb_surat_tdk_mampu(nomor_surat,nama_terkait,nik,pekerjaan,alamat,tanggal_buat) values('$nomor_surat','$nama_terkait','$nik','$pekerjaan','$alamat','$tanggal_buat')");
    header("Location: home.php?page=mampu");
}
?>

<form method="POST" action="">
    <fieldset>
        <div class="form-group">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" required>
        </div>
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
            <label for="nama_terkait">Nama Terkait</label>
            <input type="text" class="form-control" id="nama_terkait" name="nama_terkait" placeholder="Nama Terkait" required>
        </div>
        <div class="form-group">
            <label for="tanggal_buat">Tanggal Buat</label>
            <input type="date" class="form-control" id="tanggal_buat" name="tanggal_buat" placeholder="Tanggal Buat" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=mampu" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>