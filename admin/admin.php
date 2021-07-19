<h2>Data Admin</h2>
<a href="?page=admin_tambah" class="btn btn-primary mb-3">Tambah Data</a>
<table id="tabel" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Username</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "select * from tb_admin");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?=$no++;?></td>
            <td><?=$d['nama'];?></td>
            <td><?=$d['username'];?></td>
            <td>
                <a href="?page=admin_ubah&id=<?=$d['id'];?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="?page=admin_hapus&id=<?=$d['id'];?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>