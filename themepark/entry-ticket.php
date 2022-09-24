<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['tpmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Theme Park Management System || Entry Ticket</title>
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
	   <div class="xs" id="print">

  <span style="float:left" ><i class="fa fa-print fa-2x" aria-hidden="true" OnClick="CallPrint(this.value)" style="cursor:pointer" title="Print the Report"></i></span> 
  	<h3 align="center">#<?php echo $_SESSION['ticketno'];?> Details</h3>
 
	<div class="bs-example4" data-example-id="simple-responsive-table">
  
    <div class="table-responsive">
      <table class="table table-bordered"  border="1" width="100%">
        <tbody>
           <?php
$ticketno= $_SESSION['ticketno'];           
$ret=mysqli_query($con,"select *from  tblentrytickets where TIcketNumber='$ticketno'");
while ($row=mysqli_fetch_array($ret)) {

?>
               <tr>
 <th>Booking No</th>
                <td><?php  echo $row['TIcketNumber'];?></td>
                 <th>Ticket Type</th>
                <td colspan="2">Entry Ticket</td>
              </tr>
              <th>Name </th>
                <td><?php  echo $row['Name'];?></td>
                <th>Gender</th>
                <td colspan="2"><?php  echo $row['Gender'];?></td>
                <tr>
                     <th>Address</th>
                <td><?php  echo $row['Address'];?></td>
                  <th>Visit Date</th>
                  <td colspan="2"><?php  echo $row['VisitDate'];?></td>
                </tr>
                  <th colspan="5" style="text-align:center; color:blue; font-size:18px;"> Ticket Details</th>
                </tr>
                <tr>
                  <th>#</th>
                  <th></th>
                  <th>No Ticket</th>
                  <th>Price / Ticket</th>
                  <th>Total</th>
                </tr>
                
                <tr>
                  <th>1</th>
                  <th>No of Male</th>
                  <td><?php  echo $nm=$row['NoOfMale'];?></td>
                    <td><?php  echo $mtp=$row['MaleTicketPrice'];?></td>
                      <td><?php  echo $gtm=$nm*$mtp;?></td>
                </tr>
                   <tr>
                  <th>2</th>
                  <th>No of Female</th>
                  <td><?php  echo $nf=$row['NoOfFemale'];?></td>
                    <td><?php  echo $ftp=$row['FemaleTicketPrice'];?></td>
                      <td><?php  echo $gtf=$nf*$ftp;?></td>
                </tr>
                   <tr>
                  <th>3</th>
                  <th>No of Childrens / Kids</th>
                  <td><?php  echo $row['NoOfMale'];?></td>
                    <td></td>
                      <td></td>
                </tr>

                   <tr>
                  <th>4</th>
                  <th>Kids above ticket compulsory</th>
                  <td><?php  echo $nkds=$row['NoOfKidsForTicket'];?></td>
                    <td><?php  echo $kidstp=$row['KidsTicketPrice'];?></td>
                      <td><?php  echo $gtk=$nkds*$kidstp;?></td>
                </tr>
                <tr>
                  <th style="text-align:center" colspan="4"> Grand Total</th>
                  <th><?php echo number_format($gtm+$gtf+$gtk,2);?></th>
                </tr>
                <?php 
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
  <script>

    $(function () {

        $("[data-toggle=tooltip]").tooltip();

    });
function CallPrint(strid) {
var prtContent = document.getElementById("print");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}

</script>
</body>
</html>
<?php }  ?>