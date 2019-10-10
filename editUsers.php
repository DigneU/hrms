<?php 
include ('include/config.php'); 
$ID=$_GET['USER_ID'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
  <meta name="author" content="GeeksLabs">
  <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
  <link rel="shortcut icon" href="img/favicon.png">

  <title>HRMS</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- bootstrap theme -->
  <link href="css/bootstrap-theme.css" rel="stylesheet">
  <!--external css-->
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- Custom styles -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  
  <style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 0px;
 
}

/* Modal Content/Box */
.modal-content {
  background-color: white;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  border-radius:10px;
  width: 80%; /* Could be more or less, depending on screen size */
  color:black;
}

/* The Close Button (x) */
.close {

  color: black;
  margin-top:-10px;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}



/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

</style>  

</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
<?php
		include 'include/header.php';
		?>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <?php
		include 'include/menue.php';
		?>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="Admin_dashboard.php">Home</a></li>
              <li><i class="fa fa-user"></i>EDIT PROFILE</li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>
		
		
<?php

    if(isset($_POST['editprofile']))
        {
$first_name = mysqli_real_escape_string($conn, $_REQUEST['fname']);
$last_name = mysqli_real_escape_string($conn, $_REQUEST['lname']);
$gender= mysqli_real_escape_string($conn, $_REQUEST['gender']);
$NationalID= mysqli_real_escape_string($conn, $_REQUEST['NationalID']);
$phone= mysqli_real_escape_string($conn, $_REQUEST['PhoneNumber']);
$district= mysqli_real_escape_string($conn, $_REQUEST['district']);
$position= mysqli_real_escape_string($conn, $_REQUEST['position']);
$department= mysqli_real_escape_string($conn, $_REQUEST['department']);
$username= mysqli_real_escape_string($conn, $_REQUEST['username']);
$email= mysqli_real_escape_string($conn, $_REQUEST['email']);

$sql="UPDATE user_registration SET FIRST_NAME='$first_name',LAST_NAME='$last_name',GENDER='$gender',NATIONAL_ID='$NationalID',
											PHONE_NUMBER='$phone',EMAIL='$email',DISTRICT='$district',POSITION = '$position',DEPARTMENT='$department',USERNAME='$username'
											WHERE USER_ID = '$ID'"; 
if(mysqli_query($conn, $sql)){
    echo "<div class='row' id='helpdiv'><div class='col-lg-12'>
	<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
	<strong>Success!</strong> Profile updated successfully.</div></div></div><br>";
	
	echo "<script type='text/javascript'>
window.setTimeout('closeHelpDiv();', 3000);

function closeHelpDiv(){
document.getElementById('helpdiv').style.display=' none';
}
</script>";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
		}

    ?>
	
														
        <div class="row">
         
          <br>
        <!-- page start-->
        
		
          <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          PROFILE
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          EDIT PROFILE
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
				
                 
                  <!-- profile -->
                  <div id="profile" class="tab-pane active" >
                    <section class="panel">
                     
					  
						<div class="panel-body bio-graph-info" >
						<?php include"include/config.php";?>
<?php


$sql = "SELECT * FROM user_registration WHERE USER_ID = '$ID'"; 
					$result = $conn->query($sql);
					// echo $result->num_rows; die;
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
								$USER_ID=$row["USER_ID"];
								$FIRST=$row["FIRST_NAME"];
								$LAST=$row["LAST_NAME"];
								$GENDER=$row["GENDER"];
								$NATIONAL=$row["NATIONAL_ID"];
								$PHONE=$row["PHONE_NUMBER"];
								$DISTRICT=$row["DISTRICT"];
								$POSITION=$row["POSITION"];
								$DEPARTMENT=$row["DEPARTMENT"];
								$USERNAME=$row["USERNAME"];
								$email=$row["EMAIL"];
								$USER_TYPE=$row["USER_TYPE"];
								?>
																
	
                        
                       
                          <div class="bio-row">
                            <p><span><strong>FIRSTNAME </strong></span>: <?php  echo $FIRST;  ?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span><strong>LASTNAME</strong> </span>: <?php  echo $LAST;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span><strong>DEPARTMENT</strong></span>: <?php  echo $DEPARTMENT;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span><strong>GENDER</strong> </span>: <?php  echo $GENDER;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span><strong>POSITION</strong> </span>: <?php  echo $POSITION;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span><strong>DISTRICT</strong> </span>:<?php  echo $DISTRICT;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span><strong>PHONE NUMBER </strong></span>: <?php  echo $PHONE;  ?></p>
                          </div>
						  <div class="bio-row">
                            <p><span><strong>EMAIL</strong></span>: <?php  echo $email;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span><strong>NATIONAL ID </strong></span>: <?php  echo $NATIONAL;  ?></p> 
                          </div>
						  <div class="bio-row">
                            <p><span><strong>USERNAME</strong> </span>: <?php  echo $USERNAME;  ?></p> 
                          </div>
						  <div class="bio-row">
                            <p><span><strong>USERTYPE </strong></span>: <?php  echo $USER_TYPE;  ?></p> 
                          </div>
                       
                      </div> <?php	}}

    ?>
	
                      
                    </section>
                    <section>
                      
                    </section>
                  </div>
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
					  <div class="profile-widget profile-widget-info">
                      
                      </div><br><br>
					  
<?php


