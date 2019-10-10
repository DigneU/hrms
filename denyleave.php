 <?php
		include('include/config.php');
	?> 
<?php  

$user_id=$_GET['del'];  
$delete_query="delete  from leave_application WHERE USER_ID='$user_id'";//delete query  
$run=mysqli_query($conn,$delete_query);  
if($run)  
{  
//javascript function to open in the same window   
    echo "<script>window.open('pendingleave.php?deleted=user has been deleted','_self')
	</script>";  
}  
  
?>  