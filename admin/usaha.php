<h2>Data SK Usaha</h2>
<a href="?page=usaha_tambah" class="btn btn-primary mb-3">Tambah Data</a>
<table id="tabel" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pemilik</th>
            <th>Bidang Usaha</th>
            <th>Tanggal Berdiri</th>
            <th>No.Telp</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "select * from tb_sk_usaha");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$d['nama_pemilik'];?></td>
            <td><?=$d['bidang_usaha'];?></td>
            <td><?=$d['tanggal_berdiri'];?></td>
            <td><?=$d['nomor_telephone'];?></td>
            <td>
                <a href="?page=usaha_ubah&id=<?=$d['id_sk_usaha'];?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="?page=usaha_hapus&id=<?=$d['id_sk_usaha'];?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>