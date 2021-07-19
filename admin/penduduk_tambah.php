<h2>Tambah Data Penduduk</h2>

<?php
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

    mysqli_query($conn, "insert into tb_data_penduduk(nik,no_kk,nama,tempat_lahir,tanggal_lahir,jenis_kelamin,nomor_telephone,pekerjaan,alamat,agama,status,pendidikan_terakhir) values('$nik','$no_kk','$nama','$tempat_lahir','$tanggal_lahir','$jenis_kelamin','$nomor_telephone','$pekerjaan','$alamat','$agama','$status','$pendidikan_terakhir')");
    header("Location: home.php?page=penduduk");
}
?>

<form method="POST" action="">
    <fieldset>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" placeholder="NIK" required>
        </div>
        <div class="form-group">
            <label for="no_kk">No.Kartu Keluarga</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="No.Kartu Keluarga" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="tempat_lahir" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="tanggal_lahir" required>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="Pria">Pria</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group">
            <label for="nomor_telephone">No Telp</label>
            <input type="text" class="form-control" id="nomor_telephone" name="nomor_telephone" placeholder="nomor_telephone" required>
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
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status" required>
                <?php 
                $arr = ['Belum Menikah','Menikah','Janda','Duda','Cerai'];
                foreach($arr as $ar):?>
                <option value="<?=$ar;?>"><?=$ar;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pendidikan_terakhir">Pendidikan Terakhir</label>
            <select class="form-control" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                <?php 
                $arr = ['Tidak Sekolah','TK','SD','SMP','SMA/SMK','D1/D3','S1','S2','S3'];
                foreach($arr as $ar):?>
                <option value="<?=$ar;?>"><?=$ar;?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=penduduk" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>