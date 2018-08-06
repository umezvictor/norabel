<?php
//autoload classes
spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});

$dbcrud = new CRUD(); //from CRUD class
$error = "";

if(isset($_POST['submit'])){
   
        $destination = $_POST['destination'];
        $location = $_POST['location'];
        $departure = $_POST['departure'];
        $arrival = $_POST['arrival'];
        $flight_type = $_POST['flight_type'];
    

   
        $inputArray = array(
            'destination' => $destination,
            'location' => $location,
            'departure' => $departure,
            'arrival' => $arrival,
            'flight_type' => $flight_type
        );

        $dbcrud->insert("flights", $inputArray);
            
}

?>