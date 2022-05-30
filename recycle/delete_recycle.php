<?php session_start();
include_once('../config/config.php');
if(strlen($_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
    $nid=$_GET['id'];
    $userid=$_SESSION["notizeid"];
    $query=mysqli_query($con,"select * from recycle_bin where id_user='$userid' and id_recycle ='$nid'");
    $row=mysqli_fetch_array($query);
    mysqli_query($con,"delete from recycle_bin where id_recycle ='$nid' and  id_user='$userid'");
    echo "<script>alert('Recycle bin Deleted');</script>";
    echo "<script>window.location.href='recycle.php'</script>";
}
?>