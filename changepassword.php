<?php 
include_once 'connectdb.php';

session_start();
//error_reporting(0);

include_once 'header.php'; 



if (isset($_POST['btnupdate'])) {
    $oldpassword_txt = $_POST['txtoldpass'];
    $newpassword_txt = $_POST['txtnewpass'];
    $confpassword_txt = $_POST['txtconfpass'];

    
    $email = $_SESSION['useremail'];
    $select = $pdo->prepare("select * from tbl_user where useremail ='$email'");
    
    $select->execute();
    
    $row = $select->fetch(PDO::FETCH_ASSOC);
    echo $row['useremail'];
    echo $row['username'];
    
}


 

?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Change Password
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <!--------------------------
        | Your Page Content Here |
        -------------------------->
        
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Change password form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Old Password</label>
                  <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtoldpass">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtnewpass">
                </div>         
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Confirm Password</label>
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="txtconfpass">
                </div>                                   

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" name="btnupdate">Update</button>
              </div>
            </form>
          </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Main Footer -->
<?php 
include_once 'footer.php'; 
?>