
	<footer>
	<div class="container">
	<div class="row">
	<p id="copyright">&copy 2018 Norabel Travel & Tours. All rights reserved.</p>
	</div>
	
	</div>
	</footer>


	   
   <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.datetimepicker.full.js"></script>
	<!--jquery ui autocomplete plugin-->
		<!-- jQuery CDN -->

	<script src="js/jquery.easy-autocomplete.js"></script> 
	<script src="js/aos.js"></script>
	<script>
	//initialising aos plugin--
	//aos means animate on scroll
	AOS.init();
	</script>
    
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
$("#destination").easyAutocomplete(options);

	</script>
	</body>
</html> 