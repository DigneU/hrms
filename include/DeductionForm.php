<?php include 'config.php'; ?>
<?php

    if(isset($_POST['add']))
        {
$deduction = mysqli_real_escape_string($conn, $_REQUEST['deduction']);
$amount = mysqli_real_escape_string($conn, $_REQUEST['amount']);

// Attempt insert query execution
$sql = "UPDATE deductions set DEDUCTION_AMOUNT='$amount' WHERE DEDUCTION_TYPE='$deduction'";

if(mysqli_query($conn, $sql)){
	$abc="SELECT SUM(DEDUCTION_AMOUNT) as TOTAL FROM deductions where DEDUCTION_TYPE!='TOTAL'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				$total=$row["TOTAL"];
				
				$sqle = "UPDATE deductions set DEDUCTION_AMOUNT='$total' WHERE DEDUCTION_TYPE='TOTAL'";
				
				if ($conn->query($sqle) === TRUE) {
					
							$sqlte = "UPDATE payroll set TOTAL_DEDUCTIONS='$total',NET_SALARY=GROSS_SALARY-TOTAL_DEDUCTIONS";
							
							if ($conn->query($sqlte) === TRUE) {
	
						echo "<div  id='helpdiv'><div class='col-lg-9'>
						<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
						<strong>Success!</strong> Deduction added successfully.</div></div></div><br><br><br>";
						
						echo "<script type='text/javascript'>
					window.setTimeout('closeHelpDiv();', 3000);

					function closeHelpDiv(){
					document.getElementById('helpdiv').style.display=' none';
					}
					</script>";
				}
				else{
						echo "ERROR: Could not able to execute $sqlte. " . mysqli_error($conn);
					}
				} else{
						echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
					}
}}}
else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
		}}
if(isset($_POST['addtype']))
        {
$deduction = mysqli_real_escape_string($conn, $_REQUEST['type']);
$sql= "INSERT INTO deductions (DEDUCTION_TYPE)VALUES ('$deduction')";
																	
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
<div class="col-lg-12 col-md-12">
		  <div class="col-lg-6">
        <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Add type of Deduction</div>
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

                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">Deduction TYPE</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" id="tags" name="type" required>
                        </div>

                      </div>          
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary" name="addtype">Add</button>
                          <button type="submit" class="btn btn-danger" onclick="resetForm('register_form'); return false;">Reset</button>
                        </div>
                      </div>
                    </form>
                  </div>


                </div></div></div>
           </div>
				
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
                        <label class="control-label col-lg-2">Deduction</label>
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
                        <label class="control-label col-lg-2" for="tags">Deduction Amount</label>
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
            </div></div>
				
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

 
