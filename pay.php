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
            <h3 class="page-header"><i class="fa fa-user-md"></i> USERS</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="Admin_dashboard.php">Home</a></li>
              
              <li><i class="fa fa-user-md"></i>PAY</li>
            </ol>
          </div>
        </div>
		<?php include"include/config.php";?>
		<?php	
$id=$_REQUEST['USER_ID'];   
if (isset($_POST['update'])) {
$date=$_POST['date'];                     
$type=$_POST['type'];                     
$amount=$_POST['amount'];

if($type==="Monthly salary"){
	$sql_t = "SELECT * FROM user_registration WHERE USER_ID='$id'";
		if ($conn->query($sql_t) ==TRUE) {
		$result = mysqli_query($conn,$sql_t) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if($rows>0){
			while($row = $result->fetch_assoc()) {
			$position=$row["POSITION"];
					$sql_te = "SELECT * FROM payroll WHERE POSITION='$position'";
								if ($conn->query($sql_te) ==TRUE) {
								$result = mysqli_query($conn,$sql_te) or die(mysql_error());
								$rows = mysqli_num_rows($result);
								if($rows>0){
									while($row = $result->fetch_assoc()) {
									$netsalary=$row["GROSS_SALARY"];
											$sql = "INSERT INTO paid_users (USER_ID,DATE_PAID,TYPE,AMOUNT) VALUES ('$id','$date','$type','$netsalary')";
											if(mysqli_query($conn, $sql)){
												 echo "<div class='col-lg-9' id='helpdiv'>
												 <div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
												 <strong>Success!</strong> Amount Added Successfully.</div></div><br>";
												 
												 echo "<script type='text/javascript'>
												window.setTimeout('closeHelpDiv();', 3000);

												function closeHelpDiv(){
												document.getElementById('helpdiv').style.display=' none';
												}
												</script>";
											} else{
												echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
											}
									
}}}}}}}
else{
	$sql = "INSERT INTO paid_users (USER_ID,DATE_PAID,TYPE,AMOUNT) VALUES ('$id','$date','$type','$amount')";
											if(mysqli_query($conn, $sql)){
												 echo "<div class='col-lg-9' id='helpdiv'>
												 <div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
												 <strong>Success!</strong> Amount Added Successfully.</div></div><br>";
												 
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

							


					
								}
								?>
		<?php
		
		
		if(isset($_POST['adds']))
        {
$deduction = mysqli_real_escape_string($conn, $_REQUEST['deduction']);
$amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);
$id=$_REQUEST['USER_ID']; 
$sql= "INSERT INTO user_deduction (USER_ID,DEDUCTION_TYPE,DEDUCTION_AMOUNT)VALUES ('$id','$deduction','$amount')";
if(mysqli_query($conn, $sql)){
	$abc="SELECT SUM(DEDUCTION_AMOUNT) as total FROM user_deduction where  USER_ID='$id'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				$total=$row["total"];
				
				$sqle = "UPDATE user_deduction set TOTAL='$total',USER_ID='$id' WHERE USER_ID='$id'";
				
				if ($conn->query($sqle) === TRUE) {
					echo "<div  id='helpdiv'><div class='col-lg-9'>
						<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
						<strong>Success!</strong> Supplement Added Successfully.</div></div></div><br><br><br>";
						
						echo "<script type='text/javascript'>
					window.setTimeout('closeHelpDiv();', 3000);

					function closeHelpDiv(){
					document.getElementById('helpdiv').style.display=' none';
					}
					</script>";
				}
							
				 else{
						echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
					}
		}}}}
		?>
		<?php
		
		
		if(isset($_POST['add']))
        {
$deduction = mysqli_real_escape_string($conn, $_REQUEST['supplement']);
$amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);
$id=$_REQUEST['USER_ID']; 
$sql= "INSERT INTO user_supplement (USER_ID,SUPPLEMENT_TYPE,SUPPLEMENT_AMOUNT)VALUES ('$id','$deduction','$amount')";
if(mysqli_query($conn, $sql)){
	$abc="SELECT SUM(SUPPLEMENT_AMOUNT) as total FROM user_supplement where  USER_ID='$id'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				$total=$row["total"];
				
				$sqle = "UPDATE user_supplement set TOTAL='$total',USER_ID='$id' WHERE USER_ID='$id'";
				
				if ($conn->query($sqle) === TRUE) {
					echo "<div  id='helpdiv'><div class='col-lg-9'>
						<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
						<strong>Success!</strong> Supplement Added Successfully.</div></div></div><br><br><br>";
						
						echo "<script type='text/javascript'>
					window.setTimeout('closeHelpDiv();', 3000);

					function closeHelpDiv(){
					document.getElementById('helpdiv').style.display=' none';
					}
					</script>";
				}
							
				 else{
						echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
					}
		}}}}
		?>
		
        <div class="row">
          <!-- profile-widget -->
          <div class="col-lg-12">
            <br>
        <!-- page start-->
        <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading tab-bg-info">
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a data-toggle="tab" href="#recent-activity">
                                          <i class="icon-home"></i>
                                          PROFILE
                                      </a>
                  </li>
				   <li>
                    <a data-toggle="tab" href="#deductions">
                                          <i class="icon-user"></i>
                                          ADD DEDUCTIONS
                                      </a>
                  </li>
				   <li>
                    <a data-toggle="tab" href="#supplements">
                                          <i class="icon-user"></i>
                                          ADD SUPPLEMENTS
                                      </a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#profile">
                                          <i class="icon-user"></i>
                                          PAY USER
                                      </a>
                  </li>
                  <li class="">
                    <a data-toggle="tab" href="#edit-profile">
                                          <i class="icon-envelope"></i>
                                          SALARY IN ADVANCE
                                      </a>
                  </li>
				  <li class="">
                    <a data-toggle="tab" href="#month">
                                          <i class="icon-envelope"></i>
                                          MONTHLY SALARY
                                      </a>
                  </li>
                </ul>
              </header>
              <div class="panel-body">
                <div class="tab-content">
                 
				  
				  <div id="recent-activity" class="tab-pane active">
                    <section class="panel">
                      
					  
						<div class="panel-body bio-graph-info">
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
								
								$PHONE=$row["PHONE_NUMBER"];
								
								$POSITION=$row["POSITION"];
								$DEPARTMENT=$row["DEPARTMENT"];
								
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
                            <p><span>POSITION </span>: <?php  echo $POSITION;  ?></p>
                          </div>
                          
                          <div class="bio-row">
                            <p><span>MOBILE </span>: <?php  echo $PHONE;  ?></p>
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
				  
				  <div id="supplements" class="tab-pane ">
                    <section class="panel">
                      
					  
						<div class="panel-body bio-graph-info">
						<div class="col-lg-6">
                 <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Assign amount to Supplement</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="" id="register_form" method="post" enctype="multipart/form-data" autocomplete="off">
                      <!-- Title -->
 <div class="form-group">
                        <label class="control-label col-lg-2" for="title">USER_ID</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="user_id" name="user_id" placeholder="<?php echo $ID ?>" disabled>
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">NAMES</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="names" name="names" placeholder="<?php
											$query=mysqli_query($conn,"select * from user_registration where USER_ID='$ID'");
											while($row=mysqli_fetch_array($query)){
												$first=$row['FIRST_NAME']; 
												$last=$row['LAST_NAME']; 
												echo $first." ".$last;
												}
												?>" disabled>
                        </div>
                      </div>
                      <!-- Cateogry -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">SUPPLEMENT</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="supplement" required>
            <option value="">-- Choose Type Of Supplement</option>
                            <?php $ret=mysqli_query($conn,"select * from supplements WHERE NOT (SUPPLEMENTS_NAME = 'Total')");
                            while($row=mysqli_fetch_array($ret))
                            {
                           ?>
            <option>
            <?php echo htmlentities($row['SUPPLEMENTS_NAME']);?>
            </option>
            <?php } ?>  
            </select>
                        </div>
                      </div>

            
            
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">AMOUNT IN PERCENTAGE</label>
                        <div class="col-lg-10">
                          <input type="number" class="form-control" id="tags" name="amount">
                        </div>

                      </div>          
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary" name="add">ASSIGN</button>
                          <button type="submit" class="btn btn-danger" onclick="resetForm('register_form'); return false;">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>


                </div></div></div>
            </div>
			 <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                <b>SUPPLEMENTS</b>
              </header>
              <div class="panel-body">
                <div class="form">        
          <div class="col-sm-12">
            <section class="panel">
              
              <table border="1" class="table" id="tblCustomers">
                <thead>
                  <tr>
          <th style="background-color:Lavender ">SUPPLEMENTS</th>
          <th style="background-color:Lavender ">PERCENTAGE</th>
		  <th style="background-color:Lavender ">GROSS_SALARY</th>
		  <th style="background-color:Lavender ">SUPPLEMENT_AMOUNT</th>
		 <th style="background-color:Lavender ">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <?php
            $id=$_REQUEST['USER_ID']; 
            $sql = "SELECT * FROM user_supplement  where USER_ID='$id'  "; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $deduction=$row["SUPPLEMENT_TYPE"];  
                  $amount=$row["SUPPLEMENT_AMOUNT"]; 
				  $total=$row["TOTAL"];
				  
				  $sqls = "SELECT * FROM paid_users where USER_ID='$id' and TYPE='Monthly salary'"; 
            $results = $conn->query($sqls);

            if ($results->num_rows > 0) {
              // output data of each row
              while($row = $results->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                 $gross=$row["AMOUNT"];
				  $supplement= ($gross*$amount)/100;
                  
            ?>  
             <td><?php echo $deduction;  ?></td>
                    <td><?php echo  $amount;  ?> % &nbsp;</td> 
				<td><?php echo $gross;  ?></td>	
				<td><?php echo $supplement;  ?></td>
<td><?php echo $total; ?> % &nbsp;</td>
                  </tr>
			<?php }}}} else {
    echo "No Data Found";
}


 ?>


                </tbody>
              </table>        
            </section>
          </div>
                  
          <!-- page end-->
          
          
                </div>

              </div>
            </section>
          </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
				  
				  
				   <div id="deductions" class="tab-pane">
                    <section class="panel">
                      
					  
						<div class="panel-body bio-graph-info">
						
						<div class="col-lg-6">
                <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Assign amount to Deduction</div>
                <div class="widget-icons pull-right">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="panel-body">
                <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="" id="register_form" method="post" enctype="multipart/form-data" autocomplete="off">
                      <!-- Title -->
 
                      <!-- Cateogry -->
					  <div class="form-group">
                        <label class="control-label col-lg-2" for="title">USER_ID</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="user_id" name="user_id" placeholder="<?php echo $ID ?>" disabled>
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">NAMES</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="names" name="names" placeholder="<?php
											$query=mysqli_query($conn,"select * from user_registration where USER_ID='$ID'");
											while($row=mysqli_fetch_array($query)){
												$first=$row['FIRST_NAME']; 
												$last=$row['LAST_NAME']; 
												echo $first." ".$last;
												}
												?>" disabled>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-lg-2">DEDUCTION</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="deduction" required>
            <option value="">-- Choose Type Of Deduction</option>
                            <?php $ret=mysqli_query($conn,"select * from deductions WHERE NOT (DEDUCTION_TYPE = 'Total')");
                            while($row=mysqli_fetch_array($ret))
                            {
                           ?>
            <option>
            <?php echo htmlentities($row['DEDUCTION_TYPE']);?>
            </option>
            <?php } ?>  
            </select>
                        </div>
                      </div>

            
            
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">AMOUNT IN PERCENTAGE</label>
                        <div class="col-lg-10">
                          <input type="number" class="form-control" id="tags" name="amount">
                        </div>

                      </div>          
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary" name="adds">ASSIGN</button>
                          <button type="submit" class="btn btn-danger" onclick="resetForm('register_form'); return false;">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>


                </div></div></div>
            </div>
			
			 <div class="col-lg-6">
            <section class="panel">
              <header class="panel-heading">
                <b>DEDUCTIONS</b>
              </header>
              <div class="panel-body">
                <div class="form">        
          <div class="col-sm-12">
            <section class="panel">
              
              <table border="1" class="table" id="tblCustomers">
                <thead>
                  <tr>
          <th style="background-color:Lavender ">DEDUCTION_TYPE</th>
          
		  <th style="background-color:Lavender ">PERCENTAGE</th>
		  <th style="background-color:Lavender ">GROSS_SALARY</th>
		  <th style="background-color:Lavender ">DEDUCTION_AMOUNT</th>
		  <th style="background-color:Lavender ">TOTAL</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <?php
					  $id=$_REQUEST['USER_ID']; 
            $sql = "SELECT * FROM user_deduction where USER_ID='$id'"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $deduction=$row["DEDUCTION_TYPE"];  
                  $amount=$row["DEDUCTION_AMOUNT"]; 
				  $total=$row["TOTAL"];
				  
				  $sqls = "SELECT * FROM paid_users where USER_ID='$id' and TYPE='Monthly salary' "; 
            $results = $conn->query($sqls);

            if ($results->num_rows > 0) {
              // output data of each row
              while($row = $results->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                 $gross=$row["AMOUNT"];
				  $deductions= ($gross*$amount)/100;  
                  
            ?>  
             <td><?php echo $deduction;  ?></td>
			
                    <td><?php echo $amount;  ?> % &nbsp;</td>
<td>
					<?php echo $gross;  ?>
					
					</td>					
					<td>
					<?php echo $deductions;  ?>
					
					</td>
<td>
					<?php echo $total;  ?>
					% &nbsp;
					</td>
                  </tr>
			<?php }}}} else {
    echo "0 results";
}


 ?>


                </tbody>
              </table>        
            </section>
          </div>
                  
          <!-- page end-->
          
          
                </div>

              </div>
            </section>
          </div>
                    </section>
                    <section>
                      <div class="row">
                      </div>
                    </section>
                  </div>
				  
				  
                  <!-- profile -->
                  <div id="profile" class="tab-pane">
                    <section class="panel">
                      
					  
						<div class="panel-body bio-graph-info">
						 <div class="padd">

                  <div class="form quick-post">
                    <!-- Edit profile form (not working)-->
                    <form class="form-horizontal" action="" id="register_form" method="post" enctype="multipart/form-data">
                      <!-- Title -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="title">USER_ID</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="user_id" name="user_id" placeholder="<?php echo $ID ?>" disabled>
                        </div>
                      </div>
                      <!-- Content -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="content">NAMES</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="names" name="names" placeholder="<?php
											$query=mysqli_query($conn,"select * from user_registration where USER_ID='$ID'");
											while($row=mysqli_fetch_array($query)){
												$first=$row['FIRST_NAME']; 
												$last=$row['LAST_NAME']; 
												echo $first." ".$last;
												}
												?>" disabled>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-2" for="content">SELECT DATE</label>
                        <div class="col-lg-10">
                          <input type="date" class="form-control" id="date" name="date" required>
                        </div>
                      </div>
                      <!-- Cateogry -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">TYPE OF PAY</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="type" onchange="yesnoCheck(this);" required>
                                                  <option>- Choose type -</option>
                                                  <option value="Salary in Advance">Salary in Advance</option>
                                                  <option>Monthly salary</option>
                                                </select>
                        </div>
                      </div>
					  <div class="form-group" id="ifYes" style="display: none;">
                        <label class="control-label col-lg-2" for="title">ENTER AMOUNT</label>
                        <div class="col-lg-10">
                          <input type="number" class="form-control" id="amount" name="amount">
                        </div>
                      </div>
					  
					  
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" name="update" class="btn btn-primary">PAY</button>
                          <button type="reset" class="btn btn-danger" onclick="resetForm('register_form'); return false;">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>


                </div>
                      <div class="row">
                      </div>
                    </section>
                  </div>
                  <!-- edit-profile -->
                  <div id="edit-profile" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
					  <div class="profile-widget profile-widget-info">
                      <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">
                PAYROLL STATEMENT
              </header>
              <div class="panel-body">
                <div class="form">				
          <div class="col-sm-12">
            <section class="panel" id="tblCustomers">
			
			
			  <table border="1" class="table"> <caption>SALARY STATEMENT</caption> 
			  <tr>
			   <?php
			   $id=$_REQUEST['USER_ID'];
            $sql = "SELECT * FROM user_registration where USER_ID= '$id'"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $first=$row["FIRST_NAME"];  
                  $last=$row["LAST_NAME"]; 
				    $phone=$row["PHONE_NUMBER"]; 
					  $position=$row["POSITION"]; 
					    $department=$row["DEPARTMENT"]; 
            ?>  
			  <td  style="color:black;" > <strong>EMPLOYEE INFO</strong>
			  <br>NAMES: <?php echo $first. " ". $last;  ?><br> PHONE: <?php echo $phone;  ?>
			   <br> POSITION: <?php echo $position;  ?><br> DEPARTMENT: <?php echo $department;  ?><br></td> 
			   <td style="color:black;"> <strong> MVEND ORGANIZATION</strong></td>
			 
			 
			  </tr>
			  <?php }} else {
    echo "0 results";
}


 ?>
			  </thead> <tbody> <tr>
			 
			  
			  <th>ITEMS</th> 
			   <th>DESCRIPTION</th> </tr>
			   <tr> 
			     <?php
				 $id=$_REQUEST['USER_ID'];
            $sql = "SELECT * FROM paid_users where USER_ID= '$id' and TYPE='Salary in Advance'"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $first=$row["DATE_PAID"];  
                  $last=$row["TYPE"]; 
				  $phone=$row["AMOUNT"];
				   
            ?>  <tr > <th style="color:black;">DATE OF PAYMENT</th> <td style="color:black;"><?php echo $first;  ?> </td> 
          
			  </tr> 
          <tr > <th style="color:black;">TYPE OF PAYMENT</th> <td style="color:black;"><?php echo $last;  ?> </td> 
          
			  </tr>
			   </tbody> <tfoot>
			  <tr style="background-color:Lavender  "> <th style="color:black;">AMOUNT</th> <td style="color:black;"><?php echo $phone;  ?> </td> 
          
			  </tr> 
			  
			  <?php }} else {
    echo "0 results";
}

 ?></tfoot> </table>
			  <br><br>
				
            </section>
			 <br><br>
			<center>
             <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
             <button class="btn btn-primary hidden-download" type="button" id="btnExport" value="Export" onclick="Export()"><i class="fa fa-download"></i> Export PDF</button>
	    </center>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
		<script>
		function myFunction() {
    window.print();
}
 function Export() {
            html2canvas(document.getElementById('tblCustomers'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Payroll.pdf");
                }
            });
        }
        
