<h2>Data SK Tidak Mampu</h2>
<a href="?page=mampu_tambah" class="btn btn-primary mb-3">Tambah Data</a>
<table id="tabel" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No Surat</th>
            <th>Nama Terkait</th>
            <th>NIK</th>
            <th>Tanggal Buat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "select * from tb_surat_tdk_mampu");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?=$d['nomor_surat'];?></td>
            <td><?=$d['nama_terkait'];?></td>
            <td><?=$d['nik'];?></td>
            <td><?=$d['tanggal_buat'];?></td>
            <td>
                <a href="?page=mampu_ubah&id=<?=$d['id_tidak_mampu'];?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="?page=mampu_hapus&id=<?=$d['id_tidak_mampu'];?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>