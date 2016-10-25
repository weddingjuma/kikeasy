<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql1 = "SELECT * FROM stock";
$result1 = mysqli_query($dbc, $sql1);

if(isset($_POST["submit"])) {
  $product_id = $_POST['product_id'];
  $stock_price = $_POST['stock_price'];
  $sale_price = $_POST['sale_price'];
  $rowid = $_POST['rowid'];

$sql = "UPDATE stock SET product_id='".$product_id."', stock_price='".$stock_price."', sale_price='".$sale_price."' WHERE id='".$rowid."'";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){
    $msg = "<div class='alert alert-success'> Upadate Stock Data Save Succsefully.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
    } else {
    $msg = "<div class='alert alert-danger'> unsuccessfully . Try agin.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";
  }
}

//Delete Rows
if(isset($_POST['delete'])){
  $rowid = $_POST['rowid'];

  $sqldel = "DELETE FROM stock WHERE id='".$rowid."'";
  $resultdel = mysqli_query($dbc, $sqldel);
  if($resultdel){
    $msg = "<div class='alert alert-success'> Delete Stock Succsefully.
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
              <h1 class="page-header">Update Stock Data</h1>
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
        <form method="post" action="updatestock.php">

          <div class="form-group">
              <label>Select Product Id</label>
              <select class="select-boxs form-control" onchange="updatestock(this.value)" autocomplete="off" required>
                    <option value="">Select Product Id</option>
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

          <div id="updatestock"></div>

          <div style="margin-bottom: 30px;">
            <button type='submit' name='submit' class='btn btn-primary'>Save Stock Data </button>
            <button type='submit' id="delete" onclick="deletestock()" class='btn btn-danger'>Delete Stock</button>
          </div>

          </form>
      </div>
    </div>
</div>

</div>

<script>
function deletestock() {
var del = confirm("Are You Sure. Delete This Stock!");
  if (del == true) {
      document.getElementById('delete').name="delete";
  } else {
      document.getElementById('delete').name="";
  }
}

function updatestock(str) {
    if (str == "") {
        document.getElementById("updatestock").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("updatestock").innerHTML = this.responseText;
            }
        };
        // console.log(str);
        xmlhttp.open("GET","adminajax/upstock.php?pid="+str,true);
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
