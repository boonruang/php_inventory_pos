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
              <h3 class="box-title">blank</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="box-body">
            <canvas id="myChart"></canvas>            
            </div>
            </form>
        </div>                   

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
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
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      fill: true,
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
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