
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

      <!-- include header and menubar start -->
        <?php
            include 'include/bannermenu.php';
        ?>
        <!-- include header and menubar end -->

    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="Admin_dashboard.php">Home</a></li>
              <li><i class="fa fa-user"></i>Manage Users</li>
              <li><i class="fa fa-user-md"></i>Profile</li>
            </ol>
          </div>
        </div>
		<?php include"include/config.php";?>
		<?php

														if(isset($_POST['upload']))
															{
											
													$fileinfo=PATHINFO($_FILES["picture"]["name"]);
														$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
														move_uploaded_file($_FILES["picture"]["tmp_name"],"upload/" . $newFilename);
														$location="upload/" . $newFilename;


													// Attempt insert query execution

													 $sql="UPDATE user_registration SET PROFILE_PICTURE='$location' WHERE USER_ID ='".$_SESSION['user']."' ";

													if ($conn->query($sql) === TRUE) {
														echo "<script>window.open('profile.php?deleted=user has been deleted','_self')</script>";
														} else {
														echo "Error: " . $sql . "<br>" . $conn->error;
															}}
															?>
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
$sql_t = "SELECT * FROM user_registration WHERE USER_ID != '".$_SESSION['user']."' AND USERNAME='$username'";
		if ($conn->query($sql_t) ==TRUE) {
		$result = mysqli_query($conn,$sql_t) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if($rows>0){
		echo "<div class='alerte' id='helpdiv'> 
  <div class='col-lg-12'>
	<div style='background-color:red;color:white;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
	<strong> Username already exist <strong>&#10008</strong></div></div></div><br>";
echo "<script type='text/javascript'>
window.setTimeout('closeHelpDiv();', 3000);

function closeHelpDiv(){
document.getElementById('helpdiv').style.display=' none';
}
</script>";
	
		}
		else{

$sql="UPDATE user_registration SET FIRST_NAME='$first_name',LAST_NAME='$last_name',GENDER='$gender',NATIONAL_ID='$NationalID',
											PHONE_NUMBER='$phone',EMAIL='$email',DISTRICT='$district',POSITION = '$position',DEPARTMENT='$department',USERNAME='$username'
											WHERE USER_ID = '".$_SESSION['user']."'"; 
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
		}}}

    ?>
	
														
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <div class="profile-widget profile-widget-info">
              <div class="panel-body">
                
                  <div class="col-lg-2 col-sm-6">
                    <?php
		$query=mysqli_query($conn,"select * from user_registration where USER_ID='".$_SESSION['user']."'");
		while($row=mysqli_fetch_array($query)){
			$picture  =$row['PROFILE_PICTURE']; 
			echo "<img src='".$picture."' style='border-radius:50%;width:90%;height:200px;'>";
			}
			?>
                  
				  <b><i class="fa fa-edit" onclick="document.getElementById('id02').style.display='block'" style="margin-top:-50px;margin-left:60px;font-size:30px;color:white"></i></b>
				  <div>
				  <div id="id02" class="modal">
						  
												  <div style="width:50%;" class="modal-content animate">
													<div class="imgcontainer">
														<center><h3 class="heading3" style="color:grey"><b>CHANGE PROFILE PICTURE </b><span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span></h3>
														<br>
														<form action="" method="post" enctype="multipart/form-data">
															<input type="file" name="picture"  style="width:50%" required><br><br>
															
															<button type="submit" class="btn btn-primary" name="upload">UPLOAD</button><br><br>	
														</form></center>
														</div></div>
														

													</div>
                </div>
               
              </div>
			  <div class="col-lg-2 col-sm-6">
                  <h1><?php  echo $_SESSION['name'];  ?></h1>
				  <h1><?php  echo 'TYPE:'.' '.$_SESSION['type'];  ?></h1><br>
				  </div>
            </div>
          </div>
        </div><br>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          MY PROFILE
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
                  <div id="profile" class="tab-pane active">
                    <section class="panel">
                     
					  
						<div class="panel-body bio-graph-info" >
						<?php include"include/config.php";?>
