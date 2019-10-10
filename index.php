<?php  
session_start();//session starts here  
  
?>  
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login form</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="img/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<style>
.alerte {
  padding: 10px;
  background-color: #f44336;
  color: white;
}
</style>
</head>
<body>

<?php include 'include/config.php'; ?> 

<?php

if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];


$qz = "SELECT * FROM user_registration where USERNAME='".$username."' and PASSWORD=PASSWORD('".$password."')" ;
//$conn_class = connect($par);
$qz = str_replace("\'","",$qz);
$result = mysqli_query($conn,$qz);
$rows = mysqli_num_rows($result);
if($rows==1){
while($row = mysqli_fetch_array($result))
	
  {
  
  if($row['USER_TYPE']=="Admin"){
$sql = "INSERT INTO user_logs (USERNAME) VALUES ('$username')"; 
if(mysqli_query($conn, $sql)){
	header("Location: Admin_dashboard.php");
  $_SESSION['name']=$row['FIRST_NAME']." ".$row['LAST_NAME'];
   $_SESSION['type']=$row['USER_TYPE'];

	$_SESSION['username']=$row['USERNAME'];
	$_SESSION['user']=$row['USER_ID'];

	$_SESSION['picture']=$row['PROFILE_PICTURE'];
	$_SESSION['lastname']=$row['LAST_NAME'];
	$_SESSION['firstname']=$row['FIRST_NAME'];
	$_SESSION['department']=$row['DEPARTMENT'];
	$_SESSION['gender']=$row['GENDER'];
	$_SESSION['Position']=$row['POSITION'];
	$_SESSION['district']=$row['DISTRICT'];
	$_SESSION['mobile']=$row['PHONE_NUMBER'];
	$_SESSION['nda']=$row['NATIONAL_ID'];
	$_SESSION['password']=$row['PASSWORD'];    
}
  }
  else{
	  $sql = "INSERT INTO user_logs (USERNAME) VALUES ('$username')"; 
if(mysqli_query($conn, $sql)){
	header("Location: User_dashboard.php"); 
$_SESSION['name']=$row['FIRST_NAME']." ".$row['LAST_NAME'];	
$_SESSION['picture']=$row['PROFILE_PICTURE'];
$_SESSION['type']=$row['USER_TYPE'];

$_SESSION['username']=$row['USERNAME'];
$_SESSION['user']=$row['USER_ID'];
$_SESSION['lastname']=$row['LAST_NAME'];
$_SESSION['firstname']=$row['FIRST_NAME'];
$_SESSION['department']=$row['DEPARTMENT'];
$_SESSION['gender']=$row['GENDER'];
$_SESSION['Position']=$row['POSITION'];
$_SESSION['district']=$row['DISTRICT'];
$_SESSION['mobile']=$row['PHONE_NUMBER'];
$_SESSION['nda']=$row['NATIONAL_ID'];
$_SESSION['password']=$row['PASSWORD'];
  }}
}}
else{
	
	echo "<div class='alerte' id='helpdiv'> 
  <center>Invalid username/password &#10008</center>
</div>";
echo "<script type='text/javascript'>
window.setTimeout('closeHelpDiv();', 3000);

function closeHelpDiv(){
document.getElementById('helpdiv').style.display=' none';
}
</script>";
}}
mysqli_close($conn);
?>
	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="" method="POST" autocomplete="off">
				<span class="contact100-form-title">
					Login 
				</span>

				<label class="label-input100" for="email">Enter your Username *</label>
				<div class="wrap-input100" >
					<input id="username" class="input100" type="text" name="username" placeholder="" required>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter your Password</label>
				<div class="wrap-input100">
					<input id="password" class="input100" type="password" name="password" placeholder="" required>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" style="background-color:#1e90ff" name="login">
						Login
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('img/bg-01.jpg');">
					<?php include 'slideshow.php' ?>
					<div class=" ">
						<span class="txt1">
							Not already a member ?
						</span>

						<span class="txt2">
							<a href="register.php" style="color:white"><button class="contact100-form-btn" style="background-color:#1e90ff" href="index.html">
								Create account
							</button></a>
						</span>
					</div>
			</div>
				
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
