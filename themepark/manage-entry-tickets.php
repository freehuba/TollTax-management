<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['tpmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_GET['tdel']))
  {
$tid=$_GET['tdel'];
$query=mysqli_query($con,"delete from tblentrytickets where id='$tid'");
    if ($query) {
     echo '<script>alert("Ticket has been deleted")</script>';
echo "<script>window.location.href ='manage-entry-tickets.php'</script>";
  }
  else
    {
      echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }
  }


  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Theme Park Management System || Manage Entry Tickets</title>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<script src="js/jquery.min.js"></script>
<!----webfonts--->
<link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900' rel='stylesheet' type='text/css'>
<!---//webfonts--->  
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
     <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	<h3>Manage Entry Tickets</h3>
 
	<div class="bs-example4" data-example-id="simple-responsive-table">
  
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>S.NO</th>
            
            <th>Booking No</th>
            <th>Name </th>
            <th>Gender</th>
            <th>Address</th>
            <th>Visit Date</th>
            <th>Action</th>
            </tr>
        </thead>
        <tbody>
           <?php
$ret=mysqli_query($con,"select *from  tblentrytickets");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
          <tr>
            <th scope="row"><?php echo $cnt;?></th>
                <td><?php  echo $row['TIcketNumber'];?></td>
                <td><?php  echo $row['Name'];?></td>
                <td><?php  echo $row['Gender'];?></td>
                <td><?php  echo $row['Address'];?></td>
                 <td><?php  echo $row['VisitDate'];?></td>
                  <td><a href="entryticket-details.php?tid=<?php echo $row['id'];?>&&tikcetno=<?php echo $row['TIcketNumber']; ?>">View </a>| <a href="update-entry-ticket.php?tid=<?php echo $row['id'];?>&&tikcetno=<?php echo $row['TIcketNumber']; ?>">Edit </a> | <a href="manage-entry-tickets.php?tdel=<?php echo $row['id'];?>">Delete </a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
          </tr>
  
        </tbody>
      </table>
    </div><!-- /.table-responsive -->
  </div>
  </div>
  <?php include_once('includes/footer.php');?>
   </div>
      </div>
      <!-- /#page-wrapper -->
   </div>
    <!-- /#wrapper -->
<!-- Nav CSS -->
<link href="css/custom.css" rel="stylesheet">
<!-- Metis Menu Plugin JavaScript -->
<script src="js/metisMenu.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>
<?php }  ?>