<?php
    session_start();
    include_once('../config/config.php');
    $nid=$_GET['id'];
    $userid=$_SESSION["notizeid"];
    $query=mysqli_query($con,"select * from list_jadwal where id_user='$userid' and id_jadwal ='$nid'");
    $row=mysqli_fetch_array($query);
    mysqli_query($con,"delete from list_jadwal where id_jadwal ='$nid' and  id_user='$userid'");
    echo "<script>alert('Jadwal Deleted');</script>";
    echo "<script>window.location.href='jadwal.php'</script>";
?>