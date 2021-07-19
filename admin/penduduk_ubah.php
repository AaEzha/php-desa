<h2>Ubah Data Penduduk</h2>

<?php
if (!isset($_GET['id']) or $_GET['id'] < 0 or $_GET['id'] == "") {
    header("Location: home.php");
}

$id = htmlspecialchars(trim($_GET['id']));
$data = mysqli_query($conn, "select * from tb_data_penduduk where nik='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['nik'])) {
    $nik = htmlspecialchars(trim($_POST['nik']));
    $no_kk = htmlspecialchars(trim($_POST['no_kk']));
    $nama = htmlspecialchars(trim($_POST['nama']));
    $tempat_lahir = htmlspecialchars(trim($_POST['tempat_lahir']));
    $tanggal_lahir = htmlspecialchars(trim($_POST['tanggal_lahir']));
    $jenis_kelamin = htmlspecialchars(trim($_POST['jenis_kelamin']));
    $nomor_telephone = htmlspecialchars(trim($_POST['nomor_telephone']));
    $pekerjaan = htmlspecialchars(trim($_POST['pekerjaan']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $agama = htmlspecialchars(trim($_POST['agama']));
    $status = htmlspecialchars(trim($_POST['status']));
    $pendidikan_terakhir = htmlspecialchars(trim($_POST['pendidikan_terakhir']));

    mysqli_query($conn, "update tb_data_penduduk set nik='$nik',no_kk='$no_kk',nama='$nama',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',nomor_telephone='$nomor_telephone',pekerjaan='$pekerjaan',alamat='$alamat',agama='$agama',status='$status',pendidikan_terakhir='$pendidikan_terakhir' where nik='$nik'");
    header("Location: home.php?page=penduduk");
}
?>

<form method="POST" action="">
    <fieldset>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" readonly value="<?= $d['nik']; ?>">
        </div>
        <div class="form-group">
            <label for="no_kk">No.Kartu Keluarga</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No.Kartu Keluarga" required value="<?= $d['no_kk']; ?>">
        </div>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required value="<?= $d['nama']; ?>">
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="tempat_lahir" required value="<?= $d['tempat_lahir']; ?>">
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="tanggal_lahir" required value="<?= $d['tanggal_lahir']; ?>">
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Pria" <?= ($d['jenis_kelamin'] == "Pria") ? "selected" : ""; ?>>Pria</option>
                <option value="Perempuan" <?= ($d['jenis_kelamin'] == "Perempuan") ? "selected" : ""; ?>>Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nomor_telephone">No Telp</label>
            <input type="text" class="form-control" id="nomor_telephone" name="nomor_telephone" placeholder="nomor_telephone" required value="<?= $d['nomor_telephone']; ?>">
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan" required value="<?= $d['pekerjaan']; ?>">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required value="<?= $d['alamat']; ?>">
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <select class="form-control" id="agama" name="agama" required>
                <?php
                $arr = ['Islam', 'Katolik', 'Protestan', 'Hindu', 'Budha'];
                foreach ($arr as $ar) : ?>
                    <option value="<?= $ar; ?>" <?= ($d['agama'] == $ar) ? "selected" : ""; ?>><?= $ar; ?></option>
                <?php endforeach; ?>
            </select>
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
        <div class="form-group">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <select class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                <?php
                $arr = ['Tidak Sekolah', 'TK', 'SD', 'SMP', 'SMA/SMK', 'D1/D3', 'S1', 'S2', 'S3'];
                foreach ($arr as $ar) : ?>
                    <option value="<?= $ar; ?>" <?= ($d['pendidikan_terakhir'] == $ar) ? "selected" : ""; ?>><?= $ar; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=penduduk" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>