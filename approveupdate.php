 <?php
		include('include/config.php');
	?> 
<?php  
if(isset($_POST['submit'])){
 $del=$_GET['del'];
$sql = "SELECT * FROM account_request WHERE USER_ID='$del'";
					$result = $conn->query($sql);
					// echo $result->num_rows; die;
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
								$USER_ID=$row["USER_ID"];  
								$FIRST_NAME=$row["FIRST_NAME"];  
								$LAST_NAME=$row["LAST_NAME"];  
								$GENDER=$row["GENDER"];  
								$NATIONAL_ID=$row["NATIONAL_ID"];
								$PHONE_NUMBER=$row["PHONE_NUMBER"];
								$DISTRICT=$row["DISTRICT"];
								$POSITION=$row["POSITION"];
								$DEPARTMENT=$row["DEPARTMENT"];
								$USER_NAME=$row["USERNAME"];
								$USER_TYPE=$row["USER_TYPE"];
								$PASSWORD=$row["PASSWORD"];
	
											$update_query="UPDATE user_registration SET FIRST_NAME='$FIRST_NAME',LAST_NAME='$LAST_NAME',GENDER='$GENDER',NATIONAL_ID='$NATIONAL_ID',
											PHONE_NUMBER='$PHONE_NUMBER',DISTRICT='$DISTRICT',POSITION = '$POSITION',DEPARTMENT='$DEPARTMENT',
											USERNAME='$USER_NAME'
											WHERE USER_ID='$del'";
											
											if ($conn->query($update_query) ==TRUE) {
												$delete_query="delete  from account_request WHERE USER_ID='$del'";//delete query 
															
															$run=mysqli_query($conn,$delete_query) or die(mysqli_error($conn));  
															if($run)  
															{
												echo "<script>window.open('pendingupdates.php?deleted=user has been deleted','_self')</script>";
											}
											else {
																					echo "Error: " . $delete_query . "<br>" . $conn->error;
																				}
											}
											else{
												echo "Error: " . $update_query . "<br>" . $conn->error;
											}
										}
										
									
											
					}}
					

?>  