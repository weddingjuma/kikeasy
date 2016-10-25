<?php
require_once '../db.php';

$sid = $_GET['supid'];

$sql = "SELECT * FROM supplier WHERE sup_id='".$sid."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

echo "
<div class='form-group'>
    <label>Supplier ID</label>
    <input class='form-control' name='supId' value='".$row['sup_id']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Supplier Name / Company Name</label>
    <input class='form-control' name='supName' value='".$row['sup_name']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Supplier Address</label>
    <input class='form-control' name='supAddress' value='".$row['sup_address']."' autocomplete='off' required>
</div>
<div class='form-group'>
    <label>Supplier Contact Numbers</label>
    <input class='form-control' name='supNumber' value='".$row['sup_number']."' autocomplete='off'>
</div>
<div class='form-group'>
    <label>Supplier Email</label>
    <input class='form-control' name='supEmail' value='".$row['sup_email']."' autocomplete='off'>
</div>
<div class='form-group'>
    <label>Supplier Note</label>
    <input class='form-control' name='supNote' value='".$row['sup_note']."' autocomplete='off'>
</div>

<div class='form-group'>
    <input type='hidden' class='form-control' name='rowid' value='".$row['id']."' readonly='readonly' required>
</div>
";

?>