</script>
          </div>
             
                </div>

              </div>
            </section>
          </div>
					   
					   
					   
                      </div><br><br>
					  <?php include"include/config.php";?>
					  

                      </div>				  
                    </section>
                  </div>
				  
				      <!-- edit-profile -->
                  <div id="month" class="tab-pane">
                    <section class="panel">
                      <div class="panel-body bio-graph-info">
					  <div class="profile-widget profile-widget-info">
                      <div class="col-lg-9">
            <section class="panel">
              <header class="panel-heading">
                MONTHLY SALARY STATEMENT
              </header>
              <div class="panel-body">
                <div class="form">				
          <div class="col-sm-12">
            <section class="panel" id="tblCustomers">
			
			
			  <table border="1" class="table"> 
			  <tr>
			    <?php
             $id=$_REQUEST['USER_ID'];
            $sql = "SELECT * FROM user_registration where USER_ID= '$id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $first=$row["FIRST_NAME"];  
                  $last=$row["LAST_NAME"]; 
				    $phone=$row["PHONE_NUMBER"]; 
					  $position=$row["POSITION"]; 
					    $department=$row["DEPARTMENT"]; 
            ?>  
			  <td  style="color:black;" > <strong>EMPLOYEE INFO</strong>
			  <br>NAMES: <?php echo $first. " ". $last;  ?><br> PHONE: <?php echo $phone;  ?>
			   <br> POSITION: <?php echo $position;  ?><br> DEPARTMENT: <?php echo $department;  ?><br></td> 
			   <td style="color:black;"> <strong> MVEND ORGANIZATION</strong></td>
			  </tr>
			  <?php }} else {
    echo "No Data Found";
}


 ?>
			  </thead> <tbody> <tr>
			 
			  
			  <th>ITEM</th> 
			   <th>AMOUNT</th> </tr>
			   <tr> 
			     <?php
				 $id=$_REQUEST['USER_ID'];
            $sql = "SELECT * FROM paid_users where USER_ID= '$id' and TYPE='Monthly salary'"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $firsts=$row["AMOUNT"];  
                  
            ?>  <tr> <th style="color:black;" >GROSS_SALARY</th> <td style="color:black;"><?php echo $firsts;  ?></td> 
			  </tr> 
			  </tr> 
			  <tr> 
			     <?php
				 $id=$_REQUEST['USER_ID'];
            $sql = "SELECT * FROM user_supplement where USER_ID= '$id'"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $first=$row["TOTAL"]; 
				  $amount=($firsts*$first)/100;
				  
                  
            ?>  <tr > <th style="color:black;" >TOTAL_SUPPLEMENTS</th> <td style="color:black;"><?php echo $amount;  ?></td>
			
			  </tr> 
			  </tr> 
			  
        <?php
          
          $peramount= $firsts + $amount;
        ?>
			  
			   </tbody> <tfoot>
			  <tr style="background-color:Lavender  "> <th style="color:black;">SUBTOTAL</th> <td style="color:black;"><?php echo $peramount;  ?> </td>
