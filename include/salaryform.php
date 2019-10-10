<?php include 'config.php'; ?>
<?php

    if(isset($_POST['add']))
        {
$position = mysqli_real_escape_string($conn, $_REQUEST['position']);
$salary = mysqli_real_escape_string($conn, $_REQUEST['salary']);

$sqlt = "SELECT * FROM payroll where POSITION='$position'";
$result = $conn->query($sqlt);
if ($result->num_rows > 0) {
	echo "<div  id='helpdiv'><div class='col-lg-9'>
									<div style='background-color:red;color:white;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
									<strong>Wrong!</strong> This Position already has amount.</div></div></div><br><br><br>";
									
									echo "<script type='text/javascript'>
								window.setTimeout('closeHelpDiv();', 3000);

								function closeHelpDiv(){
								document.getElementById('helpdiv').style.display=' none';
								}
								</script>";
}
else{
										
$sqle = "SELECT * FROM deductions where DEDUCTION_TYPE='Total'";
									$result = $conn->query($sqle);
									if ($result->num_rows > 0) {
										// output data of each row
										while($row = $result->fetch_assoc()) {
											//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
												 $amount=$row["DEDUCTION_AMOUNT"];
												 $net=$salary-$amount;
								$sql = "INSERT INTO payroll (POSITION, GROSS_SALARY, TOTAL_DEDUCTIONS, NET_SALARY)
								VALUES ('$position', '$salary','$amount','$net')";

								if(mysqli_query($conn, $sql)){
									
									
									echo "<div  id='helpdiv'><div class='col-lg-9'>
									<div style='background-color:#C2E1C0;color:green;text-align:center;font-size:17px;padding:10px;border-radius:5px;box-shadow: 0 4px 4px -4px black;'>
									<strong>Success!</strong> Salary created successfully.</div></div></div><br><br><br>";
									
									echo "<script type='text/javascript'>
								window.setTimeout('closeHelpDiv();', 3000);

								function closeHelpDiv(){
								document.getElementById('helpdiv').style.display=' none';
								}
								</script>";
								} else{
									echo "Error: " . $sql . "<br>" . $conn->error;
								}
									}}
									else{echo "0 results";}
		}}

    ?>

		  <div class="col-lg-9 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <div class="pull-left">Add salary</div>
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
                        <label class="control-label col-lg-2">Positions</label>
                        <div class="col-lg-10">
                          <select class="form-control" name="position">
                                                  <option disabled>- Choose Position -</option>
                                                  <option>Chief Executive Officer</option>
                                                  <option>Chief Operation Manager</option>
                                                  <option>Chief Technology Officer</option>
                                                  <option>Techinical Support</option>
                                                  <option>Chief Finance Manager</option>
                                                  <option>Software Developers</option>
                                                </select>
                        </div>
                      </div>

					  
					  
                      <!-- Tags -->
                      <div class="form-group">
                        <label class="control-label col-lg-2" for="tags">Gross Salary</label>
                        <div class="col-lg-10">
                          <input type="number" class="form-control" id="tags" name="salary">
                        </div>

                      </div>
					  					
                      <!-- Buttons -->
                      <div class="form-group">
                        <!-- Buttons -->
                        <div class="col-lg-offset-2 col-lg-9">
                          <button type="submit" class="btn btn-primary" name="add">Add</button>
                          <button type="submit" class="btn btn-danger" onclick="resetForm('register_form'); return false;">Reset</button>
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
