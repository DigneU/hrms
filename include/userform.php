<?php include 'config.php'; ?>
<?php

    if(isset($_POST['save']))
        {
$first_name = mysqli_real_escape_string($conn, $_REQUEST['Fname']);
$last_name = mysqli_real_escape_string($conn, $_REQUEST['Lname']);
$username= mysqli_real_escape_string($conn, $_REQUEST['username']);
$user_type= mysqli_real_escape_string($conn, $_REQUEST['user_type']);
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
$sql = "INSERT INTO user_registration (FIRST_NAME, LAST_NAME,USERNAME,USER_TYPE,PASSWORD)
VALUES ('$first_name', '$last_name','$username','$user_type',PASSWORD('$password'))";

if(mysqli_query($conn, $sql)){
   
	echo "<div class='alertO' id='helpdiv'> 
	<div class='col-lg-9'>
	<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
  <center> Account created successfully <strong>&#10004</strong></center></div></div>
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
		  
		  <div class="col-lg-9 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Register Users</div>
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
                        <label class="control-label col-lg-2" for="title">FirstName</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title" name="Fname" required>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-2" for="title">LastName</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="title" name="Lname" required>
                        </div>
                      </div>
					 
					  
					  
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">Username</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="tags" name="username" required>
                        </div>

                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-2">Type</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="user_type" required>
                                                  <option disabled selected>- Choose Type -</option>
                                                  <option>User</option>
                                                  <option>Admin</option>
                                                </select>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">Enter Password</label>
                        <div class="col-lg-10">
                          <input type="password" class="form-control" id="tags" name="password" required>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">Confirm Password</label>
                        <div class="col-lg-10">
                          <input type="password" class="form-control" id="tags" name="re-password" required>
                        </div>
                      </div>
					  

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary" name="save">Create</button>
                          <button type="submit" class="btn btn-danger" name="cancel" onclick="resetForm('register_form'); return false;">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>


                </div></div></div></div>
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