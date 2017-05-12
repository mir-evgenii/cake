<head>
  <meta charset="utf-8">

  <script src="https://www.google.com/jsapi"></script>
  <script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
     ['Тариф', 'Кол-во пользователей'],
     ['Безлимитный',     <?= $stats[0] ?>],
     ['Комбинированный',     <?= $stats[1] ?>],
     ['Повременный',     <?= $stats[2] ?>],
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
     ['Безлимитный',     <?= $bill[0][0][0]['bill_sum'] ?>],
     ['Комбинированный',     <?= $bill[1][0][0]['bill_sum'] ?>],
     ['Повременный',     <?= $bill[2][0][0]['bill_sum'] ?>]
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
 <h2>Статистика телефона</h2>

 <?php echo $this->element('menu') ?>

  <div class="content1" id="air" style="width: 500px; height: 400px; "></div>
  <div class="content1" id="air2" style="width: 500px; height: 400px; "></div>
 </body>