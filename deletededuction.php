 <?php
		include('include/config.php');
	?> 
<?php  
if(isset($_POST['delete'])){
$delete_id=$_GET['del'];  
$delete_query="delete  from deductions WHERE DID='$delete_id'";//delete query  
$run=mysqli_query($conn,$delete_query);  
if($run)  
{ 
$abc="SELECT SUM(DEDUCTION_AMOUNT) as total FROM deductions where DID !=4";
				$result=mysqli_query($conn,$abc);
				if($result)
				{
				while($row=mysqli_fetch_assoc($result))
				{
				$total=$row["total"];
				
				$sqle = "UPDATE deductions set DEDUCTION_AMOUNT='$total' WHERE DEDUCTION_TYPE='Total'";
				
				if ($conn->query($sqle) === TRUE) {
					
							$sqlte = "UPDATE payroll set TOTAL_DEDUCTIONS='$total',NET_SALARY=GROSS_SALARY-TOTAL_DEDUCTIONS";
							
							if ($conn->query($sqlte) === TRUE) {
								echo "<script>window.open('deduction.php?deleted=user has been deleted','_self')
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