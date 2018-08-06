<?php

require_once 'classes/DB.php';
  $db = new DB();
$ok = '';

if(isset($_POST['booking'])){

   $destination = $_POST['destination']; 
   $location = $_POST['location']; 
   $departure = $_POST['departure']; 
   $arrival = $_POST['arrival']; 
   $flight = $_POST['flight_type']; 
   //$flight_type = $_POST['flight_type']; 

   $db->query('INSERT INTO flights (destination, location, 
   departure, arrival, flight_type) VALUES (:destination,
     :location, :departure, :arrival, :flight)');

     $db->bind(':destination', $destination);
     $db->bind(':location', $location);
     $db->bind(':departure', $departure);
     $db->bind(':arrival', $arrival);
     $db->bind(':flight', $flight);

     if($db->execute()){
         $ok = 'success';
     };

     //check if insertion wwaas successful
    // if($db->lastInsertId()){
    //     echo '<p>record added</p>';
    // }
}

?>
<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Victor Umezuruike">
		
		<title>Norabel Travels</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="css/jquery.datetimepicker.css">
		
		
		<!--jquery ui autocomplete plugin-->
		<!-- jQuery CDN -->
<script src="//code.jquery.com/jquery-1.11.2.js"></script>
	<script src="js/jquery.easy-autocomplete.js"></script> 

<!-- CSS file -->
<link rel="stylesheet" href="css/easy-autocomplete.css">
<link rel="stylesheet" href="css/easy-autocomplete.themes.css"> 

	</head>
	
	<body>
	<div id="hero"><!--houses the background image-->
		<div id="hero-overlay"><!--empty box where you can put content. itswidth = hero width-->
	     <!-- site-navigation start -->  



	<nav class="navbar navbar-new navbar navbar-fixed-top" role="navigation">
		<div class="container-fluid">
        <!-- logo -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <a class="navbar-brand" href="#">
                <img src="images/log.png" alt="logo">
                
            </a>
        </div>
		
		
		
        <!-- menu -->
        <div class="collapse navbar-collapse navbar-right" id="navbar1">
            <ul class="nav navbar-nav">
                <li class=""><a href="index.php">Home</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="about.php">Visa</a></li>
                <li><a href="coaching.php">Tours</a></li>
				<li><a href="workwithus.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid" style="margin-top: 150px;">
    <div class="row">
        <div class="col-md-12">
        <h1 class="header-text">TRAVEL SOLUTIONS </h1> 
             
        <p style="color:red;">
	<?php echo $ok; ?>
	</p> 
        
		</div>
        
        <div class="col-md-12 search-panel">
            
			<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Flight Reservation</a></li>
    <li><a data-toggle="tab" href="#menu1">Hotel Reservation</a></li>
   
          </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
	<div class="reservation-form-container">
      <form class="form-inline" id="flights" method="post" action="index.php">
           
			<div class="form-group">
                <label for="destination" class="sr-only">Destination</label>
				
                <input type="text" id="flying" size="15" name="destination" class="form-control" placeholder="flying to?">
            </div>
			
		
            <div class="form-group">
                <label class="search-label">From</label>
                <select name="location" class="form-control" id="location">
                    <option>Abia</option>
                    <option>lagos</option>
                    <option>lagos</option>
                </select>    
            </div>



             <div class="form-group">
                <label class="sr-only">Departure date</label>
                <input type="text" id="departure" 
				class="form-control" size="15" name="departure" placeholder="departure date">    
            </div>
			<div class="form-group">
                <label class="sr-only">Return date</label>
                <input type="text" id="return" 
				class="form-control" size="15" name="arrival" placeholder="return date">    
            </div>
			
			 <div class="form-group">
                <label class="search-label">Flight type</label>
                <select name="flight_type" style="width:150px" class="form-control" id="flight_type">
                    <option>One way</option>
                    <option>Round trip</option>
                   
                </select>    
            </div>
			
           
            <button type="submit" name="booking" class="btn btn-danger">Book Now</button>
        </form>
		</div>
    </div>
    <div id="menu1" class="tab-pane fade">
      HELLO
	</div>
	
	
  </div>
        
        </div> 

    </div>
    <div class="row">

    </div>    
</div><!--end of container fluid-->

		<!--all contents above are within the hero overlay-->
		</div><!--end of hero overlay-->

	</div><!--end of hero-->
    <!--all contents below are outside the hero-->


	   
 
        <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.datetimepicker.full.js"></script>
    
<script>
		//script for datetimepicker 
		//if you set timepicker to true, you will have a time picker
		//jQuery.datetimepicker.setLocale('de'); use this to set your location
		$('#departure').datetimepicker({
 
		timepicker:false,
		format:'Y.m.d'
		});
		
		$('#return').datetimepicker({
 
		timepicker:false,
		format:'Y.m.d'
		});
		</script>
		<script>
		var options = {
	data: ["Abia", "Anambra", "Akwa-Ibom",
	"America", "Angola",
	"Bauchi", "Bayelsa"],
	theme: "green-light"
};
$("#flying").easyAutocomplete(options);

	</script>
	</body>
</html> 





















<?php
//autoload classes
spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});

  $db = new DB();//create database connection; an object of DB class


