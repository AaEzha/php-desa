<h2>Tambah Data Admin</h2>

<?php
if(isset($_POST['username'])){
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $nama = htmlspecialchars(trim($_POST['nama']));

    mysqli_query($conn, "insert into tb_admin(username,password,nama) values('$username','$password','$nama')");
    header("Location: home.php?page=admin");
}
?>

<form method="POST" action="">
    <fieldset>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="?page=admin" class="btn btn-dark">Kembali</a>
    </fieldset>
</form>