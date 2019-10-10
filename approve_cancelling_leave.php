 <?php
		include('include/config.php');
	?> 
<?php  
if(isset($_POST['approve_cancelling'])){
 $leave_id=$_GET['leaveid'];
 
 $sql="UPDATE cancelled_leave,leave_application SET cancelled_leave.STATUS='CANCELLED',leave_application.STATUS='CANCELLED' WHERE cancelled_leave.LEAVE_ID = $leave_id AND leave_application.LEAVE_ID = $leave_id"; 

													if ($conn->query($sql) === TRUE) {
										 
																		
															echo "<script>window.open('pendingleave.php?deleted=user has been deleted','_self')</script>";
																							
																					
															} else {
																					echo "Error: " . $sql . "<br>" . $conn->error;
																				}
																				
																				 
 //$sql2="UPDATE leave_application SET STATUS='CANCELLED' WHERE LEAVE_ID = $leave_id"; 

									}