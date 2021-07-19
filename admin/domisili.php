<h2>Data Domisili</h2>
<a href="?page=domisili_tambah" class="btn btn-primary mb-3">Tambah Data</a>
<table id="tabel" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No.Domisili</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Status</th>
            <th>Pekerjaan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "select * from tb_domisili");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?=$d['nomor_domisili'];?></td>
            <td><?=$d['nik'];?></td>
            <td><?=$d['nama'];?></td>
            <td><?=$d['status'];?></td>
            <td><?=$d['pekerjaan'];?></td>
            <td>
                <a href="?page=domisili_ubah&id=<?=$d['id_domisili'];?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="?page=domisili_hapus&id=<?=$d['id_domisili'];?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>