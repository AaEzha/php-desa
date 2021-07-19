<h2>Data Penduduk</h2>
<a href="?page=penduduk_tambah" class="btn btn-primary mb-3">Tambah Data</a>
<table id="tabel" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>No.KK</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "select * from tb_data_penduduk");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$d['nik'];?></td>
            <td><?=$d['nama'];?></td>
            <td><?=$d['jenis_kelamin'];?></td>
            <td><?=$d['no_kk'];?></td>
            <td>
                <a href="?page=penduduk_ubah&id=<?=$d['nik'];?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="?page=penduduk_hapus&id=<?=$d['nik'];?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>