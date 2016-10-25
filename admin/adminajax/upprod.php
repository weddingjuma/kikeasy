<?php
require_once '../db.php';

$pid = $_GET['prodid'];

$sql = "SELECT * FROM product WHERE product_id='".$pid."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

echo "
<div class='form-group'>
    <label>Product ID</label>
    <input class='form-control' name='product_id' value='".$row['product_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Supplier ID</label>
    <input class='form-control' name='sup_id' value='".$row['sup_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Name</label>
    <input class='form-control' name='name' value='".$row['name']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Type</label>
    <input class='form-control' name='type' value='".$row['type']."' autocomplete='off'>
</div>
<div class='form-group'>
    <label>Colors</label>
    <input class='form-control' name='colors' value='".$row['colors']."' autocomplete='off'>
</div>
<div class='form-group'>
    <label>Warranty</label>
    <input class='form-control' name='warranty' value='".$row['warranty']."' autocomplete='off'>
</div>

<div class='form-group'>
    <input type='hidden' class='form-control' name='rowid' value='".$row['id']."' readonly='readonly' required>
</div>
";

?>
