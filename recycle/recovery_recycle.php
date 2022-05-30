<?php session_start();
include_once('../config/config.php');
if(strlen($_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
  
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
?>