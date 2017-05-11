
<head>
  <meta charset="utf-8">

  <script src="https://www.google.com/jsapi"></script>
  <script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
     ['Тариф', 'Кол-во пользователей'],
     ['Промо',     <?= $stats[0] ?>],
     ['Базовый',     <?= $stats[1] ?>],
     ['Супербазовый',     <?= $stats[2] ?>],
     ['Отключен',     <?= $stats[3] ?>]
    ]);
    var options = {
     title: 'Статистика использования тарифов',
     is3D: true,
     pieResidueSliceLabel: 'Остальное'
    };
    var chart = new google.visualization.PieChart(document.getElementById('air'));
     chart.draw(data, options);
   }
  </script>


  <script src="https://www.google.com/jsapi"></script>
  <script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
     ['Тариф', 'Кол-во пользователей'],
     ['Промо',     <?= $bill[0][0][0]['bill_sum'] ?>],
     ['Базовый',     <?= $bill[1][0][0]['bill_sum'] ?>],
     ['Супербазовый',     <?= $bill[2][0][0]['bill_sum'] ?>]
    ]);
    var options = {
     title: 'Статистика оплаты тарифов',
     is3D: true,
     pieResidueSliceLabel: 'Остальное'
    };
    var chart = new google.visualization.PieChart(document.getElementById('air2'));
     chart.draw(data, options);
   }
  </script>

 </head>
 <body>
 <h2>Статистика</h2>

 <?php echo $this->element('menu') ?>

  <div class="content1" id="air" style="width: 500px; height: 400px; "></div>
  <div class="content1" id="air2" style="width: 500px; height: 400px; "></div>
 </body>