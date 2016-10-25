<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql1 = "SELECT * FROM customer";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $n_id = $_POST['n_id'];
  $name = $_POST['name'];
  $address = $_POST['address'];
  $p_number = $_POST['p_number'];
  $rowid = $_POST['rowid'];

$sql = "UPDATE customer SET n_id='".$n_id."', name='".$name."', address='".$address."', p_number='".$p_number."' WHERE id='".$rowid."'";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> Upadate custermer data save succsefully.
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
              <h1 class="page-header">Update Customer Data</h1>
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
        <form method="post" action="updatecus.php">

          <div class="form-group">
              <label>Select Customer Id</label>
              <select class="select-boxs form-control"  onchange="updatecus(this.value)" autocomplete="off" required>
                    <option value="">Select Product Id</option>
                  <?php
                  while ( $row1 = mysqli_fetch_assoc($result1) )
                  {
                  ?>
                    <option value="<?php echo $row1['n_id']; ?>"><?php echo $row1['n_id']; ?></option>
                  <?php
                  }
                  ?>

              </select>
          </div>

          <div id="updatecus"></div>

          <button type='submit' name='submit' class='btn btn-primary'>Save Customer Data </button>

          </form>
      </div>
    </div>
</div>

</div>

<script>
function updatecus(str) {
    if (str == "") {
        document.getElementById("updatecus").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("updatecus").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","adminajax/upcus.php?cusnid="+str,true);
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