<?php


$sql = "SELECT * FROM user_registration WHERE USER_ID = '".$_SESSION['user']."'"; 
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
																
	
                        
                        <div class="row">
                          <div class="bio-row">
                            <p><span>FIRSTNAME </span>: <?php  echo $FIRST;  ?> </p>
                          </div>
                          <div class="bio-row">
                            <p><span>LASTNAME </span>: <?php  echo $LAST;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>DEPARTMENT</span>: <?php  echo $DEPARTMENT;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>GENDER </span>: <?php  echo $GENDER;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>POSITION </span>: <?php  echo $POSITION;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>DISTRICT </span>:<?php  echo $DISTRICT;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>MOBILE </span>: <?php  echo $PHONE;  ?></p>
                          </div>
						  <div class="bio-row">
                            <p><span>EMAIL </span>: <?php  echo $EMAIL;  ?></p>
                          </div>
                          <div class="bio-row">
                            <p><span>NATIONAL ID </span>: <?php  echo $NATIONAL;  ?></p> 
                          </div>
                        </div>
                      </div> <?php	}}

    ?>
	
                      
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info" >
					  <br><br>
					  <?php include"include/config.php";?>
<?php


$sql = "SELECT * FROM user_registration WHERE USER_ID = '".$_SESSION['user']."'"; 
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
                            <label class="col-lg-2 control-label">FIRSTNAME</label>
                            <div class="col-lg-6">
                              <input type="text"    class="form-control" id="f-name" name="fname" value="<?php  echo $FIRST;  ?>">
                            </div>
                          </div>
                          <div class="form-group">
                            <label class="col-lg-2 control-label">LASTNAME</label>
                            <div class="col-lg-6">
                              <input type="text"    class="form-control" id="l-name" name="lname" value="<?php  echo $LAST;  ?>">
                            </div>
                          </div>
						  
						  
						  
						  <div class="form-group">
                        <label class="col-lg-2 control-label">GENDER</label>
                        <div class="col-lg-6">
                          <select class="form-control" name="gender">
                                                  <option><?php  echo $GENDER;  ?></option>
                                                  <option>Female</option>
                                                  <option>Male</option>
                                                  
                                                </select>
                        </div>
                      </div>
						  
						  <div class="form-group">
                            <label class="col-lg-2 control-label">NATIONAL_ID</label>
                            <div class="col-lg-6">
                              <input type="number"  class="form-control" id="nda" name="NationalID"  value="<?php  echo $NATIONAL;  ?>">
                            </div>
                          </div>
						  
						  <div class="form-group">
                            <label class="col-lg-2 control-label">PHONE_NUMBER</label>
                            <div class="col-lg-6">
                              <input type="number"  class="form-control" id="mobile" name="PhoneNumber" value="<?php  echo $PHONE;  ?>">
                            </div>
                          </div>
						  <div class="form-group">
                            <label class="col-lg-2 control-label">EMAIL</label>
                            <div class="col-lg-6">
                              <input type="email"  class="form-control" id="email" name="email" value="<?php  echo $EMAIL;  ?>">
                            </div>
                          </div>
						  
						  
						  <div class="form-group">
                        <label class="col-lg-2 control-label">DISTRICT</label>
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
                        <label class="col-lg-2 control-label">POSITION</label>
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
                        <label class="col-lg-2 control-label">DEPARTMENT</label>
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
                            <label class="col-lg-2 control-label">USERNAME</label>
                            <div class="col-lg-6">
                              <input type="text"  class="form-control" id="mobile" name="username" value="<?php  echo $USERNAME;  ?>">
                            </div>
                          </div>
						  
						   

                          <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                              <button type="submit" class="btn btn-primary" name="editprofile">UPDATE</button>
                              <button type="button" class="btn btn-danger" onclick="resetForm('register_form'); return false;">CANCEL</button>
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
