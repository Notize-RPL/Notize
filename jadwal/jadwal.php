<?php session_start();
include_once('../config/config.php');
if(strlen($_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
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
    <div class="sidebar">
      <div class="logo-details">
        <div class="logo_name"><img id="logo" src="../img/Logo.png" alt="logo notize"></div>  
        <i class='bx bx-menu' id="btn" ></i>
      </div>
      <ul class="nav-list">
        <li>
          <a href="http://localhost/notize-php/jadwal/jadwal.php">
            <span class="active" id="j">Jadwal</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/notize-php/tugas/tugas.php">
            <span class="links_name" id="t">Tugas</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/notize-php/note/note.php">
            <span class="links_name" id="n">Note</span>
          </a>
        </li>
        <img id="nama" src="../img/Notize.png" alt="nama">
        <li class="profile">
          <a href="../logout.php">
            <p id="log">Log Out</p>
          </a>
        </li>
      </ul>
    </div>

    <section class="home-section">
    <div class="text">Jadwal</div>
  <div class="add">
    <a href="http://localhost/notize-php/jadwal/add_jadwal.php">Tambah</a>
  </div>
  <div class="timetable">
    <div class="grid-container">
  <div class="grid-item">
    <h1 class="days">Senin</h1>  
   <table class="table1">
    <tr>
      <th>Mata<br>Kuliah</th>
    </tr>
        <?php 
        $userid=$_SESSION['notizeid'];
        $query=mysqli_query($con,"select * from list_jadwal where id_user='$userid' AND hari_matkul ='senin'");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?> 
          <tr >
            <th class="schedule"> <a class="action" href="update_jadwal.php?id=<?php echo $row['id_jadwal']?>">Edit <br></a>
            <?php echo htmlentities($row['nama_matkul']);?> <br>
            <?php echo htmlentities($row['jam_matkul_mulai']);?> -
            <?php echo htmlentities($row['jam_matkul_akhir']);?>
               <br>
                <a class="action" href="delete_jadwal.php?id=<?php echo $row['id_jadwal']?>" onClick="return confirm('Are you sure you want to delete?')">Hapus</a>
              </th>
          </tr>
        <?php $cnt=$cnt+1; } ?>
       </table>
      </div>

      <div class="grid-item">
    <h1 class="days">Selasa</h1>  
   <table class="table1">
    <tr>
      <th>Mata<br>Kuliah</th>
    </tr>
        <?php 
        $userid=$_SESSION['notizeid'];
        $query=mysqli_query($con,"select * from list_jadwal where id_user='$userid' AND hari_matkul ='selasa'");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?> 
          <tr >
            <th class="schedule"> <a class="action" href="update_jadwal.php?id=<?php echo $row['id_jadwal']?>">Edit <br></a>
            <?php echo htmlentities($row['nama_matkul']);?> <br>
            <?php echo htmlentities($row['jam_matkul_mulai']);?> -
            <?php echo htmlentities($row['jam_matkul_akhir']);?>
               <br>
                <a class="action" href="delete_jadwal.php?id=<?php echo $row['id_jadwal']?>" onClick="return confirm('Are you sure you want to delete?')">Hapus</a>
              </th>
          </tr>
        <?php $cnt=$cnt+1; } ?>
       </table>
      </div>

      <div class="grid-item">
    <h1 class="days">Rabu</h1>  
   <table class="table1">
    <tr>
      <th>Mata<br>Kuliah</th>
    </tr>
        <?php 
        $userid=$_SESSION['notizeid'];
        $query=mysqli_query($con,"select * from list_jadwal where id_user='$userid' AND hari_matkul ='rabu'");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?> 
          <tr >
            <th class="schedule"> <a class="action" href="update_jadwal.php?id=<?php echo $row['id_jadwal']?>">Edit <br></a>
            <?php echo htmlentities($row['nama_matkul']);?> <br>
            <?php echo htmlentities($row['jam_matkul_mulai']);?> -
            <?php echo htmlentities($row['jam_matkul_akhir']);?>
               <br>
                <a class="action" href="delete_jadwal.php?id=<?php echo $row['id_jadwal']?>" onClick="return confirm('Are you sure you want to delete?')">Hapus</a>
              </th>
          </tr>
        <?php $cnt=$cnt+1; } ?>
       </table>
      </div>

      <div class="grid-item">
    <h1 class="days">Kamis</h1>  
   <table class="table1">
    <tr>
      <th>Mata<br>Kuliah</th>
    </tr>
        <?php 
        $userid=$_SESSION['notizeid'];
        $query=mysqli_query($con,"select * from list_jadwal where id_user='$userid' AND hari_matkul ='kamis'");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?> 
          <tr >
            <th class="schedule"> <a class="action" href="update_jadwal.php?id=<?php echo $row['id_jadwal']?>">Edit <br></a>
            <?php echo htmlentities($row['nama_matkul']);?> <br>
            <?php echo htmlentities($row['jam_matkul_mulai']);?> -
            <?php echo htmlentities($row['jam_matkul_akhir']);?>
               <br>
                <a class="action" href="delete_jadwal.php?id=<?php echo $row['id_jadwal']?>" onClick="return confirm('Are you sure you want to delete?')">Hapus</a>
              </th>
          </tr>
        <?php $cnt=$cnt+1; } ?>
       </table>
      </div>

      <div class="grid-item">
    <h1 class="days">Jum`at</h1>  
   <table class="table1">
    <tr>
      <th>Mata<br>Kuliah</th>
    </tr>
        <?php 
        $userid=$_SESSION['notizeid'];
        $query=mysqli_query($con,"select * from list_jadwal where id_user='$userid' AND hari_matkul ='jumat'");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?> 
          <tr >
            <th class="schedule"> <a class="action" href="update_jadwal.php?id=<?php echo $row['id_jadwal']?>">Edit <br></a>
            <?php echo htmlentities($row['nama_matkul']);?> <br>
            <?php echo htmlentities($row['jam_matkul_mulai']);?> -
            <?php echo htmlentities($row['jam_matkul_akhir']);?>
               <br>
                <a class="action" href="delete_jadwal.php?id=<?php echo $row['id_jadwal']?>" onClick="return confirm('Are you sure you want to delete?')">Hapus</a>
              </th>
          </tr>
        <?php $cnt=$cnt+1; } ?>
       </table>
      </div>

      <div class="grid-item">
    <h1 class="days">Sabtu</h1>  
   <table class="table1">
    <tr>
      <th>Mata<br>Kuliah</th>
    </tr>
        <?php 
        $userid=$_SESSION['notizeid'];
        $query=mysqli_query($con,"select * from list_jadwal where id_user='$userid' AND hari_matkul ='sabtu'");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?> 
          <tr >
            <th class="schedule"> <a class="action" href="update_jadwal.php?id=<?php echo $row['id_jadwal']?>">Edit <br></a>
            <?php echo htmlentities($row['nama_matkul']);?> <br>
            <?php echo htmlentities($row['jam_matkul_mulai']);?> -
            <?php echo htmlentities($row['jam_matkul_akhir']);?>
               <br>
                <a class="action" href="delete_jadwal.php?id=<?php echo $row['id_jadwal']?>" onClick="return confirm('Are you sure you want to delete?')">Hapus</a>
              </th>
          </tr>
        <?php $cnt=$cnt+1; } ?>
       </table>
      </div>
      
      <div class="grid-item">
    <h1 class="days">Minggu</h1>  
   <table class="table1">
    <tr>
      <th>Mata<br>Kuliah</th>
    </tr>
        <?php 
        $userid=$_SESSION['notizeid'];
        $query=mysqli_query($con,"select * from list_jadwal where id_user='$userid' AND hari_matkul ='minggu'");
        $cnt=1;
        while($row=mysqli_fetch_array($query))
        {
        ?> 
          <tr >
            <th class="schedule"> <a class="action" href="update_jadwal.php?id=<?php echo $row['id_jadwal']?>">Edit <br></a>
            <?php echo htmlentities($row['nama_matkul']);?> <br>
            <?php echo htmlentities($row['jam_matkul_mulai']);?> -
            <?php echo htmlentities($row['jam_matkul_akhir']);?>
               <br>
                <a class="action" href="delete_jadwal.php?id=<?php echo $row['id_jadwal']?>" onClick="return confirm('Are you sure you want to delete?')">Hapus</a>
              </th>
          </tr>
        <?php $cnt=$cnt+1; } ?>
       </table>
      </div>
         
         </div>
      </div>
    </section>
  <script src="../js/script.js"></script>
</body>
</html>
<?php }  ?>