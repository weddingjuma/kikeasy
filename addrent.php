<?php
require_once 'db.php';
require_once 'logincheck.php';
require_once 'function.php';

if(isset($_GET['nid']) && isset($_GET['name'])){
  $nid = $_GET['nid'];
  $name = $_GET['name'];
} else {
  $nid="";
  $name="";
}

//show notification
$msg ="";

$sql1 = "SELECT * FROM stock";
$result1 = mysqli_query($dbc, $sql1);
$result2 = mysqli_query($dbc, $sql1);
$result3 = mysqli_query($dbc, $sql1);


if(isset($_POST["submit"])) {
  $cardId = $_POST['cardId'];
  $nId = $_POST['nId'];
  $name = $_POST['name'];
  $productId1 = $_POST['productId1'];
  $productId2 = $_POST['productId2'];
  $productId3 = $_POST['productId3'];
  $advance = $_POST['advance'];
  $rentTotal = $_POST['rentTotal'];
  $status = 1; //pending
  $rentDate = $_POST['rentDate'];
  $route = $_POST['route'];
  $referee = $_POST['referee'];

$products = ($productId1 ." " .$productId2 ." " .$productId3);

$sql = "INSERT INTO rent (card_id, n_id, name, product_id, r_total, advance, status, rent_date, route, referee) VALUES ";
$sql .= "('".$cardId."', '".$nId."', '".$name."', '".$products."', '".$rentTotal."', '".$advance."', '".$status."', '".$rentDate."', '".$route."', '".$referee."')";
$result = mysqli_query($dbc, $sql);

//show message
  if($result){

    changeStock($productId1 , 1);
    changeStock($productId2 , 1);
    changeStock($productId3 , 1);

    $msg = "<div class='alert alert-success'> New Rent Added Successfully.
    <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";

  } else {
    $msg = "<div class='alert alert-danger'> Unsuccessfully. Try agin.
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
              <h1 class="page-header">Add Rent</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">
      <!-- add product start form -->
        <form method="post" action="addrent.php" data-toggle="validator">
              <div class="form-group">
                  <label>Card Id</label>
                  <input class="form-control" name="cardId" pattern="^[_A-z0-9]{1,}$" maxlength="10" onchange="checkCardId(this.value)" required>
              </div>

              <div id="cardidresult"> </div>

              <div class="form-group">
                  <label>National ID</label>
                  <input class="form-control" name="nId" value="<?php echo $nid; ?>" readonly="readonly">
              </div>
              <div class="form-group">
                  <label>Name</label>
                  <input class="form-control" name="name" value="<?php echo $name; ?>" readonly="readonly">
              </div>

              <div class="form-group" style="padding-bottom: 10px;">
                  <label>Select Product Id</label>
                  <select name="productId1" id="select-boxs" onchange="showProduct1(this.value)" class="select-boxs form-control" required>
                        <option value="">None</option>
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
              <!-- Show select product details -->
              <div id="productHint1"></div>


<div style="display:block; margin-left:670px; margin-top: -43px;">
<a id="hidden1show" onclick="productshowhide()" class="btn btn-default" > + Products </a>
</div>

              <div id="hidden1" style="display:none;">

                <div class="row" style="margin-top: 5px; margin-bottom: 20px; border-bottom: 1px solid #666;"> </div>

              <div class="form-group">
                  <label>Select Product ID 2 : </label>
                  <select name="productId2" id="select-boxs" onchange="showProduct2(this.value)" class="select-boxs form-control">
                        <option value="">None</option>
                      <?php
                      while ( $row2 = mysqli_fetch_assoc($result2) )
                      {
                      ?>
                        <option value="<?php echo $row2['product_id']; ?>"><?php echo $row2['product_id']; ?></option>
                      <?php
                      }
                      ?>

                  </select>

              </div>
              <!-- Show select product details -->
              <div id="productHint2"></div>



              <div class="form-group">
                  <label>Select Product ID 3 : </label>
                  <select name="productId3" id="select-boxs" onchange="showProduct3(this.value)" class="select-boxs form-control">
                        <option value="">None</option>
                      <?php
                      while ( $row3 = mysqli_fetch_assoc($result3) )
                      {
                      ?>
                        <option value="<?php echo $row3['product_id']; ?>"><?php echo $row3['product_id']; ?></option>
                      <?php
                      }
                      ?>

                  </select>

              </div>
              <!-- Show select product details -->
              <div id="productHint3"></div>

      <div class="row" style="margin-top: 5px; margin-bottom: 20px; border-bottom: 1px solid #666;"> </div>

            </div>

              <div class="form-group">
                  <label>Total</label>
                  <input class="form-control" id="renttotal" name="rentTotal" autocomplete="off">
              </div>
              <div class="form-group">
                  <label>Advance</label>
                  <input class="form-control" name="advance" autocomplete="off" required>
              </div>
              <div id="productHint"></div>
              <div class="form-group">
                  <label>Date</label>
                  <input class="form-control" id="date" autocomplete="off" name="rentDate">
              </div>
              <div class="form-group">
                  <label>Route</label>
                  <input class="form-control" autocomplete="off" name="route">
              </div>
              <div class="form-group">
                  <label>Referee</label>
                  <input class="form-control" autocomplete="off" name="referee">
              </div>
              <div style="margin-bottom: 30px;">
              <button type="submit" id="submitbtn" name="submit" class="btn btn-primary">Add New Rent</button>
              </div>
        </form>
      </div>
    </div>
</div>

</div>

<script>
function showProduct1(str) {
   if (str == "") {
       document.getElementById("productHint1").innerHTML = "";
       var num1 = '0';
       var num2 = '0';
       var num3 = '0';
       sum(num1, num2, num3);
       showProduct2(str);
       return;
   } else {
       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("productHint1").innerHTML = this.responseText;
               var num1 = document.getElementById('rentprice1').value;
               var num2 = '0';
               var num3 = '0';
               sum(num1, num2, num3);
           }
       };
      //  console.log(str);
       xmlhttp.open("GET","ajax/getrentprice.php?code=code1&pid1="+str,true);
       xmlhttp.send();
   }
}

