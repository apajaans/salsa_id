<?php
session_start(); 
include 'db.php';
if ($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
$kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
if(mysqli_num_rows($kategori)==0){
    echo '<script>window.location="data-kategori.php"</script>';
}

$k = mysqli_fetch_object($kategori);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Toko Alief </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- header-->
        <header>
            <div class="container">
            <h1><a href="dashboard.php">Toko Alief</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="data-kategori.php">Data Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
            </div>
        </header>
        <!--content-->
        <div class="section">
            <div class="container">
                <h3>Edit Data Kategori</h3>
                <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" value="<?php echo $k-> category_name ?>"required>
                    <input type="Submit" name="Submit" value="Ubah Kategori" class="btn">
                </form>
                <?php
                    if(isset($_POST['Submit'])){
                        $nama= ucwords($_POST['nama']);
                        $update = mysqli_query($conn, "UPDATE tb_category SET 
                                            category_name = '".$nama."'
                                            WHERE category_id='".$k->category_id."' ");
                        
                        if ($update){
                            echo '<script>alert("Edit Data Berhasil")</script>';
                            echo '<script>window.location="data-kategori.php"</script>';
                        }else{
                            echo 'Gagal'.mysqli_error($conn);
                        }
                    }
                ?>
                </div>
                
            </div>
        </div>
        <!-- footer -->
        <footer>
            <div class="container">
                <small>copyright &copy; 2024 - Toko Alief. </small>
            </div>
        </footer>
        </class>
    </body>
</html>