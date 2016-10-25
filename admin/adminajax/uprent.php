<?php
require_once '../db.php';

$cid = $_GET['cardid'];

$sql = "SELECT * FROM rent WHERE card_id='".$cid."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

echo "
<div class='form-group'>
    <label>Card Id</label>
    <input class='form-control' name='card_id' value='".$row['card_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Nation ID Number</label>
    <input class='form-control' name='n_id' value='".$row['n_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Product ID</label>
    <input class='form-control' name='product_id' value='".str_replace(" ", "," , $row['product_id'])."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Rent Total Price</label>
    <input class='form-control' name='r_total' value='".$row['r_total']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Advance</label>
    <input class='form-control' name='advance' value='".$row['advance']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Route</label>
    <input class='form-control' name='route' value='".$row['route']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Referee</label>
    <input class='form-control' name='referee' value='".$row['referee']."' autocomplete='off' required>
</div>

<div class='form-group'>
    <input type='hidden' class='form-control' name='rowid' value='".$row['id']."' readonly='readonly' required>
</div>
";

?>
