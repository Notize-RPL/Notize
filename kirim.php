<?php include_once('config/config.php');
?>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

if(isset($_POST['submit']))
{
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);

    // $no_invoice         = $_POST['no_invoice'];
    $signemail              = $_POST['signemail'];
    $signname                = $_POST['signname'];

    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'algha_naufal@upi.edu';                     // SMTP username
    $mail->Password   = 'anakUPI39';                               // SMTP password
    // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('algha_naufal@upi.edu', 'Notize');
    $mail->addAddress($signemail, $signname);     // Add a recipient
    
    $mail->addReplyTo('algha_naufal@upi.edu', 'Notize');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'NOTIZE';
    $mail->Body    = '<h1>Selamat bergabung di Notize!</h1> 
                    <p>Halo, '.$signname.'! Akun Notize-mu sudah terdaftar
                    dan siap digunakan. Sekarang, mengatur jadwal perkuliahan,
                    tugas, dan catatan menjadi lebih mudah dan efektif bersama Notize.
                    </p>
                    <p>Yuk mulai produktif bersama Notize!</p>
                    <p>Terima kasih,<br>
                    Tim Notize.</p>';    

    if($mail->send())
    {
        '<a href="login.php">';
    }
    else{
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


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
else{
    echo "Tekan dulu tombolnya bos";
}
