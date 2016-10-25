<?php
require_once '../db.php';

$pId = $_GET['pid'];

$sql = "SELECT * FROM stock WHERE product_id = '".$pId."'";
$result = mysqli_query($dbc,$sql);
$row = mysqli_fetch_array($result);

echo "
<div class='col-lg-8'>
  <div class='form-group'>
      <label>New Product Price</label>
      <input type='text' class='form-control' name='rentprice' value='".$row['sale_price']."' readonly='readonly'>
  </div>
  </div>
";

?>
