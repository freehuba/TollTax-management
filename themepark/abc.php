<?php
include('includes/dbconnection.php');
$rid=$_POST['rideid'];
if($rid=='Normal Ride'){?>
<?php
$ret=mysqli_query($con,"select * from tblprice where id='2'");
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
      <?php } else {?>
      	<?php
$ret=mysqli_query($con,"select * from tblprice where id='3'");
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
      <?php } ?>