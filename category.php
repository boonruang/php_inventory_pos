<?php 
include_once 'connectdb.php';

session_start();

if ($_SESSION['useremail'] == "" OR $_SESSION['role'] != 'Admin') {
    header('location:index.php');
}
include_once 'header.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $delete = $pdo->prepare("delete from tbl_category where catid=".$id);

    if($delete->execute()) {
        echo '<script type="text/javascript">
        jQuery(function validation(){
        swal({
          title: "Good Job!",
          text: "Category deleted successfully",
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
          text: "Category can not delete!!",
          icon: "error",
          button: "Ok",
        });

        });
        </script>';        
    }
}


if (isset($_POST['btnsave'])) {
    $category = $_POST['txtcategory'];
    
    if (empty($category)) {
        
        $error = '<script type="text/javascript">
        jQuery(function validation(){
        
        swal({
          title: "Feild is empty",
          text: "Please fill a feild!!",
          icon: "error",
          button: "Ok",
        });

        });
        </script>';   
        echo $error;
    }
    
    if (!isset($error)) {
        
        $insert = $pdo->prepare("insert into tbl_category (category) values (:category)");
        
        $insert->bindParam(':category',$category);
        

        if ($insert->execute()) {
            echo '<script type="text/javascript">
            jQuery(function validation(){

            swal({
              title: "Good job!",
              text: "Your category added!!",
              icon: "success",
              button: "Ok",
            });

            });
            </script>';  
        } else {
            echo '<script type="text/javascript">
            jQuery(function validation(){

            swal({
              title: "Error!!",
              text: "Query fail",
              icon: "error",
              button: "Ok",
            });

            });
            </script>';  
        }
        
    }
    
}


?>

 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Category
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
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Category Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="" method="post">
              <div class="box-body">
               
            <div class="col-md-4">
               
                <div class="form-group">
                  <label >Category</label>
                  <input type="text" class="form-control" name="txtcategory" placeholder="Enter Category" required>
                </div>
                                       
                <div class="form-group">
                <button type="submit" class="btn btn-warning" name="btnsave">Save</button>                         
                </div>                               
                
            </div>
            <div class="col-md-8">
                
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>CATEGORY</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>

            <?php
                    
            $select = $pdo->prepare("select * from tbl_category order by catid desc");

            $select->execute();

              
                    
            while ($row = $select->fetch(PDO::FETCH_OBJ)) {
                
         echo '
        <tr>
            <td>'.$row->catid.'</td>
            <td>'.$row->category.'</td>
            <td>
            <button type="submit" value="'.$row->catid.'" class="btn btn-success" name="btnedit">Edit</button>
            </td>
            <td>
            <button type="submit" value="'.$row->catid.'" class="btn btn-danger" name="btndelete">Delete</button>
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