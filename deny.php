 <?php
		include('include/config.php');
	?> 
<?php  

$delete_id=$_GET['del'];  
$delete_query="delete  from create_account WHERE USER_ID='$delete_id'";//delete query  
$run=mysqli_query($conn,$delete_query);  
if($run)  
{  
//javascript function to open in the same window   
    echo "<script>window.open('pendingusers.php?deleted=user has been deleted','_self')
	</script>";  
}  
  
?>  