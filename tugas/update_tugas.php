<?php session_start();
include_once('../config/config.php');
if(strlen( $_SESSION["notizeid"])==0)
{   header('location:logout.php');
} else {
//For Adding jadwal
if(isset($_POST['update']))
{
  $nama_tugas=$_POST['nama_tugas'];
  $detail_tugas=$_POST['detail_tugas'];
  $deadline_tugas=$_POST['deadline_tugas'];
  $status_tugas=$_POST['status_tugas'];
  $id=intval($_GET['id']);
  $userid=$_SESSION["notizeid"];
  $sql=mysqli_query($con,"update list_tugas set nama_tugas='$nama_tugas', detail_tugas='$detail_tugas', deadline_tugas='$deadline_tugas', status_tugas='$status_tugas' where id_tugas='$id' and  id_user='$userid'");
  echo "<script>alert('Successfully');</script>";
  echo "<script>window.location.href='tugas.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/stylet.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <span class="active" id="t">Tugas</span>
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
      <div class="text">Tugas</div>
          <div class="content">
          <?php
          $id=intval($_GET['id']);
          $userid=$_SESSION["notizeid"];
          $query=mysqli_query($con,"select * from list_tugas where id_tugas='$id' and  id_user='$userid'");
          while($row=mysqli_fetch_array($query))
          {
          ?>	
            <form method="post" action="" class="input_form">
          		<input type="text" name="nama_tugas" class="task_input" value="<?php echo  htmlentities($row['nama_tugas']);?>">
              <input type="text" name="detail_tugas" class="task_input" value="<?php echo  htmlentities($row['detail_tugas']);?>">
              <input type="date" name="deadline_tugas" class="date_input" value="<?php echo  htmlentities($row['deadline_tugas']);?>">
              <input type="text" name="status_tugas" class="task_input" value="<?php echo  htmlentities($row['status_tugas']);?>">
          		<button type="submit" name="update" id="add_btn" class="add_btn">Add Task</button>
          	</form>
            <?php } ?>
            <p>
              *Click tugas atau pilih hapus bila sudah selesai
            </p>
      <center>
            <table>
            	<thead>
            		<tr>
                  <th>Tugas</th>
                  <th style="width: 50%;">Detail</th>
                  <th >Deadline</th>
            			<th> Action</th>
            		</tr>
            	</thead>

            	<tbody>
            			<tr>
                  <?php 
                    $userid=$_SESSION['notizeid'];
                    $query=mysqli_query($con,"select * from list_tugas where id_user='$userid' ORDER BY deadline_tugas ASC");
                    $cnt=1;
                    while($row=mysqli_fetch_array($query))
                    {
                    ?> 
            				<td class="task"><?php echo htmlentities($row['nama_tugas']);?></td>
            				<td><?php echo htmlentities($row['detail_tugas']);?></td>
                    <td><?php echo htmlentities($row['deadline_tugas']);?></td>
            				<td class="action">
                      <a href="tugas.php?id=<?php echo $row['id_tugas']?>">Edit</a> | 
                      <a href="delete_tugas.php?id=<?php echo $row['id_tugas']?>" onClick="return confirm('Are you sure you want to delete?')">hapus</a>
            				</td>
            			</tr>
                  <?php $cnt=$cnt+1; } ?>
            	</tbody>
            </table></center>
    </section>
</div>
</div>
<script src="../js/script_tugas.js"></script>
  <script src="../js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</body>
</html>
<?php } ?>