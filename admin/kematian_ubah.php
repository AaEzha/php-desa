<h2>Ubah Data SK Kematian</h2>

<?php
if (!isset($_GET['id']) or $_GET['id'] < 0 or $_GET['id'] == "") {
    header("Location: home.php");
}

$id = htmlspecialchars(trim($_GET['id']));
$data = mysqli_query($conn, "select * from tb_sk_kematian where id_sk_kematian='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['nik'])) {
    $nik = htmlspecialchars(trim($_POST['nik']));
    $id_sk_kematian = htmlspecialchars(trim($_POST['id_sk_kematian']));
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

    // var_dump("update tb_sk_kematian set nomor_sk_kematian='$nomor_sk_kematian',nama='$nama',nik='$nik',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',agama='$agama',status='$status',alamat='$alamat',tanggal_meninggal='$tanggal_meninggal',tempat_meninggal='$tempat_meninggal',penyebab='$penyebab',penentu='$penentu' where id_sk_kematian='$id_sk_kematian'"); die;

    mysqli_query($conn, "update tb_sk_kematian set nomor_sk_kematian='$nomor_sk_kematian',nama_alm='$nama',nik_alm='$nik',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',agama='$agama',status='$status',alamat='$alamat',tanggal_meninggal='$tanggal_meninggal',tempat_meninggal='$tempat_meninggal',penyebab='$penyebab',penentu='$penentu' where id_sk_kematian='$id_sk_kematian'");
    header("Location: home.php?page=kematian");
}
?>

<form method="POST" action="">
    <input type="hidden" name="id_sk_kematian" value="<?=$d['id_sk_kematian'];?>">
    <fieldset>
        <div class="form-group">
            <label for="nomor_sk_kematian">Nomor SK Kematian</label>
            <input type="text" class="form-control" id="nomor_sk_kematian" name="nomor_sk_kematian" placeholder="Nomor SK Kematian" required value="<?=$d['nomor_sk_kematian'];?>">
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <select class="form-control" id="nik" name="nik" required>
                <?php
                $data = mysqli_query($conn, "select * from tb_data_penduduk order by nama asc");
                while ($dd = mysqli_fetch_array($data)) : ?>
                    <option value="<?= $dd['nik']; ?>" <?= ($d['nik_alm'] == $dd['nik']) ? "selected" : ""; ?>><?= $dd['nama']; ?> - <?= $dd['nik']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_meninggal">Tanggal Meninggal</label>
            <input type="date" class="form-control" id="tanggal_meninggal" name="tanggal_meninggal" placeholder="tanggal_meninggal" required value="<?=$d['tanggal_meninggal'];?>">
        </div>
        <div class="form-group">
            <label for="tempat_meninggal">Tempat Meninggal</label>
            <input type="text" class="form-control" id="tempat_meninggal" name="tempat_meninggal" placeholder="Tempat Meninggal" required value="<?=$d['tempat_meninggal'];?>">
        </div>
        <div class="form-group">
            <label for="penyebab">Penyebab Kematian</label>
            <input type="text" class="form-control" id="penyebab" name="penyebab" placeholder="Penyebab Kematian" required value="<?=$d['penyebab'];?>">
        </div>
        <div class="form-group">
            <label for="penentu">Penentu Kematian</label>
            <input type="text" class="form-control" id="penentu" name="penentu" placeholder="Penentu Kematian" required value="<?=$d['penentu'];?>">
        </div>
        <div class="form-group">
            <label for="agama">Agama</label>
            <select class="form-control" id="agama" name="agama" required>
                <?php 
                $arr = ['Islam','Katolik','Protestan','Hindu','Budha'];
                foreach($arr as $ar):?>
                <option value="<?=$ar;?>" <?= ($d['agama'] == $ar) ? "selected" : ""; ?>><?=$ar;?></option>
                <?php endforeach; ?>
            </select>
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
        <a href="?page=kematian" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>