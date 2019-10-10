registeredusers.php: 

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
		include_once('include/config.php');
	?>          
 <div class="col-lg-12 col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h2><i class="fa fa-flag-o red"></i><strong>Registered Users</strong></h2>
                <div class="panel-actions">
                  <a href="index.html#" class="btn-setting"><i class="fa fa-rotate-right"></i></a>
                  <a href="index.html#" class="btn-minimize"><i class="fa fa-chevron-up"></i></a>
                  <a href="index.html#" class="btn-close"><i class="fa fa-times"></i></a>
                </div>
              </div>
              <div class="panel-body">
                <table border="1"class="table bootstrap-datatable countries">
                  <thead>
                    <tr>
                      <th  style="background-color: #152E48;color: white;">SN</th>
                      <th  style="background-color: #152E48;color: white;">NAMES</th>
                      <th  style="background-color: #152E48;color: white;">GENDER</th>
                      <th  style="background-color: #152E48;color: white;">NATIONAL_ID</th>
                      <th  style="background-color: #152E48;color: white;">PHONE_NUMBER</th>
                      <th  style="background-color: #152E48;color: white;">POSITION</th>
                      <th  style="background-color: #152E48;color: white;">DEPARTMENT</th>
                      <th  style="background-color: #152E48;color: white;">USER_TYPE</th>
                      <th  style="background-color: #152E48;color: white;">USERNAME</th>
                      <th  style="background-color: #152E48;color: white;">ACTION</th>
                      <th  style="background-color: #152E48;color: white;">PAY</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <?php
					  include_once('allregistereduserss.php');

			$user = new allregistereduserss();
        $sql = "SELECT * FROM user_registration ORDER BY USER_ID ASC";
        $row = $user->details($sql);
        
					  
						?>			

						<td><?php echo $row['USER_ID'];  ?></td>
						<td><?php echo $row['FIRST_NAME']." ".$row['LAST_NAME'];  ?></td>
						<td><?php echo $row['GENDER'];  ?></td>
						<td><?php echo $row['NATIONAL_ID'];  ?></td>
						<td><?php echo $row['PHONE_NUMBER'];  ?></td> 
						<td><?php echo $row['POSITION'];  ?></td> 
						<td><?php echo $row['DEPARTMENT'];  ?></td> 
						<td><?php echo $row['USER_TYPE'];  ?></td> 
						<td><?php echo $row['USERNAME'];  ?></td> 
						<td><a onclick='javascript:confirmationDelete($(this));return false;' href="delete.php?del=<?php echo $row['USER_ID']; ?>"><button class="btn" style="background-color:red;color:white;"><i class="fa fa-trash-o" style="font-size:20px;"></i></button></a></td>
			<td><button onclick="document.getElementById('id02').style.display='block'" type="submit" class="btn" style="background-color: green;color:white;">PAY</button></td>
												<div id="id02" class="modal">
						  
												  <div style="width:50%;" class="modal-content animate">
													<div class="imgcontainer">
													  <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span><br>
														<center><h3 class="heading3">TIME PAID</h3>
														<form action="pay.php?del=<?php echo $row['USER_ID']; ?>" method="post">
															<label>SELECT DATE</label><br>
															<input type="date" name="date"  style="width:50%" required><br><br>
															
															<button type="submit" class="btn btn-primary" name="assign">PAY</button><br><br>	
														</form></center>
						
						<script>
						function confirmationDelete(anchor)
{
   var conf = confirm('Are you sure want to delete this record?');
   if(conf)
      window.location=anchor.attr("href");
}
						</script>
                    </tr>
					
                  </tbody>
                </table>
              </div>

            </div>

          </div>




allregistereduserss.php:

<?php
include_once('config.php');
					  class allregistereduserss extends config{

		public function details($sql){
        $query = $this->conn->query($sql);
							while($row = $query->fetch_assoc()) {
        return $row;       
		}}
					  }
					  
						?>	

config.php:

<?php
class config{
 private $servername = "localhost";
 private $username = "root";
 private $password = "";
 private $dbname = "hrms";
 
protected $conn;
    
    public function __construct(){

        if (!isset($this->conn)) {
            
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            
            if (!$this->conn) {
                echo 'Cannot connect to database server';
                exit;
            }            
        }    
        
        return $this->conn;
    }
}
?>
						