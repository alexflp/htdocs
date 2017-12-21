<?php 

// $target_dir = "uploads/";
// $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
// print_r($target_file);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//     if($check !== false) {
//         echo "File is an image - " . $check["mime"] . ".";
//         $uploadOk = 1;
//     } else {
//         echo "File is not an image.";
//         $uploadOk = 0;
//     }
// }
// // Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// // Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// // Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//     $uploadOk = 0;
// }
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//     echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//     if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//         echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
//     } else {
//         echo "Sorry, there was an error uploading your file.";
//     }
// }

// if(isset($_FILES['image'])){
	$errors= array();
	$file_name = $_FILES['image']['name'];
	$file_size =$_FILES['image']['size'];
	$file_tmp =$_FILES['image']['tmp_name'];
	$file_type=$_FILES['image']['type'];
	$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
	
	$expensions= array("jpeg","jpg","png");
	
	if(in_array($file_ext,$expensions)=== false){
	   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	}
	
	if($file_size > 2097152){
	   $errors[]='File size must be excately 2 MB';
	}
	
	if(empty($errors)==true){
	   move_uploaded_file($file_tmp,"uploads/".$file_name);
	   echo "Success";
	}else{
	   print_r($errors);
	}
//  }

	$errors= array();
	$file_name2 = $_FILES['photoid']['name'];
	$file_size2 =$_FILES['photid']['size'];
	$file_tmp2 =$_FILES['photoid']['tmp_name'];
	$file_type2=$_FILES['photoid']['type'];
	$file_ext2=strtolower(end(explode('.',$_FILES['photoid']['name'])));

	$expensions= array("jpeg","jpg","png");

	if(in_array($file_ext2,$expensions)=== false){
	$errors[]="extension not allowed, please choose a JPEG or PNG file.";
	}

	if($file_size2 > 2097152){
	$errors[]='File size must be excately 2 MB';
	}

	if(empty($errors)==true){
	move_uploaded_file($file_tmp2,"uploads/".$file_name2);
	echo "img2 Success";
	}else{
	print_r($errors);
	}

	$errors= array();
	$file_name3 = $_FILES['cheque']['name'];
	$file_size3 =$_FILES['cheque']['size'];
	$file_tmp3 =$_FILES['cheque']['tmp_name'];
	$file_type3=$_FILES['cheque']['type'];
	$file_ext3=strtolower(end(explode('.',$_FILES['cheque']['name'])));
	
	$expensions= array("jpeg","jpg","png");
	
	if(in_array($file_ext3,$expensions)=== false){
	   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	}
	
	if($file_size > 2097152){
	   $errors[]='File size must be excately 2 MB';
	}
	
	if(empty($errors)==true){
	   move_uploaded_file($file_tmp3,"uploads/".$file_name3);
	   echo "img3 Success";
	}else{
	   print_r($errors);
	}

	$errors= array();
	$file_name4 = $_FILES['frontphoto']['name'];
	$file_size4 =$_FILES['frontphoto']['size'];
	$file_tmp4 =$_FILES['frontphoto']['tmp_name'];
	$file_type4=$_FILES['frontphoto']['type'];
	$file_ext4=strtolower(end(explode('.',$_FILES['frontphoto']['name'])));
	
	$expensions= array("jpeg","jpg","png");
	
	if(in_array($file_ext4,$expensions)=== false){
	   $errors[]="extension not allowed, please choose a JPEG or PNG file.";
	}
	
	if($file_size > 2097152){
	   $errors[]='File size must be excately 2 MB';
	}
	
	if(empty($errors)==true){
	   move_uploaded_file($file_tmp4,"uploads/".$file_name4);
	   echo "img4 Success";
	}else{
	   print_r($errors);
	}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
//Enable SMTP debugging. 
$mail->SMTPDebug = 0;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username ="alphacustomer11@gmail.com";                
$mail->Password ="flash123";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure ="ssl";                           
//Set TCP port to connect to 
$mail->Port =465;                                   

$mail->From ="alphacustomer11@gmail.com";
$mail->FromName ="Alphapay Application";

$mail->addAddress("it@alphapay.ca");

$mail->isHTML(true);


$mail->Subject = 'Message';
$mail->Body    = $_POST['shortname']." ".$_POST['shortname']." ".$_POST['tradename']." ".$_POST['title']." ".$_POST['phone']." ".$_POST['email']." ".$_POST['des'];
$mail->addAttachment("uploads/".$file_name);
$mail->addAttachment("uploads/".$file_name2);
$mail->addAttachment("uploads/".$file_name3);
$mail->addAttachment("uploads/".$file_name4);
if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}

?>

<!DOCTYPE HTML>
<html>
	<head>
	<title>AlphaPay</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="images/icon.png">
	
	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,700|Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC" rel="stylesheet">
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Simple Line Icons -->
	<link rel="stylesheet" href="css/simple-line-icons.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	
	<link rel="stylesheet" href="css/style.css">
	<script src="js/modernizr-2.6.2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>

	
	</head>

	<body>
		<nav id="servicenav" class="navbar navbar-default navbar-fixed-top">
	    <div class="container">
	        <!-- Brand and toggle get grouped for better mobile display -->
	        <div class="navbar-header">
	            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
	                <span class="sr-only">Toggle navigation</span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	                <span class="icon-bar"></span>
	            </button>
	            <a href="/index.php" class="navbar-brand"><img id="lrg-logo" src="images/alphapay-white.png"></a>
	        </div>
	       
	     	
		          <ul class="nav navbar-nav navbar-right">
		            <li><a href="/index.php" data-nav-section="home"><span style="color: white;">Home</span></a></li>
		            <li><a href="/service.html"><span style="color: white;">Services</span></a></li>
                <li><a href="/api/en.html"><span style="color: white;">API</span></a></li>
		            
		          </ul>
		   
	    </div>
	</nav>
	
		<div class="reply">
			Hello,<?php echo $_POST['name'];?>. We will contact you soon.<br>
		</div>

	    
	   <script src="js/jquery.min.js"></script>
        <!-- jQuery Easing -->
        <script src="js/jquery.easing.1.3.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Waypoints -->
        <script src="js/jquery.waypoints.min.js"></script>
        <!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Main JS (Do not remove) -->
        <script src="js/main.js"></script>
      
        <script src="js/index.js"></script> 
  </body>
</html>