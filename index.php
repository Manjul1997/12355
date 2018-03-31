<?php include("header.php") ?>
	<div class="main_page">
		<div id="demo" class="carousel slide" data-ride="carousel">
<?php 
      $from = 'haris@gmail.com';
      $fromName = "haris tyagi";
      $to = 'tyagiharis370@gmail.com';
      $replyto = "haaristyagi@gmail.com";
      $subject = 'test mail';
      $message = "A Message Testing Email";
      sendEmail($from, $fromName, $to, $replyto, $subject, $message);

   ?>
  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/carousel/1.jpg"  class="img-fluid" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="img/carousel/2.jpg"  class="img-fluid" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="img/carousel/3.jpg"  class="img-fluid" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

  </div>

  <?php include "system/modules/piechart.php" ?>
  <center><h2> TOP MERITORIOUS STUDENT FROM EACH FIELD  </h2></center>
<div class="container">
<img src="img/c.jpg"  class="img-fluid" alt="students"  border="2px"> 
<img src="img/c1.jpg"  class="img-fluid" alt="students"  border="2px"> 
<img src="img/s.jpg"  class="img-fluid" alt="students"   border="2px">    
</div>
<p>  ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENT ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENT
ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENT
ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENTALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENTss</p>
ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENT
ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENT
ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENT
ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENT
ALL THE MERTORIOUS   ARE FINDED BY ARE WEBSITE FORN GUJARAT GOVERNMENT

</p><br>
<div class="container">

<a href="di2.php" class="btn btn-success " role="button">    LIST OF TOP 200</a>
  <a href="di2.php" class="btn btn-success ml-5" role="button">  LIST TOP 500</a>
  <a href="di2.php" class="btn btn-success ml-5" role="button"> LIST   OF  MORE </a>
  </div>

	</div>

  
</main>
		
 <?php include "footer.php" ?>