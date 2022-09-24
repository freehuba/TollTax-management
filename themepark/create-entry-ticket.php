<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['tpmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {
    $bookno = mt_rand(100000000, 999999999);
    $fname=$_POST['fname'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    $noofmale=$_POST['noofmale'];
    $mtprice=$_POST['mtprice'];
    $nooffemale=$_POST['nooffemale'];
    $ftprice=$_POST['ftprice'];
    $noofkids=$_POST['noofkids'];
    $noofkidticket=$_POST['noofkidticket'];
    $kidtprice=$_POST['kidtprice'];
     $_SESSION['ticketno']=$bookno;
 
   
       $query=mysqli_query($con, "insert into  tblentrytickets(TIcketNumber,Name,Gender,Address,NoOfMale,MaleTicketPrice,NoOfFemale,FemaleTicketPrice,NoOfKids,NoOfKidsForTicket,KidsTicketPrice) value('$bookno','$fname','$gender','$address','$noofmale','$mtprice','$nooffemale','$ftprice','$noofkids','$noofkidticket','$kidtprice')");
    if ($query) {
     echo '<script>alert("New Ticket has been generated. Tikcet numbe is  "+"'.$bookno.'")</script>';
echo "<script>window.location.href ='entry-ticket.php'</script>";
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
<title>Park Theme Management System || Add Entry Ticket</title>

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
     <!-- Navigation -->
        <?php include_once('includes/sidebar.php');?>
        <?php include_once('includes/header.php');?>
        <div id="page-wrapper">
        <div class="col-md-12 graphs">
	   <div class="xs">
  	    <h3>Entry Ticket</h3>
  	    <div class="well1 white">
        <form class="form-floating ng-pristine ng-invalid ng-invalid-required ng-valid-email ng-valid-url ng-valid-pattern" method="post">

          <fieldset>
            
   
            <div class="form-group">
              <label class="control-label"> Name</label>
              <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="fname" name="fname" >
            </div>
            <div class="form-group">
              <label class="control-label">Gender</label>
            <input type="radio" name="gender" value="Male" checked="true">Male <input type="radio" name="gender" value="Female">Female <input type="radio" name="gender" value="Other">Other
            </div>
       
            <div class="form-group">
              <label class="control-label">Address</label>
              <textarea class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="address" name="address" required="true" cols="10"></textarea>
            </div>

     <?php
$ret=mysqli_query($con,"select * from tblprice where id='1'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>         
         <table class="table table-bordered">
    
          <tr>
            <th>No. of Male</th>
            <td> <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="noofmale" name="noofmale" ></td>
            <td>  <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  readonly id="catname" name="mtprice" value="<?php  echo $row['MaleTIcket'];?>">/Male</td>
          </tr>
          <tr>
            <th>No. of Female</th>
            <td><input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="nooffemale" name="nooffemale" ></td>
            <td>    <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  id="catname" name="ftprice" value="<?php  echo $row['FemaleTIcket'];?>" readonly>/Female</td>
            </tr>

            <tr>
            <th>No. of Children/Kids</th>
            <td><input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="noofkids" name="noofkids" ></td>
            <td></td>
          </tr>
          <tr>
            <th>Kids above ticket complulsory</th>
            <td><input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  required="true" id="noofkidticket" name="noofkidticket" ></td>
            <td> <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched"  readonly id="catname" name="kidtprice" value="<?php  echo $row['KidsTicket'];?>">/Kid</td>
            </tr>
          <?php } ?>
   
      </table>

            <div class="form-group">
             <p style="text-align: center;"> <button type="submit" name="submit" class="btn btn-primary">Add</button></p>
             
            </div>
          </fieldset>
        </form>
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
<?php } ?>