<tr> 
			     <?php
			$id=$_REQUEST['USER_ID'];
            $sql = "SELECT * FROM user_deduction where USER_ID= '$id'"; 
			
            $result = $conn->query($sql);
			
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $first=$row["TOTAL"]; 
				  $amountss=($firsts*$first)/100;
				  
				  $sqls = "SELECT * FROM paid_users where USER_ID= '$id' and TYPE='Salary in Advance'"; 
				  $results = $conn->query($sqls);
				  if ($results->num_rows > 0) {
              // output data of each row
              while($row = $results->fetch_assoc()) {
                //echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
                   
                  $salary=$row["AMOUNT"];
				  
                  
            ?>  
			<tr > <th style="color:black;" >TOTAL_DEDUCTIONS</th> <td style="color:black;"><?php echo $amountss;  ?></td>
			
			  </tr> 
			  <tr > <th style="color:black;" >SALARY IN ADVANCE</th> <td style="color:black;"><?php echo $salary;  ?></td>
			
			  </tr>
			  </tr> 			  
          <?php
          $peramount= $firsts + $amount;
          $peramounts= $peramount -($amountss +$salary);
        ?>
			  
			  </tr> <tr style="background-color:Lavender "> <th style="color:black;" >NET_SALARY</th> <td style="color:black;"><?php echo $peramounts;  ?></td> 
			  </tr> 
			  
				  <?php }}}}
						  else {
    echo "0 results";
}

 ?>
			  <?php }} else {
    echo "0 results";
}

 ?>			   
<?php }} else {
    echo "0 results";
}

 ?>				   
			
			   </tfoot> </table>
			  <br><br>
				
            </section>
			 <br><br>
			<center>
             <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
             <button class="btn btn-primary hidden-download" type="button" id="btnExport" value="Export" onclick="Export()"><i class="fa fa-download"></i> Export PDF</button>
	    </center>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.22/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
		<script>
		function myFunction() {
    window.print();
}
 function Export() {
            html2canvas(document.getElementById('tblCustomers'), {
                onrendered: function (canvas) {
                    var data = canvas.toDataURL();
                    var docDefinition = {
                        content: [{
                            image: data,
                            width: 500
                        }]
                    };
                    pdfMake.createPdf(docDefinition).download("Payroll.pdf");
                }
            });
        }
        
</script>
          </div>
             
                </div>

              </div>
            </section>
          </div>
					   
					   
					   
                      </div><br><br>
					  <?php include"include/config.php";?>
					  

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
<script>
function yesnoCheck(that) {
    if (that.value == "Salary in Advance") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
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