$sql = "SELECT * FROM user_registration WHERE USER_ID = '$ID'"; 
					$result = $conn->query($sql);
					// echo $result->num_rows; die;
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
								$USER_ID=$row["USER_ID"];
								$FIRST=$row["FIRST_NAME"];
								$LAST=$row["LAST_NAME"];
								$GENDER=$row["GENDER"];
								$NATIONAL=$row["NATIONAL_ID"];
								$PHONE=$row["PHONE_NUMBER"];
								$DISTRICT=$row["DISTRICT"];
								$POSITION=$row["POSITION"];
								$DEPARTMENT=$row["DEPARTMENT"];
								$USERNAME=$row["USERNAME"];
								$EMAIL=$row["EMAIL"];
								?>
                        
                                                <form class="form-horizontal" role="form" id="register_form" action="#" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                            <label class="col-lg-2 control-label">First Name</label>
                            <div class="col-lg-6">
                              <input type="text"    class="form-control" id="f-name" name="fname" value="<?php  echo $FIRST;  ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">Last Name</label>
                            <div class="col-lg-6">
                              <input type="text"    class="form-control" id="l-name" name="lname" value="<?php  echo $LAST;  ?>">
                            </div>
                          </div>
						  
						  
						  
						  <div class="form-group">
                        <label class="col-lg-2 control-label">Gender</label>
                        <div class="col-lg-6">
                          <select class="form-control" name="gender">
                                                  <option><?php  echo $GENDER;  ?></option>
                                                  <option>Female</option>
                                                  <option>Male</option>
                                                  
                                                </select>
                        </div>
                      </div>
						  
						  <div class="form-group">
                            <label class="col-lg-2 control-label">National Id/Passport</label>
                            <div class="col-lg-6">
                              <input type="number"  class="form-control" id="nda" name="NationalID"  value="<?php  echo $NATIONAL;  ?>">
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="col-lg-2 control-label">Mobile</label>
                            <div class="col-lg-6">
                              <input type="number"  class="form-control" id="mobile" name="PhoneNumber" value="<?php  echo $PHONE;  ?>">
                            </div>
                          </div>
						  
						   <div class="form-group">
                            <label class="col-lg-2 control-label">Email</label>
                            <div class="col-lg-6">
                              <input type="email"  class="form-control" id="email" name="email" value="<?php  echo $email;  ?>">
                            </div>
                          </div>
						  <div class="form-group">
                        <label class="col-lg-2 control-label">District</label>
                        <div class="col-lg-6">
                          <select class="form-control" name="district">
                                                  <option><?php  echo $DISTRICT;  ?></option>
                                                  <option>Gasabo</option>
                                                  <option>Nyagatare</option>
                                                  <option>Gatsibo</option>
                                                  <option>Rusizi</option>
												  <option>Rubavu</option>
												  <option>Gicumbi</option>
												  <option>Nyamasheke</option>
												  <option>Musanze</option>
												  <option>Bugesera</option>
												  <option>Kayonza</option>
												  <option>Kamonyi</option>
                                                </select>
                        </div>
                      </div>
						  
						  
						  <div class="form-group">
                        <label class="col-lg-2 control-label">Position</label>
                        <div class="col-lg-6">
                          <select class="form-control" name="position">
                                                  <option><?php  echo $POSITION;  ?></option>
                                                  <option>Chief Executive Officer</option>
                                                  <option>Chief Operation Manager</option>
                                                  <option>Chief Technology Officer</option>
                                                  <option>Techinical Support</option>
                                                  <option>Chief Finance Manager</option>
                                                  <option>Software Developers</option>
                                                </select>
                        </div>
                      </div>
	  
						 <div class="form-group">
                        <label class="col-lg-2 control-label">Department</label>
                        <div class="col-lg-6">
                          <select class="form-control" name="department">
                                                  <option><?php  echo $DEPARTMENT;  ?></option>
                                                  <option>Finance Department</option>
                                                  <option>IT Department</option>
                                                  <option>Operational Department</option>
                                                </select>
                        </div>
                      </div>
					  
					  <div class="form-group">
                            <label class="col-lg-2 control-label">Username</label>
                            <div class="col-lg-6">
                              <input type="text"  class="form-control" id="mobile" name="username" value="<?php  echo $USERNAME;  ?>">
                            </div>
                          </div>
						  
						   

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary" name="editprofile">Update</button>
                              <button type="button" class="btn btn-danger" onclick="resetForm('register_form'); return false;">Cancel</button>
                            </div>
                          </div>
                        </form> <?php	}}

    ?>
						
                      </div>				  
                    </section>
                  </div>
                </div>
              </div>
            </section>
          </div>
        

        <!-- page end-->
      </section>
    </section>
	
	<script type="text/javascript">
   function resetForm(register_form)
   {
       var myForm = document.getElementById(register_form);

       for (var i = 0; i < myForm.elements.length; i++)
       {
           if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type)
           {
               myForm.elements[i].checked = false;
               myForm.elements[i].value = '';
               myForm.elements[i].selectedIndex = 0;
           }
       }
   }
</script>
    <!--main content end-->
    <div class="text-right">
      <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
        </div>
    </div>
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- jquery knob -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <!--custome script for all page-->
  <script src="js/scripts.js"></script>

  <script>
    //knob
    $(".knob").knob();
  </script>


</body>

</html>
