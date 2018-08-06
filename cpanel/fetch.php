<?php

   
   
    $host     = "localhost";
    $username = "victor";
    $password = "blaze";
    $database = "norabel";
    
    $con = mysqli_connect($host, $username, $password, $database);
    if(mysqli_connect_errno()){
       echo "database connection failed" . mysqli_error($data);
    }
	
	
	if(isset($_POST["passenger_id"])){
		$id = $_POST["passenger_id"];
		$query = "SELECT * FROM flights WHERE id = '$id'";
		$result = mysqli_query($query);
		$row = mysqli_fetch_array($result);
		//send data to ajax in json format
		
		echo json_encode($row);
		
	}
?>