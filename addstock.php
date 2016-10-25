<?php
require_once 'db.php';
require_once 'logincheck.php';

//show notification
$msg ="";

$sql = "SELECT * FROM product";
$result = mysqli_query($dbc, $sql);

if(isset($_POST['submit'])){
  $productId = $_POST['productId'];
  $stockPrice = $_POST['stockPrice'];
  $wholesalePrice = $_POST['wholesalePrice'];
  $salePrice = $_POST['salePrice'];
  $qty = $_POST['qty'];

  $sqlAdd = "INSERT INTO stock (product_id, stock_price, whole_price, sale_price, quantity) VALUES ";
  $sqlAdd .="('".$productId."', '".$stockPrice."', '".$wholesalePrice."', '".$salePrice."', '".$qty."')";
  $resultAdd = mysqli_query($dbc, $sqlAdd);

  //show message
    if($resultAdd){
      $msg = "<div class='alert alert-success'> New Stock added Successfully.
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
  <div class="container-fluid" style="margin-bottom: 30px;">

      <div class="row">
          <div class="col-lg-12">
              <h1 class="page-header">Add Stock</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add stock start form -->
        <form method="post" action="addstock.php">
                <div class="form-group">
                    <label>Select Product Id</label>
                    <select name="productId" onchange="showProduct(this.value)" class="select-boxs form-control" required>
                          <option value="">Select Product Id</option>
                        <?php
                        while ( $row = mysqli_fetch_assoc($result) )
                        {
                        ?>
                          <option value="<?php echo $row['product_id']; ?>"><?php echo $row['product_id']; ?></option>
                        <?php
                        }
                        ?>

                    </select>

                    <!-- Show select product details -->
                    <div id="productHint"></div>
                </div>

                <div class="form-group">
                    <label>Stock Price</label>
                    <input type="number" class="form-control" name="stockPrice" required>
                </div>

                <div class="form-group">
                    <label> Wholesale Price </label>
                    <input type="number" class="form-control" name="wholesalePrice" required>
                </div>

                <div class="form-group">
                    <label>Sell Price</label>
                    <input type="number" class="form-control" name="salePrice" required>
                </div>

                <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" class="form-control" name="qty" required>
                </div>

              <button type="submit" name="submit" class="btn btn-primary">Add New Stock</button>
        </form>
      </div>
    </div>
</div>

</div>


<!-- ajax using get product detials to stock page -->
<script>
function showProduct(str) {
    if (str == "") {
        document.getElementById("productHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productHint").innerHTML = this.responseText;
            }
        };
        console.log(str);
        xmlhttp.open("GET","ajax/getstocktoproduct.php?productId="+str,true);
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
