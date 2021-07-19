<h2>Tambah Data SK Kematian</h2>

<?php
if (isset($_POST['nik'])) {
    $nik = htmlspecialchars(trim($_POST['nik']));
    $nomor_sk_kematian = htmlspecialchars(trim($_POST['nomor_sk_kematian']));
    $tanggal_meninggal = htmlspecialchars(trim($_POST['tanggal_meninggal']));
    $tempat_meninggal = htmlspecialchars(trim($_POST['tempat_meninggal']));
    $penyebab = htmlspecialchars(trim($_POST['penyebab']));
    $penentu = htmlspecialchars(trim($_POST['penentu']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $status = htmlspecialchars(trim($_POST['status']));
    $agama = htmlspecialchars(trim($_POST['agama']));

    // data penduduk
    $data = mysqli_query($conn, "select * from tb_data_penduduk where nik='$nik'");
    $d = mysqli_fetch_array($data);
    $nama = $d['nama'];
    $jenis_kelamin = $d['jenis_kelamin'];
    $nik = $d['nik'];
    $tanggal_lahir = $d['tanggal_lahir'];

    mysqli_query($conn, "insert into tb_sk_kematian(nomor_sk_kematian,nama_alm,nik_alm,tanggal_lahir,jenis_kelamin,agama,status,alamat,tanggal_meninggal,tempat_meninggal,penyebab,penentu) values('$nomor_sk_kematian','$nama','$nik','$tanggal_lahir','$jenis_kelamin','$agama','$status','$alamat','$tanggal_meninggal','$tempat_meninggal','$penyebab','$penentu')");
    header("Location: home.php?page=kematian");
}
?>

<form method="POST" action="">
    <fieldset>
        <div class="form-group">
            <label for="nomor_sk_kematian">Nomor SK Kematian</label>
            <input type="text" class="form-control" id="nomor_sk_kematian" name="nomor_sk_kematian" placeholder="Nomor SK Kematian" required>
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
            <label for="tanggal_meninggal">Tanggal Meninggal</label>
            <input type="date" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal" placeholder="tanggal_meninggal" required>
        </div>
        <div class="form-group">
            <label for="tempat_meninggal">Tempat Meninggal</label>
            <input type="text" class="form-control" id="tempat_meninggal" name="tempat_meninggal" placeholder="Tempat Meninggal" required>
        </div>
        <div class="form-group">
            <label for="penyebab">Penyebab Kematian</label>
            <input type="text" class="form-control" id="penyebab" name="penyebab" placeholder="Penyebab Kematian" required>
        </div>
        <div class="form-group">
            <label for="penentu">Penentu Kematian</label>
            <input type="text" class="form-control" id="penentu" name="penentu" placeholder="Penentu Kematian" required>
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <select class="form-control" id="agama" name="agama" required>
                <?php 
                $arr = ['Islam','Katolik','Protestan','Hindu','Budha'];
                foreach($arr as $ar):?>
                <option value="<?=$ar;?>"><?=$ar;?></option>
                <?php endforeach; ?>
            </select>
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
        <a href="?page=kematian" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>