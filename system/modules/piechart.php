<center><h3> PERCENTAGE OF MERITORIOUS STUDENTS</h3></center>

<div id="piechart"></div>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);


function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['field', 'score'],
  ['eduction', 9],
  ['sports', 9],
  ['curricullar', 9],
 
]);


  var options = {'title':'Meritirious disrtibution', 'width':550, 'height':400};

  
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>