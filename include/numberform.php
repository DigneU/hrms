        <?php
            include 'include/config.php';
        ?>  
		
		
		<?php

    if(isset($_POST['add']))
        {
$leave = mysqli_real_escape_string($conn, $_REQUEST['leave']);
$number = mysqli_real_escape_string($conn, $_REQUEST['number']);

// Attempt insert query execution
$sql = "UPDATE leave_types set LEAVE_DAYS='$number' WHERE LEAVE_TYPE='$leave'";

if(mysqli_query($conn, $sql)){

				$abc="SELECT SUM(LEAVE_DAYS) as total FROM leave_types where TYPE_ID !=4";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				$days=$row["total"];
				
				$sqle = "UPDATE leave_types set LEAVE_DAYS='$days' WHERE LEAVE_TYPE='Normal/Annual'";
				
				if ($conn->query($sqle) === TRUE) {
								echo "<div class='col-lg-9' id='helpdiv'>
								 <div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
								 <strong>Success!</strong> Days added successfully.</div></div><br><br><br>";
								 
								 echo "<script type='text/javascript'>
								window.setTimeout('closeHelpDiv();', 3000);

								function closeHelpDiv(){
								document.getElementById('helpdiv').style.display=' none';
								}
								</script>";
															
														
									}
									else{echo "Error: " . $sqle . "<br>" . $conn->error;}
				
}
}}
 else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
		}
if(isset($_POST['addtype']))
        {
$leave = mysqli_real_escape_string($conn, $_REQUEST['type']);
$sql= "INSERT INTO leave_types (LEAVE_TYPE)VALUES ('$leave')";
																	
if ($conn->query($sql) === TRUE) {
	echo "<div  id='helpdiv'><div class='col-lg-9'>
						<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
						<strong>Success!</strong> Deduction added successfully.</div></div></div><br><br><br>";
						
						echo "<script type='text/javascript'>
					window.setTimeout('closeHelpDiv();', 3000);

					function closeHelpDiv(){
					document.getElementById('helpdiv').style.display=' none';
					}
					</script>";
					} else{
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
		}

    ?>
		  <div class="col-lg-9 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Add Numbers to type of leave</div>
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
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <!-- Title -->

                      <!-- Cateogry -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">LEAVE_TYPE</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="leave" required>
						<option value="">-- Choose Type Of Leave</option>
                            <?php $ret=mysqli_query($conn,"select * from leave_types WHERE NOT (LEAVE_TYPE = 'Normal/Annual')");
                            while($row=mysqli_fetch_array($ret))
                            {
                           ?>
						<option>
						<?php echo htmlentities($row['LEAVE_TYPE']);?>
						</option>
						<?php } ?>	
					  </select>
                        </div>
                      </div>
					  
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags" name="number">Number of Leaves</label>
                        <div class="col-lg-10">
                          <input type="number" class="form-control" id="tags" name="number">
                        </div>

                      </div>
					  
						
					  

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary" name="add">Add</button>
                          <button type="submit" class="btn btn-danger">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>


                </div></div></div></div>
				
				<div class="col-lg-3 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Add Type of Leave</div>
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
                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" autocomplete="off">
                      <!-- Title -->

                      <!-- Cateogry -->
                      
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags" name="number">Type</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="tags" name="type" required>
                        </div>

                      </div>
					  
						
					  

                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary" name="addtype">Add</button>
                          <button type="submit" class="btn btn-danger">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>


                </div></div></div></div>
