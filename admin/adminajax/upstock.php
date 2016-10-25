<?php
require_once '../db.php';

$pid = $_GET['pid'];

$sql = "SELECT * FROM stock WHERE product_id='".$pid."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

echo "
<div class='form-group'>
    <label>Product Id</label>
    <input class='form-control' name='product_id' value='".$row['product_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Stock Price</label>
    <input class='form-control' name='stock_price' value='".$row['stock_price']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Sale Price</label>
    <input class='form-control' name='sale_price' value='".$row['sale_price']."' autocomplete='off' required>
</div>

<div class='form-group'>
    <input type='hidden' class='form-control' name='rowid' value='".$row['id']."' readonly='readonly' required>
</div>
";

?>
