<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

if(isset($_POST["submit"])) {
  $supId = $_POST['supId'];
  $supName = $_POST['supName'];
  $supAddress = $_POST['supAddress'];
  $supNumber = $_POST['supNumber'];
  $supEmail = $_POST['supEmail'];
  $supNote = $_POST['supNote'];

$sql = "INSERT INTO supplier (sup_id, sup_name, sup_address, sup_number, 	sup_email, sup_note) VALUES ('".$supId."', '".$supName."', '".$supAddress."', '".$supNumber."', '".$supEmail."', '".$supNote."')";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> New Supplier added successfully.
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
              <h1 class="page-header">Add Supplier</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add product start form -->
        <form method="post" action="addsupplier.php" data-toggle="validator">
              <div class="form-group">
                  <label>Supplier ID</label>
                  <input class="form-control" pattern="^[_A-z0-9]{1,}$" maxlength="10" name="supId" onchange="checkSId(this.value)"  autocomplete="off" placeholder="ex: 123abcABCD" required>
              </div>

              <div id="sidresult"></div>

              <div class="form-group">
                  <label>Supplier Name / Company Name</label>
                  <input class="form-control" name="supName" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Supplier Address</label>
                  <input class="form-control" name="supAddress" autocomplete="off" required>
              </div>
              <div class="form-group">
                  <label>Supplier Contact Numbers</label>
                  <input class="form-control" name="supNumber" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Supplier Email</label>
                  <input class="form-control" name="supEmail" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Supplier Note</label>
                  <input class="form-control" name="supNote" autocomplete="off">
              </div>
              <div style="margin-bottom : 30px;">
              <button type="submit" name="submit" class="btn btn-primary">Save Supplier</button>
              </div>
        </form>
      </div>
    </div>
</div>

</div>

<script>
// check product id already exssits
       function checkSId(str) {
           if (str == "") {
               document.getElementById("sidresult").innerHTML = "";
               return;
           } else {
               if (window.XMLHttpRequest) {
                   // code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp = new XMLHttpRequest();
               }
               xmlhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("sidresult").innerHTML = this.responseText;
                   }
               };
              //  console.log(str);
               xmlhttp.open("GET","ajax/checkdata.php?fid=supid&sid="+str,true);
               xmlhttp.send();
           }
       }

</script>
<!-- footer -->
<?php include 'footer.php'; ?>
