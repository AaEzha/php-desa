<h2>Tambah Data Domisili</h2>

<?php
if (isset($_POST['nik'])) {
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

    mysqli_query($conn, "insert into tb_domisili(nomor_domisili,nama,nik,alamat,tempat_lahir,tanggal_lahir,agama,pekerjaan,status) values('$nomor_domisili','$nama','$nik','$alamat','$tempat_lahir','$tanggal_lahir','$agama','$pekerjaan','$status')");
    header("Location: home.php?page=domisili");
}
?>

<form method="POST" action="">
    <fieldset>
        <div class="form-group">
            <label for="nomor_domisili">Nomor Domisili</label>
            <input type="text" class="form-control" id="nomor_domisili" name="nomor_domisili" placeholder="Nomor Domisili" required>
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
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="pekerjaan" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <?php
                $arr = ['Belum Menikah', 'Menikah', 'Janda', 'Duda', 'Cerai'];
                foreach ($arr as $ar) : ?>
                    <option value="<?= $ar; ?>"><?= $ar; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=domisili" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>