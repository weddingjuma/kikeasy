<?php

require_once 'db.php';
require_once 'logincheck.php';
require_once 'function.php';

//show notification
$msg ="";
//get sale id
$sale_id = countId();

$sql = "SELECT * FROM stock";
$result1 = mysqli_query($dbc, $sql);
$result2 = mysqli_query($dbc, $sql);
$result3 = mysqli_query($dbc, $sql);
$result4 = mysqli_query($dbc, $sql);
$result5 = mysqli_query($dbc, $sql);

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $n_id = $_POST['n_id'];
  $address = $_POST['address'];
  $p_number = $_POST['p_number'];
  $productId1 = $_POST['productId1'];
  $productId2 = $_POST['productId2'];
  $productId3 = $_POST['productId3'];
  $productId4 = $_POST['productId4'];
  $productId5 = $_POST['productId5'];

  $qty1 = $_POST['qty1'];
  $qty2 = $_POST['qty2'];
  $qty3 = $_POST['qty3'];
  $qty4 = $_POST['qty4'];
  $qty5 = $_POST['qty5'];

  $tot_price1 = $_POST['tot_price1'];
  $tot_price2 = $_POST['tot_price2'];
  $tot_price3 = $_POST['tot_price3'];
  $tot_price4 = $_POST['tot_price4'];
  $tot_price5 = $_POST['tot_price5'];

  $pname1 = $_POST['pname1'];
  $pname2 = $_POST['pname2'];
  $pname3 = $_POST['pname3'];
  $pname4 = $_POST['pname4'];
  $pname5 = $_POST['pname5'];

  $psalep1 = $_POST['psalep1'];
  $psalep2 = $_POST['psalep2'];
  $psalep3 = $_POST['psalep3'];
  $psalep4 = $_POST['psalep4'];
  $psalep5 = $_POST['psalep5'];

  $total = $_POST['total'];
  $discount = $_POST['discount'];
  $bil_total = $_POST['bil_total'];


    if(strlen($productId1) > 0 ){
      $sqlAdd1 = "INSERT INTO sale (sale_id, n_id, name, address, p_number, total, discount, bill_total, sale_date) VALUES ";
      $sqlAdd1 .="('".$sale_id."', '".$n_id."', '".$name."', '".$address."', '".$p_number."', '".$total."', '".$discount."', '".$bil_total."', NOW())";
      $resultAdd1 = mysqli_query($dbc, $sqlAdd1);

      $sqlP1 = "INSERT INTO sale_more (sale_id, productId, salepname, salepprice, qty, tot_price) VALUES ('".$sale_id."', '".$productId1."', '".$pname1."', '".$psalep1."', '".$qty1."', '".$tot_price1."')";
      $resultP1 = mysqli_query($dbc, $sqlP1);
      //add bill reduce total stock
      changeStock($productId1 , $qty1);
      // $msg = "<div class='alert alert-success'> New sale added successfully
      // <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";

      header('Location: savesale.php?sid='.$sale_id);

        if (strlen($productId2) > 0) {
          $sqlP2 = "INSERT INTO sale_more (sale_id, productId, salepname, salepprice, qty, tot_price) VALUES ('".$sale_id."', '".$productId2."', '".$pname2."', '".$psalep2."','".$qty2."', '".$tot_price2."')";
          mysqli_query($dbc, $sqlP2);
          changeStock($productId2 , $qty2);

          header('Location: savesale.php?sid='.$sale_id);

          if (strlen($productId3) > 0) {
            $sqlP3 = "INSERT INTO sale_more (sale_id, productId, salepname, salepprice, qty, tot_price) VALUES ('".$sale_id."', '".$productId3."', '".$pname3."', '".$psalep3."','".$qty3."', '".$tot_price3."')";
            mysqli_query($dbc, $sqlP3);
            changeStock($productId3 , $qty3);

            header('Location: savesale.php?sid='.$sale_id);

              if (strlen($productId4) > 0) {
                $sqlP4 = "INSERT INTO sale_more (sale_id, productId, salepname, salepprice, qty, tot_price) VALUES ('".$sale_id."', '".$productId4."', '".$pname4."', '".$psalep4."','".$qty4."', '".$tot_price4."')";
                mysqli_query($dbc, $sqlP4);
                changeStock($productId4 , $qty4);

                header('Location: savesale.php?sid='.$sale_id);

                if (strlen($productId5) > 0) {
                  $sqlP5 = "INSERT INTO sale_more (sale_id, productId, salepname, salepprice, qty, tot_price) VALUES ('".$sale_id."', '".$productId5."', '".$pname5."', '".$psalep5."','".$qty5."', '".$tot_price5."')";
                  mysqli_query($dbc, $sqlP5);
                  changeStock($productId5 , $qty5);

                  header('Location: savesale.php?sid='.$sale_id);

                }
            }
          }

        }

    }  else {
      $msg = "Sale Not Added. Try Again.";
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
              <h1 class="page-header">New Bill</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-lg-12">
      <!-- add stock start form -->
        <form method="post" action="addsale.php" data-toggle="validator">
              <div class="row">
                <div class="col-lg-4 form-group">
                    <label>Sale Id</label>
                    <input type="text" class="form-control" value="<?php echo $sale_id; ?>" disabled>
                </div>
              </div>
                <div class="col-lg-6 form-group">
                    <label>National ID Card</label>
                    <input type="text" class="form-control" autocomplete="off" name="n_id">
                </div>
                <div class="col-lg-6 form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" autocomplete="off" name="name" required>
                </div>
                <div class="col-lg-6 form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" autocomplete="off" name="address">
                </div>
                <div class="col-lg-6 form-group">
                    <label>Phone Number</label>
                    <input type="text" class="form-control" autocomplete="off" name="p_number">
                </div>

                <div class="row" style="margin-top: 5px; margin-bottom: 10px; border-bottom: 1px solid #666;"> </div>


                <div class="row">

                      <div class="col-lg-2 form-group">
                        <label>Product Id</label>
                        </div>
                      <div class="col-lg-2 form-group">
                          <label>Name</label>
                        </div>
                      <div class="col-lg-2 form-group">
                          <label>Warrenty</label>
                        </div>
                      <div class="col-lg-2 form-group">
                          <label>One Price</label>
                        </div>
                      <div class="col-lg-2 form-group">
                          <label>Quantity</label>
                        </div>
                      <div class="col-lg-2 form-group">
                          <label>Price</label>
                      </div>
                </div>

              <!-- start show data 1-->
              <div class="row">

                    <div class="col-lg-2 form-group">
                      <select name="productId1" onchange="showProduct1(this.value)" class="select-boxs form-control">
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

                    <div class="col-lg-2 form-group">
                      <select name="qty1" id="qty1" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                      </select>
                    </div>
                    <div class="col-lg-2 form-group">
                        <input type="number" name="tot_price1" id="tot_price1" class="form-control" readonly="readonly">
                    </div>
              </div>
              <!-- end show data -->


              <!-- start show data 2-->
              <div class="row">
                    <div class="col-lg-2 form-group" style="padding-top: 1px;">
                      <select name="productId2" onchange="showProduct2(this.value)" class="select-boxs form-control">
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

                    <div class="col-lg-2 form-group">
                      <select name="qty2" id="qty2" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                      </select>
                    </div>
                    <div class="col-lg-2 form-group">
                        <input type="number" name="tot_price2" id="tot_price2" class="form-control" readonly="readonly">
                    </div>
              </div>
              <!-- end show data -->


              <!-- start show data 3-->
              <div class="row">
                    <div class="col-lg-2 form-group" style="padding-top: 2px;">
                      <select name="productId3" onchange="showProduct3(this.value)" class="select-boxs form-control">
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

                    <div class="col-lg-2 form-group">
                      <select name="qty3" id="qty3" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                      </select>
                    </div>
                    <div class="col-lg-2 form-group">
                        <input type="number" name="tot_price3" id="tot_price3" class="form-control" readonly="readonly">
                    </div>
              </div>
              <!-- end show data -->

              <!-- start show data 4-->
              <div class="row">
                    <div class="col-lg-2 form-group" style="padding-top: 3px;">
                      <select name="productId4" onchange="showProduct4(this.value)" class="select-boxs form-control">
                            <option value="">None</option>
                          <?php
                          while ( $row4 = mysqli_fetch_assoc($result4) )
                          {
                          ?>
                            <option value="<?php echo $row4['product_id']; ?>"><?php echo $row4['product_id']; ?></option>
                          <?php
                          }
                          ?>
                      </select>
                    </div>
                    <!-- Show select product details -->
                    <div id="productHint4"></div>

                    <div class="col-lg-2 form-group">
                      <select name="qty4" id="qty4" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                      </select>
                    </div>
                    <div class="col-lg-2 form-group">
                        <input type="number" name="tot_price4" id="tot_price4" class="form-control" readonly="readonly">
                    </div>
              </div>
              <!-- end show data -->

              <!-- start show data 5-->
              <div class="row">
                    <div class="col-lg-2 form-group" style="padding-top: 4px;">
                      <select name="productId5" onchange="showProduct5(this.value)" class="select-boxs form-control">
                            <option value="">None</option>
                          <?php
                          while ( $row5 = mysqli_fetch_assoc($result5) )
                          {
                          ?>
                            <option value="<?php echo $row5['product_id']; ?>"><?php echo $row5['product_id']; ?></option>
                          <?php
                          }
                          ?>
                      </select>
                    </div>
                    <!-- Show select product details -->
                    <div id="productHint5"></div>

                    <div class="col-lg-2 form-group">
                      <select name="qty5" id="qty5" class="form-control">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>

                      </select>
                    </div>
                    <div class="col-lg-2 form-group">
                        <input type="number" name="tot_price5" id="tot_price5" class="form-control" readonly="readonly">
                    </div>
              </div>
              <!-- end show data -->

              <div class="row" style="margin-top: 5px; margin-bottom: 20px; border-bottom: 1px solid #666;"> </div>


              <div class="row">
                <div class="col-lg-8" style="padding-left:400px;">
                    <label>Total</label>
                  </div>
                <div class="col-lg-4 form-group input-group">
                  <span class="input-group-addon"> Rs </span>
                    <input type="number" name="total" id="total" class="form-control" readonly="readonly">
                </div>
              </div>


              <div class="row">
                <div class="col-lg-8" style="padding-left:400px;">
                    <label>Discount</label>
                  </div>
                <div class="col-lg-4 form-group input-group">
                    <input type="number" max="100" name="discount" id="discount" autocomplete="off" onchange="discountcount(this)" class="form-control">
                    <span class="input-group-addon"> % </span>
                </div>
              </div>


              <div class="row">
                <div class="col-lg-8" style="padding-left:400px;">
                    <label>Sub Total</label>
                  </div>
                <div class="col-lg-4 form-group input-group">
                  <span class="input-group-addon"> Rs </span>
                    <input type="text" name="bil_total" id="bil_total" autocomplete="off" class="form-control">
                </div>
              </div>

              <div style="margin-bottom: 30px;">
              <button type="submit" name="submit" class="btn btn-primary">Add New Sale</button>
            </div>
        </form>
      </div>
    </div>
</div>

</div>

<!-- ajax using get product detials -->
<script>
// Select box
$(document).ready(function() {
  $(".select-boxs").select2();
});


function showProduct1(str) {
    if (str == "") {
        document.getElementById("productHint1").innerHTML = "";
        //reset NONE product select chage price and qty
        document.getElementById('tot_price1').value = "";
        document.getElementById('qty1').value = "0";
        adding();
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productHint1").innerHTML = this.responseText;
                //reset product chage price and qty
                document.getElementById('tot_price1').value = "";
                document.getElementById('qty1').value = "0";
            }
        };
        // console.log(str);
        xmlhttp.open("GET","ajax/getsaleproduct.php?tab=1&productId="+str,true);
        xmlhttp.send();

    }
}

