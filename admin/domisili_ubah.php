<h2>Ubah Data Domisili</h2>

<?php
if (!isset($_GET['id']) or $_GET['id'] < 0 or $_GET['id'] == "") {
    header("Location: home.php");
}

$id = htmlspecialchars(trim($_GET['id']));
$data = mysqli_query($conn, "select * from tb_domisili where id_domisili='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['nik'])) {
    $id_domisili = htmlspecialchars(trim($_POST['id_domisili']));
    $nik = htmlspecialchars(trim($_POST['nik']));
    $nomor_domisili = htmlspecialchars(trim($_POST['nomor_domisili']));
    $pekerjaan = htmlspecialchars(trim($_POST['pekerjaan']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $status = htmlspecialchars(trim($_POST['status']));

    // data penduduk
    $data = mysqli_query($conn, "select * from tb_data_penduduk where nik='$nik'");
    $d = mysqli_fetch_array($data);
    $nama = $d['nama'];
    $tempat_lahir = $d['tempat_lahir'];
    $nik = $d['nik'];
    $tanggal_lahir = $d['tanggal_lahir'];
    $agama = $d['agama'];

    mysqli_query($conn, "update tb_domisili set nomor_domisili='$nomor_domisili',nama='$nama',nik='$nik',alamat='$alamat',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',agama='$agama',pekerjaan='$pekerjaan',status='$status' where id_domisili='$id_domisili'");
    header("Location: home.php?page=domisili");
}
?>

<form method="POST" action="">
    <input type="hidden" name="id_domisili" value="<?=$d['id_domisili'];?>">
    <fieldset>
        <div class="form-group">
            <label for="nomor_domisili">Nomor Domisili</label>
            <input type="text" class="form-control" id="nomor_domisili" name="nomor_domisili" placeholder="Nomor Domisili" required value="<?=$d['nomor_domisili'];?>">
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <select class="form-control" id="nik" name="nik" required>
                <?php
                $data = mysqli_query($conn, "select * from tb_data_penduduk order by nama asc");
                while ($ds = mysqli_fetch_array($data)) : ?>
                    <option value="<?= $ds['nik']; ?>" <?= ($d['nik'] == $ds['nik']) ? "selected" : ""; ?>><?= $ds['nama']; ?> - <?= $ds['nik']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan" required value="<?=$d['pekerjaan'];?>">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required value="<?=$d['alamat'];?>">
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <?php
                $arr = ['Belum Menikah', 'Menikah', 'Janda', 'Duda', 'Cerai'];
                foreach ($arr as $ar) : ?>
                    <option value="<?= $ar; ?>" <?= ($d['status'] == $ar) ? "selected" : ""; ?>><?= $ar; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=domisili" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>