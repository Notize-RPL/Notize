<?php session_start();
include_once('../config/config.php');
if(strlen( $_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
//For Adding jadwal
if(isset($_POST['submit']))
{
$nama_matkul=$_POST['nama_matkul'];
$hari_matkul=$_POST['hari_matkul'];
$jam_matkul_mulai=$_POST['jam_matkul_mulai'];
$jam_matkul_akhir=$_POST['jam_matkul_akhir'];
$id_user=$_SESSION["notizeid"];
$sql=mysqli_query($con,"insert into list_jadwal(nama_matkul, hari_matkul, jam_matkul_mulai, jam_matkul_akhir, id_user) values('$nama_matkul', '$hari_matkul', '$jam_matkul_mulai', '$jam_matkul_akhir',$id_user)");
echo "<script>alert('Jadwal added successfully');</script>";
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
        <h2 class="add-jadwal">Input Jadwal</h2>
    </center>
    <br>
    <div class="card">
        <br>
        <a href="./jadwal.php" class="back">Kembali</a>
        <br><br><br>
        <form action="" method="POST">
        <h1>Update Record</h1>
        <div class="form-jadwal">
            <p>Nama Mata Kuliah <br>
            <input type="text" placeholder="Enter Mata Kuliah"  name="nama_matkul" class="form-control" required></p>
        </div>
        <div class="form-jadwal">
            <p>Hari<br></p>
            <div class="radio">
                <select id="hari_matkul" name="hari_matkul" class="form-control" required>
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
            <input type="time"   name="jam_matkul_mulai" class="form-control" required></p>
        </div>
		<div class="form-jadwal">
            <p>Jam Selesai <br>
            <input type="time"   name="jam_matkul_akhir" class="form-control" required></p>
        </div>
        
        <div class="form-group">
            <button type="submit" name="submit" class="simpan">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php }  ?>
