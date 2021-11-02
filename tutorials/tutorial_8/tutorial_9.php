<?php
include "database.php";
  $sql ="SELECT * FROM carbon_emission";
  $result = mysqli_query($connection,$sql);
  $chart_data="";
  while ($row = mysqli_fetch_array($result)) { 
    $country[]  = $row['Country']  ;
    $carbon_rate[] = $row['CarbonRate'];
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bar graph for carbon emission rate</title>
</head>
<body>
  <div style="width:60%; height:20%; text-align:center">
    <h2 class="page-header" >Carbon Emission Reports</h2>
    <canvas  id="chartjs_bar"></canvas> 
  </div>    
  <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
  <script type="text/javascript">
    var ctx = document.getElementById("chartjs_bar").getContext('2d');
    var myChart = new Chart(ctx, {type: 'bar', data: {
                            labels:<?php echo json_encode($country); ?>,
                        datasets: [{
                            backgroundColor: [
                               "#5969ff",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($carbon_rate); ?>,
                        }]
                    },
                    options: {
                           legend: {
                        display: true,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                        }
                      },
                    }
                  });
</script>
</body>
</html>