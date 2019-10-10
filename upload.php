 <?php
		include('include/config.php');
	?> 
<?php

    if(isset($_POST['upload']))
        {
$delete_id=$_GET['del'];
$fileinfo=PATHINFO($_FILES["picture"]["name"]);
	$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
	move_uploaded_file($_FILES["picture"]["tmp_name"],"upload/" . $newFilename);
	$location="upload/" . $newFilename;


// Attempt insert query execution

 $sql="UPDATE user_registration SET PROFILE_PICTURE='$location' WHERE USERNAME = $delete_id";

if ($conn->query($sql) === TRUE) {
										 
																		
															echo "<script>window.open('Admin_profile.php?deleted=user has been deleted','_self')</script>";
																							
																					
															} else {
																					echo "Error: " . $sql . "<br>" . $conn->error;
																				}
		}


    ?>