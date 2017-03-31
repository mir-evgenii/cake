

<?php
$result = count($stats);
debug($stats);
?>
<?php foreach ($stats as $stat) : ?>
<?php $result = count($stat); 
if($result == 'null'){
	$result = 0;
	array_push($result_arr, $result);
}else{
	array_push($result_arr, $result);
}

?>
<ul>
<li>
<?php echo $result;
?>
</li>
</ul>
<?php endforeach;
$st = 78.09;
?>




<head>
  <meta charset="utf-8">
  <title>Круговая диаграмма</title>
  <script src="https://www.google.com/jsapi"></script>
  <script>
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
     ['Газ', 'Объём'],
     ['Азот',     <?= $st ?>],
     ['Кислород', 20.95],
     ['Аргон',    0.93],
     ['Углекислый газ', 0.03]
    ]);
    var options = {
     title: 'Состав воздуха',
     is3D: true,
     pieResidueSliceLabel: 'Остальное'
    };
    var chart = new google.visualization.PieChart(document.getElementById('air'));
     chart.draw(data, options);
   }
  </script>
 </head>
 <body>
 <h2>Статистика</h2>
  <div id="air" style="width: 500px; height: 400px;"></div>
 </body>