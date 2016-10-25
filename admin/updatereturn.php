<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql1 = "SELECT * FROM `return`";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $r_id = $_POST['r_id'];
  $s_type = $_POST['s_type'];
  $n_id = $_POST['n_id'];
  $rsid = $_POST['rsid'];
  $rpid = $_POST['rpid'];
  $route = $_POST['route'];
  $c_number = $_POST['c_number'];
  $note = $_POST['note'];
  $rowid = $_POST['rowid'];

$sql = "UPDATE `return` SET return_id='".$r_id."', sale_type='".$s_type."', cusnid='".$n_id."', rent_sale_id='".$rsid."', rproductid='".$rpid."', route='".$route."', contact_num='".$c_number."', note='".$note."' WHERE id='".$rowid."'";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> Upadate Return Data Save Succsefully.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
    } else {
    $msg = "<div class='alert alert-danger'> unsuccessfully . Try agin.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
  }
}

//Delete Rows
if(isset($_POST['delete'])){
  $rowid = $_POST['rowid'];

  $sqldel = "DELETE FROM `return` WHERE id='".$rowid."'";
  $resultdel = mysqli_query($dbc, $sqldel);
  if($resultdel){
    $msg = "<div class='alert alert-success'> Delete Return Succsefully.
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
              <h1 class="page-header">Update Return Data</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="row">
      <div class='alert alert-danger'> Make sure And check again change data are correct before save. OR dont change Product ID, Natonal ID, Card ID, Return ID after make sale or rent.
      <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>
      </div>

      <div class="col-md-8">
      <!-- add customer start form -->
        <form method="post" action="updatereturn.php">

          <div class="form-group">
              <label>Select Return ID</label>
              <select class="select-boxs form-control" onchange="updatereturn(this.value)" autocomplete="off" required>
                    <option value="">Select Return ID</option>
                  <?php
                  while ( $row1 = mysqli_fetch_assoc($result1) )
                  {
                  ?>
                    <option value="<?php echo $row1['return_id']; ?>"><?php echo $row1['return_id']; ?></option>
                  <?php
                  }
                  ?>

              </select>
          </div>

          <div id="updatereturn"></div>

          <div style="margin-bottom: 30px;">
            <button type='submit' name='submit' class='btn btn-primary'>Save Return Data </button>
            <button type='submit' id="delete" onclick="deletereturn()" class='btn btn-danger'>Delete Return</button>
          </div>

          </form>
      </div>
    </div>
</div>

</div>

<script>
function deletereturn() {
var del = confirm("Are You Sure. Delete This Return!");
  if (del == true) {
      document.getElementById('delete').name="delete";
  } else {
      document.getElementById('delete').name="";
  }
}


function updatereturn(str) {
    if (str == "") {
        document.getElementById("updatereturn").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("updatereturn").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","adminajax/upreturn.php?returnid="+str,true);
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
