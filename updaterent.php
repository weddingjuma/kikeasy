<?php

require_once 'db.php';
require_once 'logincheck.php';
require_once 'function.php';

//show notification
$msg ="";

if (isset($_POST['submit'])){
  $card_id = $_POST['card_id'];
  $payment = $_POST['payment'];
  $up_time = $_POST['up_date'];

$sql = "INSERT INTO updaterent (card_id, payment, up_time) VALUES ('".$card_id."', '".$payment."', '".$up_time."')";
$resultAdd = mysqli_query($dbc, $sql);

//show message
  if($resultAdd){

    //update rent status
    $checkRentVal = checkRent($card_id);
    $sql = "UPDATE rent SET status='".$checkRentVal."' WHERE card_id='".$card_id."'";
    mysqli_query($dbc, $sql);

    $msg = "<div class='alert alert-success'> Update New Rent successfully
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
          <div class="col-lg-12" style="color: #1862ab;">
              <h1 class="page-header">Update Rent</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add stock start form -->
                <div class="form-group">
                    <label>Card Id</label>
                    <input type="text" class="form-control" onchange="ajaxRent(this.value)" autocomplete="off" required>
                </div>
      </div>

      <form method="post" action="updaterent.php">

      <div id="return_data"></div>

      <div class='form-group col-lg-6'>
          <label>Payment Date</label>
          <input type='text' class='form-control' id='date' name='up_date' autocomplete="off" required>
      </div>
      <div class='form-group col-lg-6'>
          <label>Amount</label>
          <input type='text' class='form-control' name='payment' autocomplete="off" required>
      </div>

      <div class='row col-lg-12' style='padding-left: 28px; margin-bottom: 30px;'>
      <button type='submit' name='submit' class='btn btn-primary'>Update Rent</button>
      </div>
    </form>

    </div>
</div>

</div>

<script>
function ajaxRent(str) {
    if (str == "") {
        document.getElementById("return_data").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("return_data").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","ajax/ajaxrent.php?cardid="+str,true);
        xmlhttp.send();
    }
}

$('#date').datepicker({
    format: 'yyyy-mm-dd'
})
</script>
<!-- footer -->
<?php include 'footer.php'; ?>
