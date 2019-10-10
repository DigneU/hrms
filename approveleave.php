 <?php
		include('include/config.php');
	?> 
<?php  
if(isset($_POST['approve'])){
 $leave_id=$_GET['leaveid'];
 
 $sql="UPDATE leave_application SET STATUS='CONFIRMED' WHERE LEAVE_ID = $leave_id"; 

													if ($conn->query($sql) === TRUE) {
										 
																		
															echo "<script>window.open('pendingleave.php?deleted=user has been deleted','_self')</script>";
																							
																					
															} else {
																					echo "Error: " . $sql . "<br>" . $conn->error;
																				}
															//javascript function to open in the same window 
									}
									


?>  