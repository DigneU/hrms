
 <?php
		include('include/config.php');
	?>          
 <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>LEAVE INFROMATION</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">

			  <div class="panel-heading" class="col-lg-12" >
			  <h2><strong>YOUR REMAINING LEAVE DAYS PER TYPE</strong></h2>
			  <div class="col-lg-6">
                <h2><strong>TOTAL LEAVE DAYS PER TYPE</strong></h2>
				
			  <?php
$con  = mysqli_connect("localhost","root","","hrms");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
	 if($_SESSION['gender']=='Female'){
         $sql ="SELECT * FROM leave_types where TYPE_ID !=4";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['LEAVE_TYPE']  ;
            $sales[] = $row['LEAVE_DAYS'];
        }
	 }
	 else{
		$sql ="SELECT * FROM leave_types where TYPE_ID !=4 and LEAVE_TYPE !='Maternity'";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['LEAVE_TYPE']  ;
            $sales[] = $row['LEAVE_DAYS'];
		 }			
	 }
 
 }
 
 
?>
	<div style="width:70%;hieght:5%;text-align:center">
            
            <canvas  id="chartjs_bar"></canvas> 
        </div>    
   
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            backgroundColor: [
							     "#C2E1C0",
                                "#C6D584",
                                "#6F8F6D",
                                "#D0BEF6",
								"#A78394",
                                "#9B9797",
                                "#25d5f2"
                            ],
							
                            data:<?php echo json_encode($sales); ?>,
							
                        }]
                    },
                    options: {
                           legend: {
                        display: true,						
                        position: 'top',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                    },
					
 
 
                }
                });
    </script></div>
	<div class="col-lg-6">
				  <?php
				  
				  if($_SESSION['gender']=="Female"){
						$sql = "SELECT * FROM leave_application WHERE USER_ID='".$_SESSION['user']."' and STATUS='CONFIRMED'"; 
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							echo "<table class='table'>
								<thead>
								 
									<th>LEAVE_TYPE</th>
									<th>REQUESTED_DAYS</th>
									<th>REMAING_DAYS</th>
									
								  
								
								<tbody>";
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									 
									$leave=$row["LEAVE_TYPE"];  
									$requested=$row["REQUESTED_DAYS"];
									$rleave=$row["RLEAVE_DAYS"];
									
									echo "
								  <tr><td>".$leave."</td>
									<td>".$requested."</td>
							<td>".$rleave."</td></tr>";}
							echo "</tbody>
									</table>";
 } else {
							$sql = "SELECT * FROM leave_types where TYPE_ID !=4"; 
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							echo "<table class='table'>
								<thead>
								  <tr>
									<th>LEAVE_TYPE</th>
									<th>REQUESTED_DAYS</th>
									<th>REMAING_DAYS</th>
									
								  </tr>
								</thead>
								<tbody>";
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									 
									$leave=$row["LEAVE_TYPE"];  
									$days=$row["LEAVE_DAYS"];

							
							echo "<tr><td>".$leave."</td>
									<td>0</td>
									<td>".$days."</td></tr>";
									
						}
						$sql = "SELECT * FROM leave_types where TYPE_ID =4"; 
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									 
									$leave=$row["LEAVE_DAYS"];
									echo "<tr><td>TOTAL</td>
									<td></td>
									<td>".$leave."</td></tr>";
						}}
						
						echo "</tbody>
									</table>";
				  }}}
				  else{
							$sql = "SELECT * FROM leave_application WHERE USER_ID='".$_SESSION['user']."' and STATUS='CONFIRMED'"; 
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							echo "<table class='table'>
								<thead>
								 
									<th>LEAVE_TYPE</th>
									<th>REQUESTED_DAYS</th>
									<th>REMAING_DAYS</th>
									
								  
								
								<tbody>";
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									 
									$leave=$row["LEAVE_TYPE"];  
									$requested=$row["REQUESTED_DAYS"];
									$rleave=$row["RLEAVE_DAYS"];
									
									echo "
								  <tr><td>".$leave."</td>
									<td>".$requested."</td>
							<td>".$rleave."</td></tr>";}
							echo "</tbody>
									</table>";
 } else {
							$sql = "SELECT * FROM leave_types where TYPE_ID !=4 and LEAVE_TYPE !='Maternity'"; 
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							echo "<table class='table'>
								<thead>
								  <tr>
									<th>LEAVE_TYPE</th>
									<th>REQUESTED_DAYS</th>
									<th>REMAING_DAYS</th>
									
								  </tr>
								</thead>
								<tbody>";
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									 
									$leave=$row["LEAVE_TYPE"];  
									$days=$row["LEAVE_DAYS"];

							
							echo "<tr><td>".$leave."</td>
									<td>0</td>
									<td>".$days."</td></tr>";
							}
							$abc="SELECT SUM(LEAVE_DAYS) as total FROM leave_types where TYPE_ID !=4 and LEAVE_TYPE !='Maternity'";
							$result=mysqli_query($conn,$abc);
							if($result)
							{
							while($row=mysqli_fetch_assoc($result))
							{
							$days=$row["total"];
							echo "<tr><td>TOTAL</td>
									<td></td>
									<td>".$days."</td></tr>";
						}}
									
						}
						echo "</tbody>
									</table>";
				  }}  
					  
					  
					  
				  
						

				$conn->close(); ?>
              
			  </div>
              </div>
              </div>

            </div>

          </div>
