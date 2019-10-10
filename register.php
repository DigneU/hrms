<!DOCTYPE html>
<html lang="en">
<head>
	<title>Registration form</title>
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
.alertO {
  padding: 10px;
  background-color: #13CE5E;
  color: white;
}
.alerte {
  padding: 10px;
  background-color: #f44336;;
  color: white;
}
</style>
</head>
<body>

<?php include 'include/config.php'; ?>
<?php

    if(isset($_POST['save']))
        {
$first_name = mysqli_real_escape_string($conn, $_REQUEST['Fname']);
$last_name = mysqli_real_escape_string($conn, $_REQUEST['Lname']);
$username= mysqli_real_escape_string($conn, $_REQUEST['username']);
$email=mysqli_real_escape_string($conn,$_REQUEST['email']);
$password= mysqli_real_escape_string($conn, $_REQUEST['password']);
$re_password= mysqli_real_escape_string($conn, $_REQUEST['re-password']);

	if($password!=$re_password){
echo"<script> alert('passwords mismatch')</script>";
        
       echo "<script>history.back();</script>";
   return false;
}
else{
	$sql_t = "SELECT * FROM user_registration WHERE USERNAME='$username'";
		if ($conn->query($sql_t) ==TRUE) {
		$result = mysqli_query($conn,$sql_t) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if($rows>0){
		echo "<div class='alerte' id='helpdiv'> 
  <center> Username already exist <strong>&#10008</strong></center>
</div>";
echo "<script type='text/javascript'>
window.setTimeout('closeHelpDiv();', 3000);

function closeHelpDiv(){
document.getElementById('helpdiv').style.display=' none';
}
</script>";
	
		}
		else{


// Attempt insert query execution
$sql = "INSERT INTO create_account (FIRST_NAME, LAST_NAME,USERNAME,EMAIL,PASSWORD)
VALUES ('$first_name', '$last_name','$username','$email',PASSWORD('$password'))";

if(mysqli_query($conn, $sql)){
   
	echo "<div class='alertO' id='helpdiv'> 
  <center> Account created successfully <strong>&#10004</strong></center>
</div>";
echo "<script type='text/javascript'>
window.setTimeout('closeHelpDiv();', 3000);

function closeHelpDiv(){
document.getElementById('helpdiv').style.display=' none';
}
</script>";
	
	
	
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
		}}}}

    ?>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="" method="post" enctype="multipart/form-data" autocomplete="off">
				<span class="contact100-form-title">
					Create an account
				</span>

				
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="Fname" placeholder="First name"  pattern="[a-zA-Z]{1,}" required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="Lname" placeholder="Last name"  pattern="[a-zA-Z]{1,}" required>
					<span class="focus-input100"></span>
				</div>
				

				
				<div class="wrap-input100 validate-input">
					<input id="email" class="input100" type="text" name="username" placeholder="Username" required>
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input">
					<input id="mail" class="input100" type="text" name="email" placeholder="Email" required>
					<span class="focus-input100"></span>
				</div>

				
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="password" class="input100" type="password" name="password" placeholder="Enter Password" required pattern=".{6,10}" title="6 to 10 characters">
					<span class="focus-input100"></span>
				</div>

				
				<div class="wrap-input100">
					<input id="confirmpass" class="input100" type="password" name="re-password" placeholder="Confirm Password" required>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn" style="background-color:#1e90ff" name="save">
						Create An Account
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('img/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class=""></span>
					</div>

					<div class=" ">
						<span class="txt1">
							Already a member ?
						</span>

						<span class="txt2">
							<a href="index.php" style="color:white;"><button class="contact100-form-btn" style="background-color:#1e90ff" >
								Login 
							</button></a>
					</div>
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
