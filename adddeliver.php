<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

if(isset($_POST["submit"])) {
  $deliver_id = $_POST['deliver_id'];
  $vehicle_num = $_POST['vehicle_num'];
  $vo_name = $_POST['vo_name'];
  $p_number = $_POST['p_number'];
  $v_route = $_POST['v_route'];

$sql = "INSERT INTO deliver (deliver_id, vehicle_num, vo_name, p_number, v_route) VALUES ('".$deliver_id."', '".$vehicle_num."', '".$vo_name."', '".$p_number."', '".$v_route."')";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> New Deliver Vehicle Added Successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
  } else {
    $msg = "<div class='alert alert-danger'> unsuccessfully . Try agin
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
  }
}
?>

<!-- header -->
<?php include 'header.php'; ?>

<div id="wrapper">

<!-- Navigation -->
<?php include 'navigation.php'; ?>

<!-- Page Content -->
<div id="page-wrapper">
  <div class="container-fluid">

      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Add Deliver Vehicle Details</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add product start form -->
        <form method="post" action="adddeliver.php" data-toggle="validator">
              <div class="form-group">
                  <label>Deliver ID</label>
                  <input class="form-control" name="deliver_id" onchange="checkDId(this.value)" pattern="^[_A-z0-9]{1,}$" maxlength="10" autocomplete="off" required>
              </div>

              <div id="didresult"></div>

              <div class="form-group">
                  <label>Vehicle Number</label>
                  <input class="form-control" name="vehicle_num" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Vehicle Driver / Owner Name</label>
                  <input class="form-control" name="vo_name" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Phone Number</label>
                  <input class="form-control" name="p_number" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Vehicle Route</label>
                  <input class="form-control" name="v_route" autocomplete="off">
              </div>
              <button type="submit" name="submit" class="btn btn-primary">Add New Deliver Details</button>
        </form>
      </div>
    </div>
</div>

</div>

<script>
// check product id already exssits
       function checkDId(str) {
           if (str == "") {
               document.getElementById("didresult").innerHTML = "";
               return;
           } else {
               if (window.XMLHttpRequest) {
                   // code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp = new XMLHttpRequest();
               }
               xmlhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("didresult").innerHTML = this.responseText;
                   }
               };
              //  console.log(str);
               xmlhttp.open("GET","ajax/checkdata.php?fid=dilid&did="+str,true);
               xmlhttp.send();
           }
       }

</script>

<!-- footer -->
<?php include 'footer.php'; ?>
