<h2>Data SK Kematian</h2>
<a href="?page=kematian_tambah" class="btn btn-primary mb-3">Tambah Data</a>
<table id="tabel" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No.SK Kematian</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tanggal Meninggal</th>
            <th>Penyebab</th>
            <th>Penentu</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        $data = mysqli_query($conn, "select * from tb_sk_kematian");
        while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
            <td><?=$d['nomor_sk_kematian'];?></td>
            <td><?=$d['nik_alm'];?></td>
            <td><?=$d['nama_alm'];?></td>
            <td><?=$d['tanggal_meninggal'];?></td>
            <td><?=$d['penyebab'];?></td>
            <td><?=$d['penentu'];?></td>
            <td>
                <a href="?page=kematian_ubah&id=<?=$d['id_sk_kematian'];?>" class="btn btn-primary btn-sm">Ubah</a>
                <a href="?page=kematian_hapus&id=<?=$d['id_sk_kematian'];?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>