function showProduct2(str) {
   if (str == "") {
       document.getElementById("productHint2").innerHTML = "";
       var num1 = document.getElementById('rentprice1').value;
       var num2 = '0';
       var num3 = '0';
       sum(num1, num2, num3);
       showProduct3(str);
       return;
   } else {
       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("productHint2").innerHTML = this.responseText;
               var num1 = document.getElementById('rentprice1').value;
               var num2 = document.getElementById('rentprice2').value;
               var num3 = '0';
               sum(num1, num2, num3);
           }
       };
      //  console.log(str);
       xmlhttp.open("GET","ajax/getrentprice.php?code=code2&pid2="+str,true);
       xmlhttp.send();
   }
}

function showProduct3(str) {
   if (str == "") {
       document.getElementById("productHint3").innerHTML = "";
       var num1 = document.getElementById('rentprice1').value;
       var num2 = document.getElementById('rentprice2').value;
       var num3 = '0';
       sum(num1, num2, num3);
       return;
   } else {
       if (window.XMLHttpRequest) {
           // code for IE7+, Firefox, Chrome, Opera, Safari
           xmlhttp = new XMLHttpRequest();
       }
       xmlhttp.onreadystatechange = function() {
           if (this.readyState == 4 && this.status == 200) {
               document.getElementById("productHint3").innerHTML = this.responseText;
               var num1 = document.getElementById('rentprice1').value;
               var num2 = document.getElementById('rentprice2').value;
               var num3 = document.getElementById('rentprice3').value;
               sum(num1, num2, num3);
           }
       };
      //  console.log(str);
       xmlhttp.open("GET","ajax/getrentprice.php?code=code3&pid3="+str,true);
       xmlhttp.send();
   }
}


// check card id already exssits
       function checkCardId(str) {
           if (str == "") {
               document.getElementById("cardidresult").innerHTML = "";
               return;
           } else {
               if (window.XMLHttpRequest) {
                   // code for IE7+, Firefox, Chrome, Opera, Safari
                   xmlhttp = new XMLHttpRequest();
               }
               xmlhttp.onreadystatechange = function() {
                   if (this.readyState == 4 && this.status == 200) {
                       document.getElementById("cardidresult").innerHTML = this.responseText;
                   }
               };
              //  console.log(str);
               xmlhttp.open("GET","ajax/checkdata.php?fid=cardid&cid="+str,true);
               xmlhttp.send();
           }
       }

 $('#date').datepicker({
     format: 'yyyy-mm-dd'
 });

 // Select box
 $(document).ready(function() {
   $(".select-boxs").select2();
 });

//show rent total value
function sum(num1,num2,num3) {

  var add = +num1 + +num2 + +num3;

document.getElementById('renttotal').value = add +'.00';
}

//show hide other add product divs
function productshowhide(){
$( "#hidden1" ).toggle();
showProduct2();
}
</script>

<!-- footer -->
<?php include 'footer.php'; ?>
