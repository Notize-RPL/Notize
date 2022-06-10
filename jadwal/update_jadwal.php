<?php session_start();
include_once('../config/config.php');
if(strlen( $_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
//For Adding jadwal
if(isset($_POST['update']))
{
    $nama_matkul=$_POST['nama_matkul'];
    $hari_matkul=$_POST['hari_matkul'];
    $jam_matkul_mulai=$_POST['jam_matkul_mulai'];
    $jam_matkul_akhir=$_POST['jam_matkul_akhir'];
    $id=intval($_GET['id']);
    $userid=$_SESSION["notizeid"];
    $sql=mysqli_query($con,"update list_jadwal set nama_matkul='$nama_matkul', hari_matkul='$hari_matkul', jam_matkul_mulai='$jam_matkul_mulai', jam_matkul_akhir='$jam_matkul_akhir' where id_jadwal='$id' and  id_user='$userid'");
    echo "<script>alert('Succesfully');</script>";
    echo "<script>window.location.href='jadwal.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/stylej.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/Logo.png">
    <title>Notize</title>
  </head>
  <body>
    <center>
        <h2 class="add-jadwal">Update Jadwal</h2>
    </center>
    <br>
    <div class="card">
        <br>
        <a href="http://localhost/notize-php/jadwal/jadwal.php" class="back">Kembali</a>
        <br><br><br>
        <?php
          $id=intval($_GET['id']);
          $userid=$_SESSION["notizeid"];
          $query=mysqli_query($con,"select * from list_jadwal where id_jadwal='$id' and id_user='$userid'");
          while($row=mysqli_fetch_array($query))
          {
        ?>	
        <form action="" method="POST">
        <h1>Update Record</h1>
        <div class="form-jadwal">
            <p>Nama Mata Kuliah <br>
            <input type="text" placeholder="Enter Mata Kuliah"  name="nama_matkul" class="form-control" value="<?php echo  htmlentities($row['nama_matkul']);?>" required></p>
        </div>
        <div class="form-jadwal">
            <p>Hari<br></p>
            <div class="radio">
                <select id="hari_matkul" name="hari_matkul" class="form-control" value="<?php echo  htmlentities($row['hari_matkul']);?>" required>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jum'at</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
               </select>
            </div>
        </div>
        <div class="form-jadwal">
            <p>Jam Mulai <br>
            <input type="time"   name="jam_matkul_mulai" class="form-control" value="<?php echo  htmlentities($row['jam_matkul_mulai']);?>" required></p>
        </div>
		<div class="form-jadwal">
            <p>Jam Selesai <br>
            <input type="time"   name="jam_matkul_akhir" class="form-control" value="<?php echo  htmlentities($row['jam_matkul_akhir']);?>" required></p>
        </div>
        
        <div class="form-group">
            <button type="submit" name="update" class="simpan">Submit</button>
            </div>
        </form>
        <?php }  ?>
    </div>
</body>
</html>
<?php }  ?>