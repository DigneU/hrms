<?php
  include"include/config.php";
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php
include"include/stylings.php";
?>
  
 	<style> 
#example {
 
  position: relative;
  -webkit-animation-name: example; /* Safari 4.0 - 8.0 */
  -webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
  -webkit-animation-iteration-count: 100; /* Safari 4.0 - 8.0 */
  animation-name: example;
  animation-duration: 3s;
  animation-iteration-count: 1000;
}

/* Safari 4.0 - 8.0 */
@-webkit-keyframes example {
  0%   { left:0px; top:0px;}
  25%  { left:2px; top:0px;}
  50%  { left:2px; top:2px;}
  75%  {left:0px; top:2px;}
  100% { left:0px; top:0px;}
}

/* Standard syntax */
@keyframes example {
  0%   { left:0px; top:0px;}
  25%  { left:20px; top:0px;}
  50%  { left:20px; top:20px;}
  75%  { left:0px; top:20px;}
  100% { left:0px; top:0px;}
}
</style>
</head>
<body>
  <!-- container section start -->
  <section id="container" class="">

      <!-- include header and menubar start -->
       
	   		  <?php
  include"include/bannermenu.php";
  ?>
        <!-- include header and menubar end -->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Dashboard</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="User_dashboard.php">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="leaveinfor.php"><div class="info-box blue-bg">
              <i class="icon_desktop"></i>
              <div class="count">
			  <?php
						$sql = "SELECT * FROM leave_application WHERE USER_ID='".$_SESSION['user']."' and STATUS='CONFIRMED' ORDER BY LEAVE_ID DESC LIMIT 1";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									 
									$REMAINING_DAYS=$row["REMAINING_DAYS"];  
									
						 echo $REMAINING_DAYS; 
                    
						 }} else {
							 if($_SESSION['gender']=="Male"){
								 $abc="SELECT SUM(LEAVE_DAYS) as total FROM leave_types where TYPE_ID !=4 AND TYPE_ID !=1";
									$result=mysqli_query($conn,$abc);
									if($result)
									{
									while($row=mysqli_fetch_assoc($result))
									{
									$days=$row["total"];
							 echo $days;}}}
							 
							 
							 else{
									 
							 $sql = "SELECT * FROM leave_types where LEAVE_TYPE='Normal/Annual'";
							 $result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									 
									$TOTAL_DAYS=$row["LEAVE_DAYS"];
							 
							echo $TOTAL_DAYS;
						 }}}}

					 ?>
			  
  
			  </div>
              <div class="title">Remaining &nbsp;&nbsp;&nbsp;Leave &nbsp;&nbsp;&nbsp; Applications</div>
            </div></a>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="payroll.php" style="color:white"><div class="info-box brown-bg">
              <i class="fa fa-money"></i>
              <div class="count">
			  
			  <?php
						$sql = "SELECT * FROM Payroll WHERE POSITION='".$_SESSION['Position']."'"; 
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									 
									$POSITION=$row["POSITION"];  
									$GROSS_SALARY=$row["GROSS_SALARY"];  
									$TOTAL_DEDUCTIONS=$row["TOTAL_DEDUCTIONS"];  
									$NET_SALARY=$row["NET_SALARY"];  
									//$EXPENSES=$row["EXPENSES"];  
									//$NET_SALARY=$row["NET_SALARY"];

                   
						 echo $NET_SALARY; 
                    
						 }} else {
    echo "0 results";
}

 ?>
			  
			  </div></a>
              <div class="title">Monthly &nbsp;&nbsp;&nbsp;Salary </div>
            </div>
            <!--/.info-box-->
          </div>
          <!--/.col-->

          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <a href="announcement.php"><div class="info-box dark-bg">
              <i class="fa fa-bullhorn" style="font-size:48px"></i>
              <div class="count">
			  <?php 
				$abc="SELECT count(*) as total FROM post";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				echo $row['total'];
				}     
				}
				?>
			  
			  
			  
			  
			  </div>
              <div class="title">Announcement</div>
            </div></a>
            <!--/.info-box-->
          </div>
          <!--/.col-->
            <!--/.info-box-->
          </div>
          <!--/.col-->

        </div>
        <!--/.row-->
        <div class="row">
          
          <div class="col-md-12 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><strong>Calendar</strong></h2>
                <div class="panel-actions">
                  <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                </div>

              </div><br><br><br>
              <div class="panel-body">
                <!-- Widget content -->

                <!-- Below line produces calendar. I am using FullCalendar plugin. -->
                <div id="calendar"></div>

              </div>
            </div>
        </div>
        
                </div>
                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- project team & activity end -->

      </section>
      <div class="text-center">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          &copy2019 Imaginet
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->
<?php
  include"include/scripts.php";
  ?>
  
</body>

</html>