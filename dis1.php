<?php include "header.php" ?>

<style>

body{
margin:10px;
margin-left:0%;
padding:30px;
background:green;
}
.container a{
 align:center;
 
margin-top:9%;
margin-left:12%;

}

h1{text-align:center;
font-size:20px;
background:lightblue;
border-radius:30px;

}
img{
	
	padding:5px;
	border-radius:50px;
	margin-top:10%;
	background:lightgreen;
}
.center{
	margin-left:50%;
	margin-right:50%;
	
}
</style>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
 
<body>
   <br>
<div class="container"><br>
 
    <h1> MERITORIUS STUDENT WITH  DISABILITY </h1><br>
	<marquee  color="red"><h4> DISABILITY NOT HIDE YOUR TALENT</h4></marquee>
	
<abbr title="meritorious">	<img src= "img/ad.jpg" class="img-fluid"  alt="students"style="width:240px" "height:240px" border="3px">
	<img src= "img/da.jpg"   class="img-fluid"alt="students"    style="width:280px" "height:330px"  border="3px">
	<img src= "img/pa.jpg"   class="img-fluid"alt="students"    style="width:280px" "height:330px"  border="3px"></abbr>
<marquee><p>  DREAM BIG TO ACCHIEVE BIG</p></marquee>
	
<abbr title="click here">	<a href="disportal.php" class="btn btn-info" role="button"> EDUCATION FIELD</a>
	<a href="disportal.php" class="btn btn-info" role="button"> SPORTS FIELD</a>
	<a href="disportal.php" class="btn btn-info" role="button"> CURRICULLAR FIELD</a></abbr></div><br>
	<hr>
	<div id="piechart">
	
	
	</div>





<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">

google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable([
  ['Task', 'Hours per Day'],
  ['education', 10],
  ['sports', 10],
  ['curricular', 10],
  ['disable student in education', 6],
  ['disable student in sports', 7],
  ['disable  student in curricular', 7],

]);

  // Optional; add a title and set the width and height of the chart
  var options = {'title':' PERCENTAGE OF MERITORIOUS', 'width':550, 'height':400};

  // Display the chart inside the <div> element with id="piechart"
  var chart = new google.visualization.PieChart(document.getElementById('piechart'));
  chart.draw(data, options);
}
</script>

	
<hr>	
  
<?php include "footer.php" ?>
