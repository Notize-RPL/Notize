<?php include_once('config/config.php');
if(isset($_POST['submit']))
{
$signname=$_POST['signname'];
$signemail=$_POST['signemail'];
$npwd=md5($_POST['signpass']);
$ret=mysqli_query($con,"select id_user from users where email='$signemail'");
$count=mysqli_num_rows($ret);
if($count==0){
$query=mysqli_query($con,"insert into users(username,email,password) values('$signname','$signemail','$npwd')");
if($query){
echo "<script>alert('Registration successfull');</script>"; 
echo "<script>window.location.href ='login.php'</script>";
} else {
echo "<script>alert('Something went wrong. Please try again');</script>"; 
echo "<script>window.location.href ='signup.php'</script>";
}} else {
echo "<script>alert('Email Id already registered.Please try again.');</script>"; 
echo "<script>window.location.href ='signup.php'</script>";
}
}
?>
<?php session_start();
include_once('config/config.php');
if(isset($_POST['login']))
  {
    $emailcon=$_POST['logemail'];
    $password=md5($_POST['logpass']);
    $query=mysqli_query($con,"select id_user, username, email from users where email='$emailcon' AND password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
    $_SESSION['notizeid']=$ret['id_user'];
    $_SESSION['uemail']=$ret['email'];
      echo "<script>window.location.href='jadwal/jadwal.php'</script>";
    }
    else{
 echo "<script>alert('Invalid details');</script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/Logo.png">
    <title>Notize</title>
  </head>
  <body>
    <div class="section">  
        <div class="container">  
         <div class="row full-height justify-content-center">  
          <div class="col-12 text-center align-self-center py-5">  
           <div class="section pb-5 pt-5 pt-sm-2 text-center">  
            <h6 class="mb-0 pb-3"><span>Sign Up </span><span>Log In</span></h6>  
               <input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>  
               <label for="reg-log"></label>  
            <div class="card-3d-wrap mx-auto">  
             <div class="card-3d-wrapper">  
              <div class="card-front">  
              <div class="center-wrap">  
                <div class="section text-center">  
                 <h4 class="mb-4 pb-3">Log In</h4>  
                 <form method="post"> 
                  <div class="form-group">  
                    <input type="email" name="logemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">  
                    <i class="input-icon uil uil-at"></i>  
                  </div>       
                  <div class="form-group mt-2">  
                    <input type="password" name="logpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">  
                    <i class="input-icon uil uil-lock-alt"></i>  
                  </div>  
                  <button  class="btn mt-4"  type="submit" name="login">Submit</button>
                 <form>
                  </div>  
                 </div>  
                </div>  
              <div class="card-back">  
              <div class="center-wrap">  
                <div class="section text-center">  
                 <h4 class="mb-4 pb-3">Sign Up</h4>  
                  <form method = "post" action="kirim.php"> 
                  <div class="form-group">  
                    <input type="text" name="signname" class="form-style" placeholder="Your Username" id="logname" autocomplete="off" required>  
                    <i class="input-icon uil uil-user"></i>  
                  </div>       
                  <div class="form-group mt-2">  
                    <input type="email" name="signemail" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off" required>  
                    <i class="input-icon uil uil-at"></i>  
                  </div>       
                  <div class="form-group mt-2">  
                    <input type="password" name="signpass" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off" required>  
                    <i class="input-icon uil uil-lock-alt"></i>  
                  </div>  
                  <button  class="btn mt-4"  type="submit" name="submit">Submit</button>
                  </form> 
                  </div>  
                 </div>  
                </div>  
               </div>  
              </div>  
             </div>  
            </div>  
           </div>  
         </div>  
       </div>  
  </body>
</html>

