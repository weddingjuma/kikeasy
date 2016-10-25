<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql1 = "SELECT * FROM supplier";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $supId = $_POST['supId'];
  $supName = $_POST['supName'];
  $supAddress = $_POST['supAddress'];
  $supNumber = $_POST['supNumber'];
  $supEmail = $_POST['supEmail'];
  $supNote = $_POST['supNote'];
  $rowid = $_POST['rowid'];

$sql = "UPDATE supplier SET sup_id='".$supId."', sup_name='".$supName."', sup_address='".$supAddress."', sup_number='".$supNumber."', sup_email='".$supEmail."', sup_note='".$supNote."' WHERE id='".$rowid."'";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> Upadate Supplier Data Save Succsefully.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
    } else {
    $msg = "<div class='alert alert-danger'> unsuccessfully . Try agin.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
  }
}

//Delete Rows
if(isset($_POST['delete'])){
  $rowid = $_POST['rowid'];

  $sqldel = "DELETE FROM supplier WHERE id='".$rowid."'";
  $resultdel = mysqli_query($dbc, $sqldel);
  if($resultdel){
    $msg = "<div class='alert alert-success'> Delete Supplier Succsefully.
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
              <h1 class="page-header">Update Supplier Data</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="row">
      <div class='alert alert-danger'> Make sure And check again change data are correct before save. OR dont change Product ID, Supplier ID after make sale or rent.
      <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>
      </div>

      <div class="col-md-8">
      <!-- add customer start form -->
        <form method="post" action="updatesup.php">

          <div class="form-group">
              <label>Select Supplier ID</label>
              <select class="select-boxs form-control" onchange="updatesup(this.value)" autocomplete="off" required>
                    <option value="">Select Supplier ID</option>
                  <?php
                  while ( $row1 = mysqli_fetch_assoc($result1) )
                  {
                  ?>
                    <option value="<?php echo $row1['sup_id']; ?>"><?php echo $row1['sup_id']; ?></option>
                  <?php
                  }
                  ?>

              </select>
          </div>

          <div id="updatesup"></div>

          <div style="margin-bottom: 30px;">
          <button type='submit' name='submit' class='btn btn-primary'>Save Supplier Data </button>
          <button type='submit' id="delete" onclick="deletesup()" class='btn btn-danger'>Delete Supplier</button>
          </div>

          </form>
      </div>
    </div>
</div>

</div>

<script>
function deletesup() {
var del = confirm("Are You Sure. Delete This Supplier!");
  if (del == true) {
      document.getElementById('delete').name="delete";
  } else {
      document.getElementById('delete').name="";
  }
}


function updatesup(str) {
    if (str == "") {
        document.getElementById("updatesup").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("updatesup").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","adminajax/upsup.php?supid="+str,true);
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
