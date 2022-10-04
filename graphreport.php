<?php 
include_once 'connectdb.php';
error_reporting(0);
session_start();
include_once 'header.php'; 
?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Graph report
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
           <form action="" method="post" name=""> 
            <div class="box-header with-border">
              <h3 class="box-title">From : <?php echo $_POST['date_1']?> -- to : <?php echo $_POST['date_2']?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            
            <div class="row">
               
                <div class="col-md-5">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker1" name="date_1" data-date-format="yyyy-mm-dd">
                    </div>                        
                </div>                    
                <div class="col-md-5">
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="text" class="form-control pull-right" id="datepicker2" name="date_2" data-date-format="yyyy-mm-dd">
                    </div>                          
                </div>                    
                <div class="col-md-2">
                    <div align="left">
                        <input type="submit" name="btndatefilter" value="Filter By Date" class="btn btn-success">
                    </div>                        
                </div>                    
            </div>          

            <?php
            $select = $pdo->prepare("select order_date, sum(total) as price from tbl_invoice where order_date between :fromdate AND :todate group by order_date");
            $select->bindParam(':fromdate',$_POST['date_1']);
            $select->bindParam(':todate',$_POST['date_2']);
            $select->execute();
                
            $total = [];
            $date = [];

            while($row = $select->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $total[] = $price;
                $date[] = $order_date;
            }
 //echo json_encode($total);
 //echo json_encode($date);
                
            ?>
            <div class="chart">
                <canvas id="myChart" style="height:250px"></canvas>                
            </div>
            
            </div>
            </form>
        </div>                   

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<script>
    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    });
    
    $('#datepicker2').datepicker({
      autoclose: true
    }); 

</script>    
  
<script>
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: <?php echo json_encode($date); ?>,
    datasets: [{
      label: 'Total Earning',
      fill: true,
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: <?php echo json_encode($total); ?>,
      cubicInterpolationMode: 'monotone',
    }]
  };

  const config = {
//    type: 'line',
//    type: 'bar',
//    type: 'pie',
    type: 'bar',
    data: data,
    options: {}
  };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<!-- Main Footer -->
<?php 
include_once 'footer.php'; 
?>