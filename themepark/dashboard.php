<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['tpmsaid']==0)) {
  header('location:logout.php');
  } 
     ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Theme Park Management System || Dashboard</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/lines.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
<!-- Graph JavaScript -->
<script src="js/d3.v3.js"></script>
<script src="js/rickshaw.js"></script>
</head>
<body>
<div id="wrapper">
     <!-- Navigation -->
        
            <?php include_once('includes/sidebar.php');?>
            <!-- /.navbar-static-side -->
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="graphs">
     	<div class="col_3">
        	<div class="col-md-4 widget widget1">
        		<div class="r3_counter_box">
              <?php $query1=mysqli_query($con,"Select * from  tblentrytickets");
$totalentryticket=mysqli_num_rows($query1);
?>
                    <i class="pull-left fa fa-users icon-rounded"></i>
                    <div class="stats">
                      <h5><strong> <?php echo $totalentryticket;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-entry-tickets.php">Total Entry Tickets</a></span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-4 widget widget1">
        		<div class="r3_counter_box">
              <?php $query=mysqli_query($con,"Select * from  tblridetickets where RideType='Normal Ride'");
$totalnormarride=mysqli_num_rows($query);
?>
                    <i class="pull-left fa fa-thumbs-up user1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $totalnormarride;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-ride-tickets.php">Total Normal Ride Tickets</a></span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
              <?php $query3=mysqli_query($con,"Select * from  tblridetickets where RideType='water Ride'");
$totalwaterride=mysqli_num_rows($query3);
?>
                    <i class="pull-left fa fa-tint icon-rounded"></i>
                    <div class="stats">
                      <h5><strong><?php echo $totalwaterride;?></strong></h5>
                      <span><a class="dropdown-item" href="manage-ride-tickets.php">Total Water Ride Tickets</a></span>
                    </div>
                </div>
        	</div>
     
        	<div class="clearfix"> </div>
      </div>
    

		<?php include_once('includes/footer.php');?>
		</div>
       </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>
