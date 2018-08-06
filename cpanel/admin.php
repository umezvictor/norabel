<?php
session_start();
if(!isset($_SESSION['user'])){
  header("location:../login.php");
 }
//spl_autoload_register(function($class) {
	require_once '../classes/CRUD.php';
//});

$dbcrud = new CRUD(); //from CRUD class
?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Norabel Admin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Norabel Admin</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
     
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/avatar2.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="font-size:10px;"><?php echo 'Welcome ' . $_SESSION['user'];?></span></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <a href="../logout.php" class="btn btn-danger btn-xs">Logout</a>
        </div>
      </div>

     

      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="font-size:13px; font-weight:bold; color:red;">Flight Bookings</h1>
      
    </section>



    <!-- Main content -->
    <section class="content container-fluid">

<div class="table-responsive">
						
                                                            
<table id="clients" class="table table-striped">
<thead>
<tr style="color: #008000;">
<th>ID</th>
<th>Full name</th>
<th>Phone</th>
<th>Destination</th>
<th>Location</th>
<th>Departure date</th>
<th>Return date</th>
<th>flight type</th>
<th>Delete</th>

</tr>
</thead>

<tbody>
    
<?php
//$row is a variable refernced from fetch_records method in CRUD class
//i declared $myarray = $row in fetch_records.php
$data = $dbcrud->fetch_records("flights");
foreach($data as $row){
?>

<tr> 
<td><?php echo $row['id']; ?></td> 
<td><?php echo $row['fullname']; ?></td>
 <td><?php echo $row['phone']; ?></td>
 <td><?php echo $row['destination']; ?></td> 
<td><?php echo $row['mystate']; ?></td>
<td><?php echo $row['departure']; ?></td>
<td><?php echo $row['arrival']; ?></td>
<td><?php echo $row['flight_type']; ?></td>


<td><button name="delete" id="<?php echo $row['id']; ?>" class="btn btn-danger btn-xs delete">Delete</button></td>
		   

</td>
</tr>
    
<?php 
 }
 ?>
    
</tbody>
</table>		
	
</div> <!-- end of table  responsive -->

   <!-- update form for flights Modal -->
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span style="color: red;"><i class="fa fa-times-circle-o" aria-hidden="true"></i></span></button>
        <h4  style="color:#ff0000;">Edit record</h4>
        <div id="updateStatus"></div>
      </div>
     
      <div class="modal-body">
   
<form id="updateForm" method="post"  role="form">
 
<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
<input type="text" id="fullname" name="fullname" class="form-control"  required>                                        
</div>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
<input type="text"  name="phone" id="phone" class="form-control"  required>                                        
</div>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="fa fa-plane" aria-hidden="true"></i></span>
<input type="text"  name="destination" id="destination" class="form-control"  required>                                        
</div>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="fa map-marker" aria-hidden="true"></i></span>
<input type="text"  name="mystate" id="mystate" class="form-control"  required>                                        
</div>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="fa fa-clock" aria-hidden="true"></i></span>
<input type="text" name="departure" id="departure" class="form-control"  required>                                        
</div>

<div style="margin-bottom: 25px" class="input-group">
<span class="input-group-addon"><i class="fa fa-clock" aria-hidden="true"></i></span>
<input type="text" name="arrival" id="arrival" class="form-control"  required>                                        
</div>

<div class="form-group">
   <div class="input-group">
      <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
      <select name="flight_type" id="flight_type" class="form-control">
                
                <option>One way</option>
                <option>Round trip</option>
                
      </select>
</div>
</div>

<input type="hidden" name="passenger_id" id="passenger_id">
 
<button type="button" name="insert" id="insert" class="btn btn-success">Update</button>


	</form>

      </div>
     
    </div>

  </div><!--end of modal dialog-->
</div><!--end of modal-->
 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018 <a href="#">Norabel Travels & Tours Services</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Need help</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function(){

  	//datatables plugin

  $('#clients').dataTable({
    "ordering": false
  });
 



//delete a record
 $(document).on('click', '.delete', function(){
  //attention victor
     var myid = $(this).attr("id");
    
    //authorises deletion only when ok option is selected from the confirm box
    if(confirm("are you sure you want to delete this record?") == true){
      $.ajax({
         url:"../classes/deletePassenger.php",
         method:"POST",
         data:{myid:myid},
         dataType:"text",
        success: function(){
            location.reload();//refreshes the page automatically to reflect changes
        }
     });
    }

    


 });



});
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>