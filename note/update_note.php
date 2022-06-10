<?php session_start();
include_once('../config/config.php');
if(strlen($_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
  if(isset($_POST['update']))
  {
    $nama_page=$_POST['nama_page'];
    $catatan=$_POST['catatan'];
    $id=intval($_GET['id']);
    $userid=$_SESSION["notizeid"];
    $sql=mysqli_query($con,"update catatan set nama_page='$nama_page', catatan='$catatan' where id_catatan='$id' and  id_user='$userid'");
  }
  else if(isset($_POST['delete']))
  {
    $nid=$_GET['id'];
    $userid=$_SESSION["notizeid"];
    $query=mysqli_query($con,"select * from catatan where id_user='$userid' and id_catatan ='$nid'");
    $row=mysqli_fetch_array($query);
    $nama_page=$row['nama_page'];
    $catatan=$row['catatan'];
    mysqli_query($con,"insert into recycle_bin(rb_nama_page,rb_catatan,id_user) values('$nama_page','$catatan','$userid')");
    mysqli_query($con,"delete from catatan where id_catatan ='$nid' and  id_user='$userid'");
    echo "<script>alert('Note Deleted');</script>";
    echo "<script>window.location.href='note.php'</script>";
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
          <a href="./jadwal/jadwal.php">
            <span class="links_name" id="j">Jadwal</span>
          </a>
        </li>
        <li>
          <a href="./tugas/tugas.php">
            <span class="links_name" id="t">Tugas</span>
          </a>
        </li>
        <li>
          <a href="./note/note.php">
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
        <!-- <a class="recycle" href="recycle.html">Recycle Bin</a> -->
      </div>

      <center>
      <form method="post" action="">
        <div class="notes">
          <div class="notes-sidebar">
              <button class="notes-add" type="submit" name="update">Edit</button>
              <button class="notes-add" type="submit" name="delete">Hapus</button>
              <div class="notes-list">
                <!-- disini buat naro query yg gunanya buat nampilin note yg udh dibuat user -->
                <?php 
                $nid=$_GET['id'];
                $query=mysqli_query($con,"select * from catatan where id_catatan='$nid'");
                while($row=mysqli_fetch_array($query))
                {
                ?>
              </div>
            </div>
            <div class="notes-preview">
              <input
                type="text"
                class="notes-title"
                value="<?php echo htmlentities($row['nama_page']);?>"
                name="nama_page"
              />
              <textarea
                name="catatan"
                id=""
                cols="30"
                rows="10"
                class="notes-body"
              ><?php echo htmlentities($row['catatan']);?></textarea>
          </div>
          <?php } ?>
        </div>
        </form>
      </center>
    </section>
  <script src="../js/script.js"></script>
</body>
</html>
<?php }?>