<h2>Ubah Data SK Usaha</h2>

<?php
if (!isset($_GET['id']) or $_GET['id'] < 0 or $_GET['id'] == "") {
    header("Location: home.php");
}

$id = htmlspecialchars(trim($_GET['id']));
$data = mysqli_query($conn, "select * from tb_sk_usaha where id_sk_usaha='$id'");
$d = mysqli_fetch_array($data);

if (isset($_POST['nik'])) {
    $nik = htmlspecialchars(trim($_POST['nik']));
    $id_sk_usaha = htmlspecialchars(trim($_POST['id_sk_usaha']));
    $nama_pemilik = htmlspecialchars(trim($_POST['nama_pemilik']));
    $bidang_usaha = htmlspecialchars(trim($_POST['bidang_usaha']));
    $alamat = htmlspecialchars(trim($_POST['alamat']));
    $tanggal_berdiri = htmlspecialchars(trim($_POST['tanggal_berdiri']));
    $nomor_telephone = htmlspecialchars(trim($_POST['nomor_telephone']));

    mysqli_query($conn, "update tb_sk_usaha set nama_pemilik='$nama_pemilik',bidang_usaha='$bidang_usaha',nik_pemilik='$nik',nomor_telephone='$nomor_telephone',alamat='$alamat',tanggal_berdiri='$tanggal_berdiri' where id_sk_usaha='$id_sk_usaha'");
    header("Location: home.php?page=usaha");
}
?>

<form method="POST" action="">
    <input type="hidden" name="id_sk_usaha" value="<?=$d['id_sk_usaha'];?>">
    <fieldset>
        <div class="form-group">
            <label for="nik">NIK</label>
            <select class="form-control" id="nik" name="nik" required>
                <?php
                $data = mysqli_query($conn, "select * from tb_data_penduduk order by nama asc");
                while ($dd = mysqli_fetch_array($data)) : ?>
                    <option value="<?=$dd['nik']; ?>" <?= ($d['nik_pemilik'] == $dd['nik']) ? "selected" : ""; ?>><?=$dd['nama']; ?> - <?=$dd['nik']; ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nama_pemilik">Nama Pemilik</label>
            <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Nama Pemilik" required value="<?=$d['nama_pemilik'];?>">
        </div>
        <div class="form-group">
            <label for="bidang_usaha">Bidang Usaha</label>
            <input type="text" class="form-control" id="bidang_usaha" name="bidang_usaha" placeholder="Bidang Usaha" required value="<?=$d['bidang_usaha'];?>">
        </div>
        <div class="form-group">
            <label for="tanggal_berdiri">Tanggal Berdiri</label>
            <input type="date" class="form-control" id="tanggal_berdiri" name="tanggal_berdiri" placeholder="Tanggal Berdiri" required value="<?=$d['tanggal_berdiri'];?>">
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required value="<?=$d['alamat'];?>">
        </div>
        <div class="form-group">
            <label for="nomor_telephone">No Telephone</label>
            <input type="text" class="form-control" id="nomor_telephone" name="nomor_telephone" placeholder="No Telephone" required value="<?=$d['nomor_telephone'];?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=usaha" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>