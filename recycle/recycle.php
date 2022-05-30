<?php session_start();
include_once('../config/config.php');
if(strlen($_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
  if(isset($_POST['recovery']))
  {
    $nid=$_GET['id'];
    $userid=$_SESSION["notizeid"];
    $query=mysqli_query($con,"select * from recycle_bin where id_user='$userid' and id_recycle ='$nid'");
    $row=mysqli_fetch_array($query);
    $rb_nama_page=$row['rb_nama_page'];
    $rb_catatan=$row['rb_catatan'];
    mysqli_query($con,"insert into catatan(nama_page, catatan, id_user) values('$rb_nama_page','$rb_catatan','$userid')");
    mysqli_query($con,"delete from recycle_bin where id_recycle ='$nid' and  id_user='$userid'");
    echo "<script>alert('Note Recovery');</script>";
    echo "<script>window.location.href='../note/note.php'</script>";
  }
  else if(isset($_POST['delete']))
  {
    $nid=$_GET['id'];
    $userid=$_SESSION["notizeid"];
    $query=mysqli_query($con,"select * from recycle where id_user='$userid' and id_recycle ='$nid'");
    $row=mysqli_fetch_array($query);
    mysqli_query($con,"delete from recycle_bin where id_recycle ='$nid' and  id_user='$userid'");
    echo "<script>alert('Recycle bin Deleted');</script>";
    echo "<script>window.location.href='recycle.php'</script>";
  }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styler.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/Logo.png">
    <title>Notize</title>
  </head>
  <body>
    <center>
        <h2>Recycle bin</h2>
    </center>
    <br>
    <div class="card">
        <br>
        <a href="http://localhost/notize-php/note/note.php" class="back">Kembali</a>
        <br><br><br>
    <div class="grid-container">
    <div class="grid-item">
        <table class="table1">
            <?php 
                $userid=$_SESSION['notizeid'];
                $query=mysqli_query($con,"select * from recycle_bin where id_user='$userid'");
                $cnt=1;
                while($row=mysqli_fetch_array($query))
                {
            ?>
                <tr>
                    <td class="name"><?php echo htmlentities($row['rb_nama_page']);?></td>
                        <td>
                            <a href="delete_recycle.php?id=<?php echo $row['id_recycle']?>" class="delete">Hapus</a>
                        </td>
                        <td>
                        <a href="recovery_recycle.php?id=<?php echo $row['id_recycle']?>" class="recovery">Recovery</a></td>
                </tr>
            <?php $cnt=$cnt+1; } ?>
        </table>
    </div>
    </div>
    </div>
</body>
</html>
<?php } ?>