function showProduct2(str) {
    if (str == "") {
        document.getElementById("productHint2").innerHTML = "";
        //reset NONE product select chage price and qty
        document.getElementById('tot_price2').value = "";
        document.getElementById('qty2').value = "0";
        adding();
        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productHint2").innerHTML = this.responseText;
                  //reset product chage price and qty
                document.getElementById('tot_price2').value = "";
                document.getElementById('qty2').value = "0";
            }
        };
        // console.log(str);
        xmlhttp.open("GET","ajax/getsaleproduct.php?tab=2&productId="+str,true);
        xmlhttp.send();
    }
}

function showProduct3(str) {
    if (str == "") {
        document.getElementById("productHint3").innerHTML = "";
        //reset NONE product select chage price and qty
        document.getElementById('tot_price3').value = "";
        document.getElementById('qty3').value = "0";
        adding();

        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productHint3").innerHTML = this.responseText;
                //reset product chage price and qty
                document.getElementById('tot_price3').value = "";
                document.getElementById('qty3').value = "0";
            }
        };
        // console.log(str);
        xmlhttp.open("GET","ajax/getsaleproduct.php?tab=3&productId="+str,true);
        xmlhttp.send();
    }
}

function showProduct4(str) {
    if (str == "") {
        document.getElementById("productHint4").innerHTML = "";
        //reset NONE product select chage price and qty
        document.getElementById('tot_price4').value = "";
        document.getElementById('qty4').value = "0";
        adding();

        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productHint4").innerHTML = this.responseText;
                //reset product chage price and qty
                document.getElementById('tot_price4').value = "";
                document.getElementById('qty4').value = "0";
            }
        };
        // console.log(str);
        xmlhttp.open("GET","ajax/getsaleproduct.php?tab=4&productId="+str,true);
        xmlhttp.send();
    }
}

