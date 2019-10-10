 <?php
		include('include/config.php');
	?> 
<?php  

$delete_id=$_GET['del'];  
$delete_query="delete  from user_registration WHERE USER_ID='$delete_id'";//delete query  
$run=mysqli_query($conn,$delete_query);  
if($run)  
{  
//javascript function to open in the same window   
    echo "<script>window.open('registeredusers.php?deleted=user has been deleted','_self')
	</script>";  
}  
  
?>  