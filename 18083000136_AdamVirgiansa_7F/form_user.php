<?php 

include 'config.php';
include 'randbg.php';

session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}

if ($_SESSION['status']=="admin") {
    header("Location: form_admin.php");
}


$result = mysqli_query($conn, "SELECT * FROM barang ORDER BY kode_barang DESC");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
    <title> <?php echo "Selamat Datang, " . $_SESSION['status'] ." ". $_SESSION['username'] ."!";?> </title>
    
</head>
<body>
    <div class="container-logout">
        <form action="" method="POST" class="login-email">
            <?php echo "<h1>Selamat Datang, " . $_SESSION['status'] ." ". $_SESSION['username'] ."!". "</h1>";?>
            <div class="input-group">
            <a href="logout.php" class="btn">Logout</a>
            </div>
            <br>
                <table width='100%' border=1>

                <tr bgcolor='white' >
                    <td>Nama Barang</td>
                    <td>Harga Barang</td>
                    <td>Status Gudang</td>
                    <td>Status barang</td>
                    <td>Deskripsi Barang</td>
                </tr>
                <?php 
                //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
                while($res = mysqli_fetch_array($result)) { 		
                    echo "<tr>";
                    echo "<td>".$res['nama_barang']."</td>";
                    echo "<td>".$res['harga_barang']."</td>";
                    echo "<td>".$res['status_gudang']."</td>";	
                    echo "<td>".$res['status_barang']."</td>";	
                    echo "<td>".$res['deskripsi_barang']."</td>";
                }
                ?>
                </table>
            
        </form>
    </div>
</body>
</html>