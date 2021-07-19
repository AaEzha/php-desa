<h2>Ubah Profil</h2>

<?php
if (!isset($_SESSION['username']) or $_SESSION['username'] < 0 or $_SESSION['username'] == "") {
    header("Location: home.php");
}

$id = htmlspecialchars(trim($_SESSION['id']));
$data = mysqli_query($conn, "select * from tb_admin where id='$id'");
$d = mysqli_fetch_array($data);

if(isset($_POST['username'])){
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));
    $nama = htmlspecialchars(trim($_POST['nama']));
    $id = htmlspecialchars(trim($_POST['id']));

    mysqli_query($conn, "update tb_admin set username='$username', password='$password', nama='$nama' where id='$id'");
    header("Location: home.php?page=profil");
}
?>

<form method="POST" action="">
    <input type="hidden" name="id" value="<?=$d['id'];?>">
    <fieldset>
        <div class="form-group">
            <label for="nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=$d['nama'];?>" required>
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?=$d['username'];?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </fieldset>
</form>