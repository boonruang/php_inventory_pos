<?php 
include_once 'connectdb.php';

session_start();
//error_reporting(0);

if ($_SESSION['useremail'] == "" OR $_SESSION['role'] != 'Admin') {
    header("location:index.php");
}

include_once 'header.php';    

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];

    $delete = $pdo->prepare("delete from tbl_user where userid =".$id);
    
    if($delete->execute()) {
        echo '<script type="text/javascript">
        jQuery(function validation(){
        swal({
          title: "Good Job!",
          text: "User deleted successfully",
          icon: "success",
          button: "Ok",
        });

        });
        </script>';
    } else {
        echo '<script type="text/javascript">
        jQuery(function validation(){
        swal({
          title: "Error",
          text: "User can not delete!!",
          icon: "error",
          button: "Ok",
        });

        });
        </script>';        
    }
}

if (isset($_POST['btnsave'])) {
    $username = $_POST['txtname'];
    $useremail = $_POST['txtemail'];
    $password = $_POST['txtpassword'];
    $userrole = $_POST['txtselect_option'];
    
//    echo $username.'-'.$useremail.'-'.$password.'-'.$userrole;
    
      if (isset($_POST['txtemail'])) {
          
        $select = $pdo->prepare("select useremail from tbl_user where useremail ='$useremail'");
        $select->execute();
          
          if ($select->rowCount()) {
             // mail already exist
                echo '<script type="text/javascript">
                jQuery(function validation(){
                swal({
                  title: "Warning!",
                  text: "Email already exist!! Please try different email",
                  icon: "warning",
                  button: "Ok",
                });

                });
                </script>';
          } else {
             // email not exist able to register account
            $insert = $pdo->prepare("insert into tbl_user (username, useremail, password, role) values (:username, :useremail, :password, :role)");

            $insert->bindParam(':username',$username);
            $insert->bindParam(':useremail',$useremail);
            $insert->bindParam(':password',$password);
            $insert->bindParam(':role',$userrole);

            if ($insert->execute() > 0) {
//                echo 'registration successfull';
                echo '<script type="text/javascript">
                jQuery(function validation(){
                swal({
                  title: "Good job!!",
                  text: "Registration is successfully",
                  icon: "success",
                  button: "Ok",
                });

                });
                </script>';
                
            } else {
//                echo 'registration fail';
                echo '<script type="text/javascript">
                jQuery(function validation(){
                swal({
                  title: "Error!",
                  text: "Registration fail!!",
                  icon: "error",
                  button: "Ok",
                });

                });
                </script>';                
            }

          }

      }
    
}




?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration
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
        
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Registration Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
               
            <div class="col-md-4">
               
                <div class="form-group">
                  <label >Name</label>
                  <input type="text" class="form-control" name="txtname" placeholder="Enter Name" required>
                </div>
                               
                <div class="form-group">
                  <label >Email address</label>
                  <input type="email" class="form-control" name="txtemail" placeholder="Enter email" required>
                </div>
                <div class="form-group">
                  <label >Password</label>
                  <input type="password" class="form-control" name="txtpassword" placeholder="Password" required>
                </div>
                
                <div class="form-group">
                  <label>Role</label>
                  <select class="form-control" name="txtselect_option" required>
                    <option value="" disabled selected>Select role</option>
                    <option>User</option>
                    <option>Admin</option>
                  </select>
                </div>    
                
                <div class="form-group">
                <button type="submit" class="btn btn-info" name="btnsave">Save</button>                         
                </div>                               
                
            </div>
            <div class="col-md-8">
                
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NAME</th>
                        <th>EMAIL</th>
                        <th>PASSWORD</th>
                        <th>ROLE</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>

            <?php
            $select = $pdo->prepare("select * from tbl_user order by userid desc");
            $select->execute();



            while($row = $select->fetch(PDO::FETCH_OBJ)) {
               echo '
                <tr>
                    <td>'.$row->userid.'</td>
                    <td>'.$row->username.'</td>
                    <td>'.$row->useremail.'</td>
                    <td>'.$row->password.'</td>
                    <td>'.$row->role.'</td>  
                    <td>
                        <a href="registration.php?id='.$row->userid.'" class="btn btn-danger" role="button"><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>     
                '; 
            }

            ?>                    
                                                              
          
                </tbody>
                </table>
                
            </div>                             
                              


              </div>
              <!-- /.box-body -->

              <div class="box-footer">

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