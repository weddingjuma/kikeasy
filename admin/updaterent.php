<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql1 = "SELECT * FROM rent";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $card_id = $_POST['card_id'];
  $n_id = $_POST['n_id'];
  $product_id = $_POST['product_id'];
  $r_total = $_POST['r_total'];
  $advance = $_POST['advance'];
  $route = $_POST['route'];
  $referee = $_POST['referee'];
  $rowid = $_POST['rowid'];

$sql = "UPDATE rent SET card_id='".$card_id."', n_id='".$n_id."', product_id='".$product_id."', r_total='".$r_total."', advance='".$advance."', route='".$route."', referee='".$referee."' WHERE id='".$rowid."'";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> Upadate Rent Data Save Succsefully.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
    } else {
    $msg = "<div class='alert alert-danger'> unsuccessfully . Try agin.
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
              <h1 class="page-header">Update Rent Optional Data</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="row">
      <div class='alert alert-danger'> Make sure And check again change data are correct before save. OR dont change Product ID, Natonal ID, Card ID after make sale or rent.
      <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>
      </div>

      <div class="col-md-8">
      <!-- add customer start form -->
        <form method="post" action="updaterent.php">

          <div class="form-group">
              <label>Select Card Id</label>
              <select class="select-boxs form-control" onchange="updaterent(this.value)" autocomplete="off" required>
                    <option value="">Select Card Id</option>
                  <?php
                  while ( $row1 = mysqli_fetch_assoc($result1) )
                  {
                  ?>
                    <option value="<?php echo $row1['card_id']; ?>"><?php echo $row1['card_id']; ?></option>
                  <?php
                  }
                  ?>

              </select>
          </div>

          <div id="updaterent"></div>

          <div style="margin-bottom: 30px;">
          <button type='submit' name='submit' class='btn btn-primary'>Save Rent Data </button>
          </div>

          </form>
      </div>
    </div>
</div>

</div>

<script>
function updaterent(str) {
    if (str == "") {
        document.getElementById("updaterent").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("updaterent").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","adminajax/uprent.php?cardid="+str,true);
        xmlhttp.send();
    }
}

// Select box
$(document).ready(function() {
  $(".select-boxs").select2();
});

</script>
<!-- footer -->
<?php include 'footer.php'; ?>
