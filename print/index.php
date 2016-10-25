<?php

require_once '../db.php';

$sid = $_GET['sid'];

$sql = "SELECT * FROM sale WHERE sale_id='".$sid."'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_array($result);

$sql1 = "SELECT * FROM sale_more WHERE sale_id='".$sid."'";
$result1 = mysqli_query($dbc, $sql1);
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>PEARL ENTERPRISES</title>

  <link href="css/bootstrap.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h1 align="center">PEARL ENTERPRISES</h2><h3 class="pull-right">Order # <?php echo $row['sale_id']; ?></h1>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="address-size col-xs-6">
    				<address>
    				<strong>PEARL ENTERPRISES</strong><br>
							Kuruduwattha<br>
    					Pilimathalawa<br><br>
    					Tel : <br>
							077 121312312<br>
							021 123123123<br>
    				</address>
    			</div>
    			<div class="cus-size col-xs-6 text-right">
    				<address>
							<strong>Billed To:</strong><br>
	    					<?php echo $row['name']; ?><br>
	    					<?php echo $row['address']; ?><br>
    				</address>
    			</div>
    		</div>
    		<div class="row">

    			<div class="order-size col-xs-12">
    				<address>
    					<strong>Order Date:</strong><br>
    				<?php echo $row['sale_date']; ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>

    <div class="row">
    	<div class="col-md-12 col-lg-12">
                        <div class="">

                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-clear">
                                    <table class="table-tit table">
                                        <thead>
                                            <tr>
                                                <th>Item ID</th>
                                                <th>Item Name</th>
                                                <th>Price</th>
																								<th>Quantity</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>


																								<?php while($row1 = mysqli_fetch_array($result1))
																								{
																								?>
																								  <tr>
                                                <td><?php echo $row1['productId']; ?></td>
                                               	<td><?php echo $row1['salepname']; ?></td>
                                                <td>Rs :  <?php echo $row1['salepprice']; ?></td>
																								<td><?php echo $row1['qty']; ?></td>
                                                <td>Rs :  <?php echo $row1['tot_price']; ?></td>
  </tr>
																									<?php } ?>

                                        </tbody>
                                    </table>


																						<div class="row print">

																							<div class="col-lg-6 col-sm-6 notice">

																							</div><!--/col-->

																							<div class="col-lg-6 col-lg-offset-6 col-sm-6 col-sm-offset-6 recap">
																								<table class="table table-clear">
																									<tbody>
																										<tr>
																											<td class="left main-data"><strong>Subtotal</strong></td>
																											<td class="right main-data" style="padding-right: 20px;">Rs : <?php echo $row['total']; ?></td>
																										</tr>
																										<tr>
																											<td class="left main-data"><strong>Discount (<?php echo $row['discount']; ?>%)</strong></td>
																											<td class="right main-data">Rs : <?php echo ($row['total'] - $row['bill_total']); ?></td>
																										</tr>

																										<tr>
																											<td class="left main-data"><strong>Total</strong></td>
																											<td class="right main-data"><strong>Rs : <?php echo $row['bill_total']; ?></strong></td>
																										</tr>
																									</tbody>
																								</table>
																							</div><!--/col-->

																						</div><!--/row-->


                                </div>
                                <!-- /.table-responsive -->
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-6 -->
                </div>

								<div class="row" style="margin-top: 150px;">
									<h4 align="center">Thank You For Your Purchase.</h4>
								</div>

    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<script>
window.onload = function() { window.print(); }
</script>
</bodY>
</html>
