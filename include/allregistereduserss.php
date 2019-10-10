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