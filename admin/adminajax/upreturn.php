<?php
require_once '../db.php';

$rid = $_GET['returnid'];

$sql = "SELECT * FROM `return` WHERE return_id='".$rid."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

echo "
<div class='form-group'>
    <label>Return ID</label>
    <input class='form-control' name='r_id' value='".$row['return_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Sale Type (Rent or Sale)</label>
    <input class='form-control' name='s_type' value='".$row['sale_type']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Customer National ID</label>
    <input class='form-control' name='n_id' value='".$row['cusnid']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Rent / Sale ID</label>
    <input class='form-control' name='rsid' value='".$row['rent_sale_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Return Product ID</label>
    <input class='form-control' name='rpid' value='".$row['rproductid']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Route</label>
    <input class='form-control' name='route' value='".$row['route']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Contact Number</label>
    <input class='form-control' name='c_number' value='".$row['contact_num']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Note</label>
    <input class='form-control' name='note' value='".$row['note']."' autocomplete='off' required>
</div>


<div class='form-group'>
    <input type='hidden' class='form-control' name='rowid' value='".$row['id']."' readonly='readonly' required>
</div>
";

?>
