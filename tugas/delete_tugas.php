<?php
    session_start();
    include_once('../config/config.php');
    $nid=$_GET['id'];
    $userid=$_SESSION["notizeid"];
    $query=mysqli_query($con,"select * from list_tugas where id_user='$userid' and id_tugas ='$nid'");
    $row=mysqli_fetch_array($query);
    mysqli_query($con,"delete from list_tugas where id_tugas ='$nid' and  id_user='$userid'");
    echo "<script>alert('Tugas Deleted');</script>";
    echo "<script>window.location.href='tugas.php'</script>";
?>