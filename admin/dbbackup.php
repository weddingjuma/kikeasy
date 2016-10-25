<?php
require_once 'db.php';
require_once 'logincheck.php';
require_once 'dumper.php';

//show notification
$msg ="";

if(isset($_POST['submit'])) {

  $world_dumper = Shuttle_Dumper::create(array(
      'host' => 'localhost',
      'username' => 'root',
      'password' => '',
      'db_name' => 'shop',
  ));
  $date = date('Y-m-d-H-i-s');
  // dump the database to plain text file
  $world_dumper->dump('backups/'.'shop.'.$date.'.sql');

  $msg = "<div class='alert alert-success'> Database Backup Save Succsefully. File name : shop.$date.sql
  <button type='button' class='close' data-dismiss='alert' aria-label='close'><span aria-hidden='true'>&times;</span></button> </div>";

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
          <div class="col-lg-12">
              <h1 class="page-header">Download Database Backup File</h1>
          </div>
      </div>

      <div class="row">
      </br>
      <!-- Show message -->
      <?php echo $msg; ?>
      </div>

      <div class="col-md-8">

        <form method="post" action="dbbackup.php">
          <button type='submit' name='submit' class='btn btn-primary'> Get Database Backup </button>
        </form>
      </div>
    </div>
</div>

</div>

<!-- footer -->
<?php include 'footer.php'; ?>
