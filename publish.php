 <?php
		include('include/config.php');
	?> 
<?php  
if(isset($_POST['publish'])){
 $postid=$_GET['del'];
$sql = "SELECT * FROM post_draft WHERE POST_ID='$postid'";
					$result = $conn->query($sql);
					// echo $result->num_rows; die;
					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
								$POST_ID=$row["POST_ID"];  
								$TITLE=$row["TITLE"];  
								$CONTENT=$row["CONTENT"];  
								$CATEGORY=$row["CATEGORY"];
								$PICTURE=$row["PICTURE"];
								$DATE=$row["DATE"];
							
										$sqle = "INSERT INTO post (TITLE, CONTENT, CATEGORY, PICTURE, DATE)
										VALUES ('$TITLE', '$CONTENT', '$CATEGORY','$PICTURE', '$DATE' )";
										if ($conn->query($sqle) === TRUE) {
										 
															$delete_query="delete  from post_draft WHERE POST_ID='$postid'";//delete query 
															
															$run=mysqli_query($conn,$delete_query) or die(mysqli_error($conn));  
															if($run)  
															{
																				
															echo "<script>window.open(post.php?deleted=user has been deleted','_self')</script>";
																							
																					
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