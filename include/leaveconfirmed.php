 
 <?php
		include('include/config.php');
	?>          
 <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>CONFIRMED LEAVES</strong></h2>
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
                      <th style="background-color: #3C7792;color: white;">SN</th>
                      <th style="background-color: #3C7792;color: white;">USER_ID</th>
                      <th style="background-color: #3C7792;color: white;">LEAVE_TYPE</th>
                      <th style="background-color: #3C7792;color: white;">APPL_DATE</th>
                      <th style="background-color: #3C7792;color: white;">LEAVE_DATE</th>
                      <th style="background-color: #3C7792;color: white;">REASON</th>
                      <th style="background-color: #3C7792;color: white;">REQUESTED_DAYS</th>
                      <th style="background-color: #3C7792;color: white;">TOTAL_DAYS</th>
                      <th style="background-color: #3C7792;color: white;">REMAINING_DAYS</th>
                      <th style="background-color: #3C7792;color: white;">ACTION</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
						$sql = "SELECT * FROM leave_application WHERE USER_ID='".$_SESSION['user']."' and STATUS='CONFIRMED'";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									$leave_id=$row["LEAVE_ID"];  
									$user_id=$row["USER_ID"];  
									$leave=$row["LEAVE_TYPE"];  
									$application_date=$row["DATE"];  
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
						<td><?php echo $application_date ?></td> 
						<td><?php echo $leave_date ?></td> 
						<td><?php echo $reason ?></td> 
						<td><?php echo $requested_days ?></td> 
						<td><?php echo $total_days ?></td> 
						<td><?php echo $remaing_days ?></td> 
						<td><button onclick="document.getElementById('id02').style.display='block'"type="submit" class="btn" style="background-color:red;color:white;">CANCEL</button></td>
						<div id="id02" class="modal">
  
						  <div style="width:50%;" class="modal-content animate">
							<div class="imgcontainer">
							  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><br>
								<center><h3 class="heading3">MESSAGE</h3>
								<form action="cl.php?del=<?php echo $leave_id ?>" method="post">
									<label>TITLE</label><br>
									<input type="text" name="title"  style="width:50%" required><br><br>
									<label>DESCRIPTION</label><br>
									<textarea style="width:50%" name="message" required></textarea>
                                                  
                                                <br><br>
									<button type="submit" class="btn btn-primary" name="assign">SEND</button><br><br>	
								</form></center> 
                    </tr>
					<?php 
						}}else {
    echo "0 results";
}

$conn->close(); ?>
                  </tbody>
                </table>
              </div>

            </div>

          </div>
