<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql1 = "SELECT * FROM deliver";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $d_id = $_POST['d_id'];
  $v_number = $_POST['v_number'];
  $vo_name = $_POST['vo_name'];
  $p_number = $_POST['p_number'];
  $v_route = $_POST['v_route'];
  $rowid = $_POST['rowid'];

$sql = "UPDATE deliver SET deliver_id='".$d_id."', vehicle_num='".$v_number."', vo_name='".$vo_name."', p_number='".$p_number."', v_route='".$v_route."' WHERE id='".$rowid."'";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> Upadate Deliver Data Save Succsefully.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
    } else {
    $msg = "<div class='alert alert-danger'> unsuccessfully . Try agin.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
  }
}

//Delete Rows
if(isset($_POST['delete'])){
  $rowid = $_POST['rowid'];

  $sqldel = "DELETE FROM deliver WHERE id='".$rowid."'";
  $resultdel = mysqli_query($dbc, $sqldel);
  if($resultdel){
    $msg = "<div class='alert alert-success'> Delete Deliver Succsefully.
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
              <h1 class="page-header">Update Deliver Vehical Data</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="row">
      <div class='alert alert-danger'> Make sure And check again change data are correct before save. OR dont change Product ID, Natonal ID, Card ID, Deliver ID after make sale or rent.
      <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>
      </div>

      <div class="col-md-8">
      <!-- add customer start form -->
        <form method="post" action="updatedeliver.php">

          <div class="form-group">
              <label>Select Deliver ID</label>
              <select class="select-boxs form-control" onchange="updatedeliver(this.value)" autocomplete="off" required>
                    <option value="">Select Deliver ID</option>
                  <?php
                  while ( $row1 = mysqli_fetch_assoc($result1) )
                  {
                  ?>
                    <option value="<?php echo $row1['deliver_id']; ?>"><?php echo $row1['deliver_id']; ?></option>
                  <?php
                  }
                  ?>

              </select>
          </div>

          <div id="updatedeliver"></div>

          <div style="margin-bottom: 30px;">
            <button type='submit' name='submit' class='btn btn-primary'>Save Deliver Data </button>
            <button type='submit' id="delete" onclick="deletedeliver()" class='btn btn-danger'>Delete Deliver</button>
          </div>

          </form>
      </div>
    </div>
</div>

</div>

<script>
function deletedeliver() {
var del = confirm("Are You Sure. Delete This Deliver!");
  if (del == true) {
      document.getElementById('delete').name="delete";
  } else {
      document.getElementById('delete').name="";
  }
}


function updatedeliver(str) {
    if (str == "") {
        document.getElementById("updatedeliver").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("updatedeliver").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","adminajax/updeliver.php?deliverid="+str,true);
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
