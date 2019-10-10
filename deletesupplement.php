 <?php
		include('include/config.php');
	?> 
<?php  
if(isset($_POST['delete'])){
$delete_id=$_GET['del'];  
$delete_query="delete  from supplements WHERE SUPPLEMENTS_ID='$delete_id'";//delete query  
$run=mysqli_query($conn,$delete_query);  
if($run)  
{ 
$abc="SELECT SUM(SUPPLEMENTS_AMOUNT) as total FROM supplements where SUPPLEMENTS_NAME !='Total'";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				$total=$row["total"];
				
				$sqle = "UPDATE supplements set SUPPLEMENTS_AMOUNT='$total' WHERE SUPPLEMENTS_NAME='Total'";
				
				if ($conn->query($sqle) === TRUE) {
					
							$sqlte = "UPDATE payroll set TOTAL_SUPPLEMENTS='$total',NET_SALARY=GROSS_SALARY-TOTAL_DEDUCTIONS+TOTAL_SUPPLEMENTS";
							
							if ($conn->query($sqlte) === TRUE) {
								echo "<script>window.open('sumplements.php?deleted=user has been deleted','_self')
															</script>";
						
				}
				else{
						echo "ERROR: Could not able to execute $sqlte. " . mysqli_error($conn);
					}
				} else{
						echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
					}
}} 
//javascript function to open in the same window      
}
}  
  
?>  