<?php 

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
	//    echo "Success";
	}else{
	   print_r($errors);
	}
//  }

	$errors= array();
	$file_name2 = $_FILES['photoid']['name'];
	$file_size2 =$_FILES['photoid']['size'];
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
	// echo "img2 Success";
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
	//    echo "img3 Success";
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
	//    echo "img4 Success";
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
//  $mail->isSMTP();            
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

$servicelist=":";

if(!empty($_POST['service']))
{

	foreach($_POST['service'] as $selected)
	{
		$servicelist=$servicelist." ".$selected." ";
	}
};

$mail->Subject = 'Message';
$mail->Body    ="Registeration Name: ". $_POST['registname']."<br> Short Name: ".$_POST['shortname']."<br> Trade Name: ".$_POST['tradename']."<br> Address: ".$_POST['address']."<br> Service Phone ".$_POST['sphone']."<br> Description ".$_POST['des']."<br> Industry ".$_POST['industry']."<br> Name ".$_POST['name']."<br> Title ".$_POST['title']."<br> Phone ".$_POST['phone']."<br> Email ".$_POST['email']." <br> Service ".$servicelist;
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
    // echo "Message has been sent successfully";
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
			<a href="/index.php" class="navbar-brand"><img id="lrg-logo" src="/images/alpha.png"></a>
		</div>
	   
		 
			  <ul class="nav navbar-nav navbar-right">
				<li><a href="/index.php" data-nav-section="home"><span style="color: white;">Home</span></a></li>
				<li><a href="/channel/qrcode.html"><span style="color: white;">Solution</span></a></li>
				<li><a href="/api/en.html"><span style="color: white;">API</span></a></li>
				<li><a href="/index.php#contact"><span style="color: white;">Contact</span></a></li>
				<li><a href="https://pay.alphapay.ca/login.html"><span style="color: white;">Login</a></li>
				<li><a href="cn.html"><span style="color: white;">中文</a><li>
			  </ul>
	   
	</div>
</nav>
<nav id="phonenav" class="navbar navbar-default">
	<div class="container-fluid">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/index.php"><img id="lrg-logo" src="/images/alphapay-red.png"></a>
	  </div>
  
	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
			<li><a href="/index.php" data-nav-section="home"><span style="color: #d51212;">Home</span></a></li>
			<li><a href="/channel/merchant.html"><span style="color: #d51212;">Solution</span></a></li>
			<li><a href="/api/en.html"><span style="color: #d51212;">API</span></a></li>
			<li><a href="/index.php#contact"><span style="color: #d51212;">Contact</span></a></li>
	
		</ul>

	
	  </div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
  </nav>
	
		<div id="fh5co-product-screenshots">
			<h3 style="text-align:center;"> Hello,<?php echo $_POST['name'];?>. We will contact you soon.<br></h3
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