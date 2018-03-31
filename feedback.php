<!DOCTYPE html>
<html lang="en">
<head>
<style>  .container{background:lightblue;border-radius:45px;}
h2{text-align:center;}

.but{margin-left:50%;}

  </style>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2> FEEDBACK</h2>
  <form onsubmit="alert('you are sure  to submit the details?')">
    <div class="form-group">
      <div class="col-xs-20">
        <label for="NAME">NAME</label>
         <input class="form-control" id="NAME"  placeholder="MOHIT"  type="text">
      </div></div>
	  <div class="form-group">
      <div class="col-xs-20">
        <label for="AADAHAR"> AADAHAR</label>
        <input class="form-control" id=" AADAHAR" placeholder="01T52545 " type="text">
      </div></div>
	  <div class="form-group">
      <div class="col-xs-20">
      <label for="USER TYPE">USER TYPE:</label>
      <select class="form-control" id="USER TYPE">
        <option> STUDENTS</option>
        <option>PARENTS</option>
        <option> SCHOOL</option>
        <option>SITE USER</option>
      </select></div></div>

<div class="form-group">
      <div class="col-xs-20">
      <label for="FEEDBACK TYPE">FEEDBACK TYPE:</label>
      <select class="form-control" id="FEEDBACK TYPE">
        <option>COMPLAIN </option>
        <option> APPRECIATION</option>
        <option> SUGGESTION</option>
        <option> QUESTIONING</option>
      </select></div></div>

	<div class="form-group">  
<div class="col-xs-20">
        <label for="SUBJECT"> SUBJECT</label>
        <input class="form-control" id=" SUBJECT" placeholder="FEEDBACK IN GENERAL" type="text">
      </div></div>

<label>DISCRIPTION:</label>
<textarea rows="10"   cols="160" placeholder="write complin in breify"></textarea>
	<div class="form-group">     
<div class="col-xs-20">
       
<div class="but">
<button type="submit" class="btn-success" value="submit">SUBMIT</button>
</div>	  

	 
  </form>
</div>

</body>
</html>






