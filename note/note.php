<?php session_start();
include_once('../config/config.php');
if(strlen($_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
  if(isset($_POST['submit']))
  {
  $nama_page=$_POST['nama_page'];
  $catatan=$_POST['catatan'];
  $id_user=$_SESSION["notizeid"];
  $sql=mysqli_query($con,"insert into catatan(nama_page, catatan , id_user) values('$nama_page', '$catatan',$id_user)");

  }


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/stylen.css">
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
            <span class="links_name" id="j">Jadwal</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/notize-php/tugas/tugas.php">
            <span class="links_name" id="t">Tugas</span>
          </a>
        </li>
        <li>
          <a href="http://localhost/notize-php/note/note.php">
            <span class="active" id="n">Note</span>
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
      <div class="container-atas">
        <div class="text">Note</div>
        <a class="recycle" href="http://localhost/notize-php/recycle/recycle.php">Recycle Bin</a>
      </div>

      <center>
        <form method="post">
        <div class="notes">
          <div class="notes-sidebar">
            <button class="notes-add" type="submit" name="submit">Add Note</button>
            <div class="notes-list">
              <!-- disini buat naro query yg gunanya buat nampilin note yg udh dibuat user -->
              <?php 
                $userid=$_SESSION['notizeid'];
                $query=mysqli_query($con,"select * from catatan where id_user='$userid'");
                $cnt=1;
                while($row=mysqli_fetch_array($query))
                {
                ?>
                <a href="update_note.php?id=<?php echo $row['id_catatan']?>"><?php echo htmlentities($row['nama_page']);?></a><br>
                <?php $cnt=$cnt+1; } ?>
            </div>
          </div>
          <div class="notes-preview">
            <input
              type="text"
              class="notes-title"
              placeholder="Enter a title..."
              name="nama_page"
              required
            />
            <textarea
              name="catatan"
              id=""
              cols="30"
              rows="10"
              class="notes-body"
              placeholder="Take Notes..."
              required
            ></textarea>
          </div>
        </div>
        </form>
      </center>
    </section>
  <script src="../js/script.js"></script>
</body>
</html>
<?php }?>