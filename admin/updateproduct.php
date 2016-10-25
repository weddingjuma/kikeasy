<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql1 = "SELECT * FROM product";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $sid = $_POST['sup_id'];
  $pid = $_POST['product_id'];
  $name = $_POST['name'];
  $type = $_POST['type'];
  $colors = $_POST['colors'];
  $warranty = $_POST['warranty'];
  $rowid = $_POST['rowid'];

$sql = "UPDATE product SET sup_id='".$sid."', product_id='".$pid."', name='".$name."', type='".$type."', colors='".$colors."', warranty='".$warranty."' WHERE id='".$rowid."'";
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

//Delete Rows
if(isset($_POST['delete'])){
  $rowid = $_POST['rowid'];

  $sqldel = "DELETE FROM product WHERE id='".$rowid."'";
  $resultdel = mysqli_query($dbc, $sqldel);
  if($resultdel){
    $msg = "<div class='alert alert-success'> Delete Product Succsefully.
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
              <h1 class="page-header">Update Product Data</h1>
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
        <form method="post" action="updateproduct.php">

          <div class="form-group">
              <label>Select Product ID</label>
              <select class="select-boxs form-control" onchange="updateprod(this.value)" autocomplete="off" required>
                    <option value="">Select Product ID</option>
                  <?php
                  while ( $row1 = mysqli_fetch_assoc($result1) )
                  {
                  ?>
                    <option value="<?php echo $row1['product_id']; ?>"><?php echo $row1['product_id']; ?></option>
                  <?php
                  }
                  ?>

              </select>
          </div>

          <div id="updateprod"></div>

          <div style="margin-bottom: 30px;">
            <button type='submit' name='submit' class='btn btn-primary'>Save Product Data </button>
            <button type='submit' id="delete" onclick="deleteproduct()" class='btn btn-danger'>Delete Product</button>
          </div>

          </form>
      </div>
    </div>
</div>

</div>

<script>
function deleteproduct() {
var del = confirm("Are You Sure. Delete This Product!");
  if (del == true) {
      document.getElementById('delete').name="delete";
  } else {
      document.getElementById('delete').name="";
  }
}


function updateprod(str) {
    if (str == "") {
        document.getElementById("updateprod").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("updateprod").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","adminajax/upprod.php?prodid="+str,true);
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
