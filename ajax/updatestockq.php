<?php
require_once '../db.php';

$productId = $_GET['productid'];

$sql2="SELECT quantity FROM stock WHERE product_id = '".$productId."'";
$result2 = mysqli_query($dbc,$sql2);
$row2 = mysqli_fetch_assoc($result2);

echo "
<div class='form-group'>
    <label>Available quantity</label>
    <input class='form-control' name='availableQuantity' value='".$row2['quantity']."' readonly='readonly' required>
</div>";
?>
