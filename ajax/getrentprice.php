<?php
require_once '../db.php';

$code = $_GET['code'];

if($code == "code1") {
  $pId1 = $_GET['pid1'];
  code1();
}

if($code == "code2") {
  $pId2 = $_GET['pid2'];
  code2();
}

if($code == "code3") {
  $pId3 = $_GET['pid3'];
  code3();
}

function code1(){
  global $dbc, $pId1;
  $sql1 = "SELECT * FROM stock WHERE product_id = '".$pId1."'";
  $result1 = mysqli_query($dbc, $sql1);
  $row1 = mysqli_fetch_array($result1);

  $sql2 = "SELECT * FROM product WHERE product_id = '".$pId1."'";
  $result2 = mysqli_query($dbc, $sql2);
  $row2 = mysqli_fetch_array($result2);

echo "
<div class='form-group'>
    <label>Product Price</label>
    <input type='text' class='form-control' id='rentprice1' name='rentprice1' value='".$row1['sale_price']."' readonly='readonly'>
</div>

<div class='panel panel-default'>
    <div class='panel-heading'>
            Basic Table
        </div>
        <!-- /.panel-heading -->
        <div class='panel-body'>
            <div class='table-responsive'>
                <table class='table'>
                    <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Type</th>
                          <th>Color</th>
                          <th>warranty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>".$row2['name']."</td>
                          <td>".$row2['type']."</td>
                          <td>".$row2['colors']."</td>
                          <td>".$row2['warranty']."</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

                    </div>

                </div>";

}



function code2(){
  global $dbc, $pId2;
  $sql1 = "SELECT * FROM stock WHERE product_id = '".$pId2."'";
  $result1 = mysqli_query($dbc, $sql1);
  $row1 = mysqli_fetch_array($result1);

  $sql2 = "SELECT * FROM product WHERE product_id = '".$pId2."'";
  $result2 = mysqli_query($dbc, $sql2);
  $row2 = mysqli_fetch_array($result2);

echo "
<div class='form-group'>
    <label>Product Price</label>
    <input type='text' class='form-control' id='rentprice2' name='rentprice2' value='".$row1['sale_price']."' readonly='readonly'>
</div>

<div class='panel panel-default'>
    <div class='panel-heading'>
            Basic Table
        </div>
        <!-- /.panel-heading -->
        <div class='panel-body'>
            <div class='table-responsive'>
                <table class='table'>
                    <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Type</th>
                          <th>Color</th>
                          <th>warranty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>".$row2['name']."</td>
                          <td>".$row2['type']."</td>
                          <td>".$row2['colors']."</td>
                          <td>".$row2['warranty']."</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

                    </div>

                </div>";

}

function code3(){
  global $dbc, $pId3;
  $sql1 = "SELECT * FROM stock WHERE product_id = '".$pId3."'";
  $result1 = mysqli_query($dbc, $sql1);
  $row1 = mysqli_fetch_array($result1);

  $sql2 = "SELECT * FROM product WHERE product_id = '".$pId3."'";
  $result2 = mysqli_query($dbc, $sql2);
  $row2 = mysqli_fetch_array($result2);

echo "
<div class='form-group'>
    <label>Product Price</label>
    <input type='text' class='form-control' id='rentprice3' name='rentprice3' value='".$row1['sale_price']."' readonly='readonly'>
</div>

<div class='panel panel-default'>
    <div class='panel-heading'>
            Basic Table
        </div>
        <!-- /.panel-heading -->
        <div class='panel-body'>
            <div class='table-responsive'>
                <table class='table'>
                    <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Type</th>
                          <th>Color</th>
                          <th>warranty</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>".$row2['name']."</td>
                          <td>".$row2['type']."</td>
                          <td>".$row2['colors']."</td>
                          <td>".$row2['warranty']."</td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>

                    </div>

                </div>";

}
?>
