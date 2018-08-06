<?php
//autoload classes
spl_autoload_register(function($class) {
	require_once 'classes/' . $class . '.php';
});

$dbcrud = new CRUD(); //from CRUD class


if(isset($_POST['booking'])){
  
          $inputArray = array(
		'fullname' => $_POST['fullname'],
		'phone' => $_POST['phone'],
            'destination' => $_POST['destination'],
            'mystate' => $_POST['mystate'],
            'departure' => $_POST['departure'],
            'arrival' => $_POST['arrival'],
            'flight_type' => $_POST['flight_type']
        );
		
		if(!empty($_POST['fullname']) && 
	!empty($_POST['phone']) &&
	!empty($_POST['destination']) &&
	!empty($_POST['mystate']) && !empty($_POST['departure']) && 
	!empty($_POST['arrival']) && !empty($_POST['flight_type'])){
		
			$dbcrud->insert("flights", $inputArray);
			?>
           <script>
           alert('your booking was successful, we will be in touch shortly');
           </script>
           <?php
    }else{
		?>
         <script>
           alert('please fill the form correctly');
           </script>
        <?php
	}

           
}

?>
<?php include "includes/header.php";?>
<section>
	<div id="hero"><!--houses the background image-->
		<div id="hero-overlay"><!--empty box where you can put content. itswidth = hero width-->
	     

<div class="container-fluid" style="margin-top: 150px;">
    <div class="row">
        <div class="col-md-12">
        <h1 class="header-text">Your one stop travel solution company</h1> 
             
      
        
		</div>
        
        <div class="col-md-12 search-panel">
            
			<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home"><span><i class="fas fa-plane"></i></span> Flight Reservation</a></li>
   
          </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
	<div class="reservation-form-container">
      <form class="form-inline" id="flights" method="post" action="index.php">
           
		   <div class="form-group">
                <label for="fullname" class="sr-only">Fullname</label>
				
                <input type="text" id="fullname" size="12" name="fullname" class="form-control" placeholder="full name">
           
            </div>
			<div class="form-group">
                <label for="phone" class="sr-only">Phone</label>
				
                <input type="text" id="phone" size="12" name="phone" class="form-control" placeholder="phone number">
            
            </div>
		   
			<div class="form-group">
                <label for="destination" class="sr-only">Destination</label>
				
                <input type="text" id="destination" size="12" name="destination" class="form-control" placeholder="flying to?">
            </div>
			
		
            <div class="form-group">
                <label class="search-label">From</label>
                <select name="mystate" class="form-control" id="mystate">
                  
                <option>ABIA</option>
				 <option>ABUJA</option>
                <option>ADAMAWA</option>
                <option>AKWA IBOM</option>
                <option>ANAMBRA</option>
                <option>BAUCHI</option>
                <option>BAYELSA</option>
                <option>BENUE</option>
                <option>BORNO</option>
                <option>CROSS RIVER</option>
                <option>DELTA</option>
                <option>EBONYI</option>
                <option>EDO</option>
                <option>EKITI</option>
                <option>ENUGU</option>
                <option>GOMBE</option>
                <option>IMO</option>
                <option>JIGAWA</option>
                <option>KADUNA</option>
                <option>KANO</option>
                <option>KATSINA</option>
                <option>KEBBI</option>
                <option>KOGI</option>
                <option>KWARA</option>
                <option>LAGOS</option>
                <option>NASSARAWA</option>
                <option>NIGER</option>
                <option>OGUN</option>
                <option>ONDO</option>
                <option>OSUN</option>
                <option>OYO</option>
                <option>PLATEAU</option>
                <option>RIVERS</option>
                <option>SOKOTO</option>
                <option>TARABA</option>
                <option>YOBE</option>
                <option>ZAMFARA</option>
                <option>ABROAD</option>
                </select>    
            </div>



             <div class="form-group">
                <label class="sr-only">Departure date</label>
                <input type="text" id="departure" 
				class="form-control" size="12" name="departure" placeholder="departure date">    
            </div>
			<div class="form-group">
                <label class="sr-only">Return date</label>
                <input type="text" id="return" 
				class="form-control" size="10" name="arrival" placeholder="return date">    
            </div>
			
			 <div class="form-group">
                <label class="sr-only">type</label>
                <select name="flight_type" style="width:120px" class="form-control" id="flight_type">
                    <option>One way</option>
                    <option>Round trip</option>
                   
                </select>    
            </div>
			
           
            <button type="submit" name="booking" class="btn btn-warning" onclick="checkInput();">Book Now</button>
        </form>
		</div>
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
	</section>
	
	
	<section id="ourdestinations">
	
	<div class="container">
	<h1 class="dest-title">Popular Destinations</h1>
	<div class="row">
	
	<div class="col-md-6 clol-lg-6" data-aos="fade-right" data-aos-duration="900" data-aos-once="true">
    <img src="images/uk2.jpg" class="services-img">
    <h1 class="item-header">London</h1>
	</div>
	
	<div class="col-md-6 clol-lg-6" data-aos="fade-left" data-aos-duration="1100" data-aos-once="true">
    <img src="images/france.jpg" class="services-img">
    <h1 class="item-header">France</h1>
	</div>
	
	</div>
	</div>
	
	</section>
	
	<section id="ourdestinations2">
	<div class="container">
	<div class="row">
	
	<div class="col-md-6 clol-lg-6" data-aos="flip-left" data-aos-duration="600" data-aos-once="true">
    <img src="images/us.jpg" class="services-img">
    <h1 class="item-header">New York</h1>
	</div>
	
	<div class="col-md-6 clol-lg-6" data-aos="flip-left" data-aos-duration="600" data-aos-once="true" data-aos-delay="300">
    <img src="images/spain2.jpg" class="services-img">
    <h1 class="item-header">Spain</h1>
	</div>
	
	
	</div>
	</div>
	
	</section>
	
	<section id="ourdestinations3">
	<div class="container">
	<div class="row">
	
	<div class="col-md-6 clol-lg-6" data-aos="fade-up" data-aos-duration="600" data-aos-once="true">
    <img src="images/dubai7.jpg" class="services-img">
    <h1 class="item-header">Dubai</h1>
	</div>
	
	<div class="col-md-6 clol-lg-6" data-aos="fade-down" data-aos-duration="600" data-aos-once="true" data-aos-delay="300">
    <img src="images/turkey3.jpg" class="services-img">
    <h1 class="item-header">Turkey</h1>
	</div>
	
	
	</div>
	</div>
	
	</section>
	
    <?php
    include 'includes/footer.php';
    ?>