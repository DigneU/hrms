 <?php
		include('include/config.php');
		$ID=$_GET['USER_ID'];
	?> 
<?php  
if(isset($_POST['assign'])){
 $user_type=$_POST['user_type'];
$sql = "SELECT * FROM create_account WHERE USER_ID='$ID'";
					$result = $conn->query($sql);
					// echo $result->num_rows; die;
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
								$USER_ID=$row["USER_ID"];  
								$FIRST_NAME=$row["FIRST_NAME"];  
								$LAST_NAME=$row["LAST_NAME"];  
								$USER_NAME=$row["USERNAME"];
								$PASSWORD=$row["PASSWORD"];
								$EMAIL=$row["EMAIL"];
							
										$sqle = "INSERT INTO user_registration (FIRST_NAME, LAST_NAME, USERNAME, EMAIL,USER_TYPE, PASSWORD)
										VALUES ('$FIRST_NAME', '$LAST_NAME', '$USER_NAME','$EMAIL','$user_type', '$PASSWORD' )";
										if ($conn->query($sqle) === TRUE) {
										 
															$delete_query="delete  from create_account WHERE USER_ID='$ID'";//delete query 
															
															$run=mysqli_query($conn,$delete_query) or die(mysqli_error($conn));  
															if($run)  
															{
																				
															echo "<script>window.open('pendingusers.php?deleted=user has been deleted','_self')</script>";
																							
																					
															} else {
																					echo "Error: " . $delete_query . "<br>" . $conn->error;
																				}
															//javascript function to open in the same window 
									}
									else{echo "Error: " . $sqle . "<br>" . $conn->error;}
									
											
					}}
									else{
echo "Error: " . $sql . "<br>" . $conn->error;}}
					

?>  