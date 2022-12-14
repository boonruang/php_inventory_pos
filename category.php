<?php 
include_once 'connectdb.php';

session_start();

if ($_SESSION['useremail'] == "" OR $_SESSION['role'] != 'Admin') {
    header('location:index.php');
}

include_once 'header.php'; 

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
    
} // btnsave for adding end here

if (isset($_POST['btnupdate'])) {
    
            $id = $_POST['txtid'];
            $category = $_POST['txtcategory'];
    
        if (empty($category)) {

            $errorupdate = '<script type="text/javascript">
            jQuery(function validation(){

            swal({
              title: "Error",
              text: "Feild empty! please enter category",
              icon: "error",
              button: "Ok",
            });

            });
            </script>';   
            echo $errorupdate;
        } 
    
    
        if (!isset($errorupdate)) {
        
            $update = $pdo->prepare("update tbl_category SET category = :category where catid=".$id);
    
            $update->bindParam(":category",$category);
            
            if ($update->execute()) {
                echo '<script type="text/javascript">
                jQuery(function validation(){

                swal({
                  title: "Good job!",
                  text: "Category updated",
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
            
   
} // btnupdate end of update

if (isset($_POST['btndelete'])) {
    
    $id = $_POST['btndelete'];

    $delete = $pdo->prepare("delete from tbl_category where catid=".$id);

    if($delete->execute()) {
        echo '<script type="text/javascript">
        jQuery(function validation(){
        swal({
          title: "Deleted!",
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
          title: "Error!",
          text: "Category can not delete!!",
          icon: "error",
          button: "Ok",
        });

        });
        </script>';        
    }
} // btndelete end here

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
         
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Category Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
             <form role="form" action="" method="post">
        <?php 
        if (isset($_POST['btnedit'])) {
            $id = $_POST['btnedit'];
            $select = $pdo->prepare("select * from tbl_category where catid=".$id);
            $select->execute();
            
            if ($select) {
            $row = $select->fetch(PDO::FETCH_OBJ);
            echo '<div class="col-md-4">

                    <div class="form-group">
                    
                      <input type="hidden" class="form-control" value="'.$row->catid.'" name="txtid" placeholder="Enter Category">     <label>Category</label>                 
                      <input type="text" class="form-control" value="'.$row->category.'" name="txtcategory" placeholder="Enter Category">
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-info" name="btnupdate">Update</button>                         
                    </div>                               

                </div>            
                ';                 
            } else {
                echo 'not found';
            }
           
            
        } else {
            echo '<div class="col-md-4">

                    <div class="form-group">
                      <label >Category</label>
                      <input type="text" class="form-control" name="txtcategory" placeholder="Enter Category">
                    </div>

                    <div class="form-group">
                    <button type="submit" class="btn btn-warning" name="btnsave">Save</button>                         
                    </div>                               

                </div>            
                ';
        }
                             

        ?>
              
               

            <div class="col-md-8">
                
                <table  id ="tablecategory" class="table table-striped">
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
             
            echo ' <tr>
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
                              
            </form>

          </div>
              <!-- /.box-body -->

              <div class="box-footer">

              </div>

          </div>   
          
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Main Footer -->

<!--this single function-->
<script>
    
    $(document).ready( function () {
        $('#tablecategory').DataTable();
    } );
</script>

<?php 
include_once 'footer.php'; 
?>