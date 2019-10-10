<?php 
include ('include/config.php'); 
$ID=$_GET['USER_ID'];
?>
<!DOCTYPE html>
<html lang="en">
<style>
input[type="text"]::placeholder{color:grey;font-weight:bold}
</style>
<?php
		include('include/stylings.php');
	?>

<body>
  <!-- container section start -->
  <section id="container" class="">
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
        
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-users"></i> Users</h3>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="Admin_dashboard.php">Home</a></li>
			  <li><i class="fa fa-bullhorn"></i>QUICK POSTS</li>
              
            </ol>
          </div>
        </div>
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
									$netsalary=$row["NET_SALARY"];
											$sql = "INSERT INTO paid_users (USER_ID,DATE_PAID,TYPE,AMOUNT) VALUES ('$id','$date','$type','$netsalary')";
											if(mysqli_query($conn, $sql)){
												 echo "<div class='col-lg-9' id='helpdiv'>
												 <div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
												 <strong>Success!</strong> Records added successfully.</div></div><br>";
												 
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
												 <strong>Success!</strong> Records added successfully.</div></div><br>";
												 
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
<div class="col-md-9 portlets">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">PAY USER</div>
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
                <div class="widget-foot">
                  
                </div>
              </div>
            </div>

          </div>

        </div>
<script>
function yesnoCheck(that) {
    if (that.value == "Salary in Advance") {
        document.getElementById("ifYes").style.display = "block";
    } else {
        document.getElementById("ifYes").style.display = "none";
    }
}
</script>
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


<br><br>


                <div class="widget-foot">
                  <!-- Footer goes here -->
                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- project team & activity end -->

      </section>
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
    <!--main content end-->
  </section>
  <?php
 include("include/scripting.php")
 ?>
</body>

</html>
