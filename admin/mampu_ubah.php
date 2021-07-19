<h2>Ubah Data SK Tidak Mampu</h2>

<?php
if (!isset($_GET['id']) or $_GET['id'] < 0 or $_GET['id'] == "") {
    header("Location: home.php");
}

$id = htmlspecialchars(trim($_GET['id']));
$data = mysqli_query($conn, "select * from tb_surat_tdk_mampu where id_tidak_mampu='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['nik'])) {
    $id_tidak_mampu = htmlspecialchars(trim($_POST['id_tidak_mampu']));
    $nik = htmlspecialchars(trim($_POST['nik']));
    $nomor_surat = htmlspecialchars(trim($_POST['nomor_surat']));
    $nama_terkait = htmlspecialchars(trim($_POST['nama_terkait']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $pekerjaan = htmlspecialchars(trim($_POST['pekerjaan']));
    $tanggal_buat = htmlspecialchars(trim($_POST['tanggal_buat']));

    mysqli_query($conn, "update tb_surat_tdk_mampu set nomor_surat='$nomor_surat',nama_terkait='$nama_terkait',nik='$nik',pekerjaan='$pekerjaan',alamat='$alamat',tanggal_buat='$tanggal_buat' where id_tidak_mampu='$id_tidak_mampu'");
    header("Location: home.php?page=mampu");
}
?>

<form method="POST" action="">
    <input type="hidden" name="id_tidak_mampu" value="<?=$d['id_tidak_mampu'];?>">
    <fieldset>
        <div class="form-group">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" placeholder="Nomor Surat" required value="<?=$d['nomor_surat'];?>">
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <select class="form-control" id="nik" name="nik" required>
                <?php
                $data = mysqli_query($conn, "select * from tb_data_penduduk order by nama asc");
                while ($dd = mysqli_fetch_array($data)) : ?>
                    <option value="<?= $dd['nik']; ?>" <?= ($d['nik'] == $dd['nik']) ? "selected" : ""; ?>><?= $dd['nama']; ?> - <?= $dd['nik']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_terkait">Nama Terkait</label>
            <input type="text" class="form-control" id="nama_terkait" name="nama_terkait" placeholder="Nama Terkait" required value="<?=$d['nama_terkait'];?>">
        </div>
        <div class="form-group">
            <label for="tanggal_buat">Tanggal Buat</label>
            <input type="date" class="form-control" id="tanggal_buat" name="tanggal_buat" placeholder="Tanggal Buat" required value="<?=$d['tanggal_buat'];?>">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required value="<?=$d['alamat'];?>">
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required value="<?=$d['pekerjaan'];?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=mampu" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>