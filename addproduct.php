<?php 

include_once 'connectdb.php';

session_start();
include_once 'header.php'; 
?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Product
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
              <h3 class="box-title">Product Form</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <form action="" method="" name="formproduct">
            <div class="col-md-6">
                <div class="form-group">
                  <label >Product Name</label>
                  <input type="text" class="form-control" name="txtname" placeholder="Enter Name" required>
                </div>
                               
                
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="txtselect_option" required>
                    <option value="" disabled selected>Select Category</option>
                    <option>User</option>
                    <option>Admin</option>
                  </select>
                </div>    
                
                <div class="form-group">
                  <label >Purchase Price</label>
                  <input type="text" class="form-control" name="txtprice" placeholder="Enter..." required>
                </div>    
                
                <div class="form-group">
                  <label >Sale Price</label>
                  <input type="text" class="form-control" name="txtsaleprice" placeholder="Enter..." required>
                </div>  
                             
                                            
                <div class="form-group">
                <button type="submit" class="btn btn-info" name="btnsave">Save</button>                         
                </div>                  
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label >Stock</label>
                  <input type="text" class="form-control" name="txtstock" placeholder="Enter..." required>
                </div>                                                        
                <div class="form-group">
                  <label >Description</label>
                  <textarea class="form-control" name="txtdescription" placeholder="Enter..." required></textarea>
                </div>  
                                               
            </div>
            
            </form>
            </div>        
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- Main Footer -->
<?php 
include_once 'footer.php'; 
?>