function showProduct5(str) {
    if (str == "") {
        document.getElementById("productHint5").innerHTML = "";
        //reset NONE product select chage price and qty
        document.getElementById('tot_price5').value = "";
        document.getElementById('qty5').value = "0";
        adding();

        return;
    } else {
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("productHint5").innerHTML = this.responseText;
                //reset product chage price and qty
                document.getElementById('tot_price5').value = "";
                document.getElementById('qty5').value = "0";
            }
        };
        // console.log(str);
        xmlhttp.open("GET","ajax/getsaleproduct.php?tab=5&productId="+str,true);
        xmlhttp.send();
    }
}


document.getElementById("qty1").onclick = function() {
  tot_price1 = document.getElementById('s_price1').value;
  qty1 = document.getElementById('qty1').value;
  document.getElementById('tot_price1').value = tot_price1*qty1;
  adding();

};

document.getElementById("qty2").onclick = function() {
  tot_price2 = document.getElementById('s_price2').value;
  qty2 = document.getElementById('qty2').value;
  document.getElementById('tot_price2').value = tot_price2*qty2;
  adding();
};

document.getElementById("qty3").onclick = function() {
  tot_price3 = document.getElementById('s_price3').value;
  qty3 = document.getElementById('qty3').value;
  document.getElementById('tot_price3').value = tot_price3*qty3;
  adding();
};

document.getElementById("qty4").onclick = function() {
  tot_price4 = document.getElementById('s_price4').value;
  qty4 = document.getElementById('qty4').value;
  document.getElementById('tot_price4').value = tot_price4*qty4;
  adding();
};

document.getElementById("qty5").onclick = function() {
  tot_price5 = document.getElementById('s_price5').value;
  qty5 = document.getElementById('qty5').value;
  document.getElementById('tot_price5').value = tot_price5*qty5;
  adding();
};

function adding(){
  num1  = document.getElementById('tot_price1').value;
  num2  = document.getElementById('tot_price2').value;
  num3  = document.getElementById('tot_price3').value;
  num4  = document.getElementById('tot_price4').value;
  num5  = document.getElementById('tot_price5').value;

  add = +num1 + +num2 + +num3 + +num4 + +num5;

  document.getElementById('total').value = add;

  document.getElementById('bil_total').value = add;

  discountcount();

}

//count discount
function discountcount() {

    sellPriceUpdate = document.getElementById('total').value;
    dis = document.getElementById('discount').value;

    document.getElementById('bil_total').value = (+sellPriceUpdate * (100 - +dis))/100;

}

</script>

<!-- footer -->
<?php include 'footer.php'; ?>
