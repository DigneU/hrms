 <?php
		include('include/config.php');
	?> 
<?php  
if(isset($_POST['assign'])){
$delete_id=$_GET['del'];
$title=$_POST['title'];
$message=$_POST['message'];

$sql = "SELECT * FROM leave_application where LEAVE_ID='$delete_id' and STATUS='CONFIRMED'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
						// output data of each row
						while($row = $result->fetch_assoc()) {
							//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
								$leave_id=$row["LEAVE_ID"];  
								$user_id=$row["USER_ID"];  
								$leave_type=$row["LEAVE_TYPE"];  
								$reason=$row["REASON"];


								$sql= "INSERT INTO cancelled_leave (LEAVE_ID,USER_ID,LEAVE_TYPE,REASON,TITLE,DESCRIPTION,USER_TYPE,STATUS)
																	VALUES ('$leave_id','$user_id', '$leave_type', '$reason', '$title','$message','Admin','CANCELLED')";
																			if ($conn->query($sql) === TRUE) {
																				$delete_query="UPDATE leave_application SET STATUS='CANCELLED' WHERE LEAVE_ID = $delete_id"; 

																					if ($conn->query($delete_query) === TRUE) {
																		 
																										
																							echo "<script>window.open('pendingleave.php?deleted=user has been deleted','_self')</script>";
																															
																													
																							} else {
																													echo "Error: " . $delete_query . "<br>" . $conn->error;
																												}

					}else{echo "Error: " . $sql . "<br>" . $conn->error;}}}
}

?>  