<?php
require_once 'db.php';
require_once 'logincheck.php';

$sql = "SELECT * FROM deliver";
$result = mysqli_query($dbc, $sql);

if(isset($_POST['submit'])){

  foreach ($_POST['id'] as $index => $id) {
  $sql3 = "UPDATE deliver_product SET d_quantity='".$_POST['qty'][$index]."' WHERE id='".$_POST['id'][$index]."'";
  $res = mysqli_query($dbc, $sql3);

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
          <div class="col-lg-12" style="color: #099268;">
              <h1 class="page-header">Deliver Vehicle Availible Products And Quantitys</h1>
          </div>
      </div>

              <div class="col-md-8">
                        <form>
                          <div class="form-group">
                            <label>Select Deliver ID</label>
                            <select class="select-boxs form-control" onchange="getDeliver(this.value)">
                                  <option value="">Select Deliver ID</option>
                                <?php
                                while ( $row = mysqli_fetch_assoc($result) )
                                {
                                ?>
                                  <option value="<?php echo $row['deliver_id']; ?>"><?php echo $row['deliver_id']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                          </div>
                              </form>
                        </div>

<form method='post' action='viewdeliver.php'>
<div id="deliverResult"></div>
</form>
</div>

</div>

<script>
function getDeliver(str) {
    if (str == "") {
        document.getElementById("deliverResult").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("deliverResult").innerHTML = this.responseText;
            }
        };
        console.log(str);
        xmlhttp.open("GET","ajax/getdeliverdata.php?deliverid="+str,true);
        xmlhttp.send();
    }
}


// Select box
$(document).ready(function() {
  $(".select-boxs").select2();
});

</script>

<!-- footer -->
<?php include 'footer.php'; ?>
