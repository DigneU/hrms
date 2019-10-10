<?php
		include('include/config.php');
	?>
<?php 




$sql = "SELECT * FROM user_logs";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							// output data of each row
							while($row = $result->fetch_assoc()) {
								//echo "<br> id: ". $row["id"]. " - Name: ". $row["firstname"]. " " . $row["lastname"] . "<br>";
									$username=$row["USERNAME"];  
									$login=$row["LOGIN_TIME"];  
									$logout=$row["LOGOUT_TIME"];  }}
  
wh_log("  User : '". $username);
wh_log("   ;Start Log For Day : '" . $login . "';");
wh_log("   END Log For Day : '" . $logout . "'");

 
function wh_log($username)
{
    $log_filename = "log";
    if (!file_exists($log_filename)) 
    {
        // create directory/folder uploads.
        mkdir($log_filename, 0777, true);
    }
    $log_file_data = $log_filename.'/log_' . date('d-M-Y') . '.log';
    file_put_contents($log_file_data, $username . "\n", FILE_APPEND);
						}
?>