<?php 
include_once 'connectdb.php';

session_start();
if ($_SESSION['useremail'] == "" OR $_SESSION['role'] != "Admin") {
    header('location:index.php');
}

$select = $pdo->prepare(" select sum(total) as t,count(invoice_id) as inv from tbl_invoice");
$select->execute();
$row = $select->fetch(PDO::FETCH_OBJ);

$total_order = $row->inv;
$net_total = $row->t;


$select = $pdo->prepare("select order_date, total from tbl_invoice group by order_date LIMIT 30");
$select->execute();

$ttl = [];
$date = [];

while($row = $select->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $ttl[] = $total;
    $date[] = $order_date;
}
// echo json_encode($ttl);
// echo json_encode($date);
                

include_once 'header.php';
?>
 
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admin Dashboard
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
           
        <div class="box-body">
              <div class="row">
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3><?php echo $total_order;?></h3>

                      <p>New Orders</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3><?php echo '$'.number_format($net_total,2);?></h3>

                      <p>Total Revenue</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

        <?php

        $select = $pdo->prepare(" select count(pname) as p from tbl_product");
        $select->execute();
        $row = $select->fetch(PDO::FETCH_OBJ);

        $total_product = $row->p;

        ?>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3><?php echo $total_product;?></h3>

                      <p>Total Product</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-person-add"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

        <?php

        $select = $pdo->prepare(" select count(category) as cate from tbl_category");
        $select->execute();
        $row = $select->fetch(PDO::FETCH_OBJ);

        $total_category = $row->cate;

        ?>

                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?php echo $total_category;?></h3>

                      <p>Total Category</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>
                <!-- ./col -->
              </div>      
        </div>           
           
            
        <div class="box box-warning">
           <form action="" method="post" name=""> 
            <div class="box-header with-border">
              <h3 class="box-title">Earning By Date</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
           
            <div class="chart">
                <canvas id="earningbydate" style="height:250px"></canvas>                
            </div>                              

          
                </div>

            </form>
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script>

  const data = {
    labels: <?php echo json_encode($date); ?>,
    datasets: [{
      label: 'Total Earning',
      fill: true,
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',        

      data: <?php echo json_encode($ttl); ?>,
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
    
  const myChart = new Chart(
    document.getElementById('earningbydate'),
    config
  );    
</script>
   

<!-- Main Footer -->
<?php 
include_once 'footer.php'; 
?>