if(isset($_POST['booking'])){

 $destination = $_POST['destination'];
 $location = $_POST['location'];
 $departure = $_POST['departure'];
 $arrival = $_POST['arrival'];
 $flight_type = $_POST['flight_type'];

 $sql = "INSERT INTO flights (destination, location, departure, arrival, flight_type) 
 VALUES (?, ?, ?, ?, ?)";

 $query = $db->getDbh()->prepare($sql);
 $query->execute(array($destination, $location, $departure, $arrival, $flight_type));


 echo 'success';
}

?>
<!DOCTYPE html> 
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Victor Umezuruike">
		
		<title>Norabel Travels</title>
		
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" href="css/jquery.datetimepicker.css">
		
		
		<!--jquery ui autocomplete plugin-->
		<!-- jQuery CDN -->
<script src="//code.jquery.com/jquery-1.11.2.js"></script>
	<script src="js/jquery.easy-autocomplete.js"></script> 

<!-- CSS file -->
<link rel="stylesheet" href="css/easy-autocomplete.css">
<link rel="stylesheet" href="css/easy-autocomplete.themes.css"> 

	</head>
	
	<body>
	<div id="hero"><!--houses the background image-->
		<div id="hero-overlay"><!--empty box where you can put content. itswidth = hero width-->
	     <!-- site-navigation start -->  



	<nav class="navbar navbar-new navbar navbar-fixed-top" role="navigation">
		<div class="container-fluid">
        <!-- logo -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
           <a class="navbar-brand" href="#">
                <img src="images/log.png" alt="logo">
                
            </a>
        </div>
		
		
		
        <!-- menu -->
        <div class="collapse navbar-collapse navbar-right" id="navbar1">
            <ul class="nav navbar-nav">
                <li class=""><a href="index.php">Home</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="about.php">Visa</a></li>
                <li><a href="coaching.php">Tours</a></li>
				<li><a href="workwithus.php">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>


<div class="container-fluid" style="margin-top: 150px;">
    <div class="row">
        <div class="col-md-12">
        <h1 class="header-text">TRAVEL SOLUTIONS </h1> 
             
        <p style="color:red;">
	
	</p> 
        
		</div>
        
        <div class="col-md-12 search-panel">
            
			<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Flight Reservation</a></li>
    <li><a data-toggle="tab" href="#menu1">Hotel Reservation</a></li>
   
          </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
	<div class="reservation-form-container">
      <form class="form-inline" id="flights" method="post" action="index.php">
           
			<div class="form-group">
                <label for="destination" class="sr-only">Destination</label>
				
                <input type="text" id="flying" size="15" name="destination" class="form-control" placeholder="flying to?">
            </div>
			
		
            <div class="form-group">
                <label class="search-label">From</label>
                <select name="location" class="form-control" id="location">
                    <option>Abia</option>
                    <option>lagos</option>
                    <option>lagos</option>
                </select>    
            </div>



             <div class="form-group">
                <label class="sr-only">Departure date</label>
                <input type="text" id="departure" 
				class="form-control" size="15" name="departure" placeholder="departure date">    
            </div>
			<div class="form-group">
                <label class="sr-only">Return date</label>
                <input type="text" id="return" 
				class="form-control" size="15" name="arrival" placeholder="return date">    
            </div>
			
			 <div class="form-group">
                <label class="search-label">Flight type</label>
                <select name="flight_type" style="width:150px" class="form-control" id="flight_type">
                    <option>One way</option>
                    <option>Round trip</option>
                   
                </select>    
            </div>
			
           
            <button type="submit" name="booking" class="btn btn-danger">Book Now</button>
        </form>
		</div>
    </div>
    <div id="menu1" class="tab-pane fade">
      HELLO
	</div>
	
	
  </div>
        
        </div> 

    </div>
    <div class="row">

    </div>    
</div><!--end of container fluid-->

		<!--all contents above are within the hero overlay-->
		</div><!--end of hero overlay-->

	</div><!--end of hero-->
    <!--all contents below are outside the hero-->


	   
 
        <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.datetimepicker.full.js"></script>
    
<script>
		//script for datetimepicker 
		//if you set timepicker to true, you will have a time picker
		//jQuery.datetimepicker.setLocale('de'); use this to set your location
		$('#departure').datetimepicker({
 
		timepicker:false,
		format:'Y.m.d'
		});
		
		$('#return').datetimepicker({
 
		timepicker:false,
		format:'Y.m.d'
		});
		</script>
		<script>
		var options = {
	data: ["Abia", "Anambra", "Akwa-Ibom",
	"America", "Angola",
	"Bauchi", "Bayelsa"],
	theme: "green-light"
};
$("#flying").easyAutocomplete(options);

	</script>
	</body>
</html> 





db class using php password_get_info

<?php

class DB {
private $user = 'victor';
private $pass = 'blaze';
private $stmt;
private $dbh;
    
   public function __construct()
   {
   //dbh = database handler
       try{
        $this->dbh = new PDO('mysql:host=localhost;dbname=norabel', $this->user, $this->pass);
          $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           // echo 'connected';
       }catch(PDOException $e){
           
        die('database connection failed');
       }
   }

   
   //return the database handler
   public function getDbh(){
       return $this->dbh;
   }
}