<style>


/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 0px;
 
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {

  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}



/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

</style> 
 
 <?php
		include('include/config.php');
	?>          
 <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>CANCELLED LEAVES</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <table class="table bootstrap-datatable countries" border="1">
                  <thead>
                    <tr>
                      <th class="info-box brown-bg">SN</th>
                      <th class="info-box brown-bg">USER_ID</th>
                      <th class="info-box brown-bg">LEAVE_TYPE</th>
                      <th class="info-box brown-bg">APP_DATE</th>
                      <th class="info-box brown-bg">LEAVE_DATE</th>
                      <th class="info-box brown-bg">REASON</th>
                      <th class="info-box brown-bg">REQUESTED_DAYS</th>
                      <th class="info-box brown-bg">TOTAL_DAYS</th>
                      <th class="info-box brown-bg">REMAINING_DAYS</th>
                      <th class="info-box brown-bg">ACTION</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
						$sql = "SELECT * FROM leave_application WHERE USER_ID='".$_SESSION['user']."' and STATUS='CANCELLED'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									$leave_id=$row["LEAVE_ID"];  
									$user_id=$row["USER_ID"];  
									$leave=$row["LEAVE_TYPE"];  
									$date=$row["DATE"];  
									$leave_date=$row["LEAVE_DATE"];  
									$reason=$row["REASON"];
									$requested_days=$row["REQUESTED_DAYS"];
									$total_days=$row["TOTAL_DAYS"];
									$remaing_days=$row["REMAINING_DAYS"];
						?>			
						 
						  

						<!--here showing results in the table -->  
						<td><?php echo $leave_id;  ?></td>
						<td><?php echo $user_id;  ?></td>
						<td><?php echo $leave?></td> 
						<td><?php echo $date ?></td> 
						<td><?php echo $leave_date ?></td> 
						<td><?php echo $reason ?></td> 
						<td><?php echo $requested_days ?></td> 
						<td><?php echo $total_days ?></td> 
						<td><?php echo $remaing_days ?></td>
						
						
						<td><button type="submit" class="btn" style="background-color:red;color:white;"> <strong style="font-size:20px">&#10006 </strong> </button></td>
						
					
					 
                    </tr>
					<?php }} else {
    echo "0 results";
}

$conn->close(); ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
