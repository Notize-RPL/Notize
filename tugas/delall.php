<?php
    session_start();
    include_once('../config/config.php');
    $userid=$_SESSION["notizeid"];
    $query=mysqli_query($con,"select * from list_tugas where id_user='$userid'");
    $row=mysqli_fetch_array($query);
    mysqli_query($con,"delete from list_tugas where id_user='$userid' and status_tugas ='Sudah'");
    echo "<script>alert('Tugas Deleted');</script>";
    echo "<script>window.location.href='tugas.php'</script>";
?>