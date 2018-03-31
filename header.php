<?php 
    define('BASEPATH', true);

    include_once "system/config.php";

    if($_SERVER['PHP_SELF'] != '/hackathon/add_students.php') { unset($_SESSION['STUDENT']);}
   //print_r($_SESSION);
    if (isset($_SESSION['SCHOOL']['ID']) and isset($_SESSION['SCHOOL']['USERNAME'])) {
        $school_id = $_SESSION['SCHOOL']['ID'];
        $school_username = $_SESSION['SCHOOL']['USERNAME'];
        $sql = "SELECT `id`, `name`, `address`, `district`, `tehsil`, `pincode`, `phone_number`, `landline_number`, `email`, `police_station`, `priciple_name`, `vice_principle_name`, `school_representative_name`, `school_representative_phone_number`, `school_representative_landline_number`, `school_representative_email`, `school_affiliation_code`, `school_code`, `verification_code`, `school_username`, `pwd`, `board` FROM `schools` WHERE id = $school_id AND school_username = '$school_username'";
        //redirect('index.php?error='.$sql);
        $schoolDetails = mysqli_query($conn, $sql);

        $schoolDetails = mysqli_fetch_assoc($schoolDetails);

    } else if(isset($_SESSION['ADMIN']['ID'])) {
      $sql = "SELECT `name` from `admin` where id = $_SESSION[ADMIN][ID]";

      $adminDetails = mysqli_query($conn, $sql);

      $adminDetails = mysqli_fetch_assoc($adminDetails);
    }


  
?>
<!DOCTYPE html>
<html lang="en">
<head>


<style>
#google_translate_element{margin-top:2px;
        padding-right:5px;
    padding-left:3px;
    
    }
  
  

div#google_translate_element div.goog-te-gadget-simple{font-size:20px;}

div#google_translate_element div.goog-te-gadget-simple{background-color:black;  border-radius:10px;}

div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span{color: lightgreen;}

div#google_translate_element div.goog-te-gadget-simple a.goog-te-menu-value span:hover{color:yellow;}

.navbar-nav{ font-size:18px;}


.collapse navbar-collapse justify-content-end navbar-nav{
  margin-top:8%
  
  
}






</style>
<title>Hackathon - Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/Footer-with-button-logo.css"><link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script src="js/script.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<header class="navbar navbar-expand-md bg-dark navbar-dark">
 
    <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse" data-target="#leftSidebar"><span class="navbar-toggler-icon" aria-control="sidebarLeft" aria-expanded="false"></span></button>
 
  <a href="index.php" class="navbar-brand"> RISING FUTURE</a>
  
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#mainNavigationContent"><span class="navbar-toggler-icon"></span></button>

  <div class="collapse navbar-collapse justify-content-end" id="mainNavigationContent">
 <ul class="navbar-nav">
        <li class="nav-item">
          <a href="index.php" class="nav-link"> HOME</a>
        </li>
        <li class="nav-item">
          <a href="announcement.php" class="nav-link">ANNOUNCEMENTS</a>
        </li>
        <li class="nav-item">
          <div id="google_translate_element" class="form-control nav-link bg-dark bd-dark border-0"></div><script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,gu,hi', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
        </li>
      </ul>
      <div class="justify-content-end" align="right">
        <?php if (isset($_SESSION['SCHOOL']['ID']) and isset($_SESSION['SCHOOL']['USERNAME'])) {?>
          <ul class="navbar-nav">
          <li class="navbar-item">
            <a href="logout.php" class="btn btn-outline-success">Logout</a>
          </li>
        </ul>
        <?php } else if(isset($_SESSION['ADMIN']['ID'])) { ?>
          <ul class="navbar-nav">
          <li class="navbar-item">
            <a href="logout.php" class="btn btn-outline-success">Logout</a>
          </li>
        </ul>
        <?php } else { ?>
          <ul class="navbar-nav">
          <li class="navbar-item">
            <a href="register.php" class="btn btn-outline-success">Register</a>
          </li>
          <li class="navbar-item">
            <a href="login.php" class="btn btn-outline-success ml-2">Login</a>
          </li>
        </ul>
        <?php } ?>
  </div>
</header>


<div class="container-fluid">
  <div class="row flex-xl-nowrap">
    
      <sidebar class="flex-column navbar-expand-md navbar-dark bg-dark col-12 col-md-3 col-xl-2 bd-sidebar py-5">
  <div class="collapse navbar-collapse" id="leftSidebar">
     <ul class="navbar-nav flex-column">
      <?php if (isset($_SESSION['SCHOOL']['ID']) and isset($_SESSION['SCHOOL']['USERNAME'])){ ?>
        <li class="navbar-item">
          <a href="#" class="nav-link">My Profile</a>
        </li>
        <li class="navbar-item">
          <a href="add_students.php?tab=basicDetails" class="nav-link">Add Student Details</a>
        </li>
        <li class="navbar-item">
          <a href="edit_students.php" class="nav-link">Modify Student Details</a>
        </li>
        <li class="navbar-item">
          <a href="#" class="nav-link">Search Students</a>
        </li>
      <?php } elseif(isset($_SESSION['ADMIN']['ID'])) { ?>
          <li class="navbar-item">
          <a href="#" class="nav-link">My Profile</a>
        </li>
        <li class="navbar-item">
          <a href="add_department_type.php" class="nav-link">Add New Departments Name</a>
        </li>
        <li class="navbar-item">
          <a href="add_department.php" class="nav-link">Add New Departments</a>
        </li>
        <li class="navbar-item">
          <a href="edit_students.php" class="nav-link">Modify Departments</a>
        </li>
        <li class="navbar-item">
          <a href="#" class="nav-link">Search departments</a>
        </li>
      <?php } elseif ($_SERVER['PHP_SELF'] == '/hackathon/studentDashboard.php') { ?>
      
        <div class="navbar-brand">Filter Student</div>
       
        <li class="navbar-item">
          <label class="control-label navbar-text" for="searchStudent" >Search Student Name</label>
          <input type="text" name="searchStudent" id="searchStudent" placeholder="Search Student" class="form-control">
        </li>
     
        <li class="navbar-item">
          <label class="control-label navbar-text" for="Select District">District/Tehsil</label>
          <br>
          <label class="control-label navbar-text" for="selectDistrict" >District</label>
          <select class="form-control" id="selectDistrict" name="selectDistrict">
            <option value="">Select District</option>
          </select>
          <label class="control-label navbar-text" for="selectTehsil"></label>
          <select class="form-control" id="selectTehsil" name="selectTehsil">
            <option value="">Select Tehsil</option>
          </select>
        </li>
        <li class="navbar-item">
          <label class="control-label navbar-text" for="searchStudent" >Search By School</label>
          <input type="text" name="searchSchool" id="seachSchool" placeholder="Search School" class="form-control">
        </li>
        
        <?php
      } else { ?>
    <hr    width="200px"      size="4"        color="yellow">
        <li class="navbar-item">
        <a href="studentDashboard.php" class="nav-link">STUDENT DASH BOARD</a>
        </li>
        <li class="navbar-item">
          <a href="edu.php" class="nav-link">EDUCTION REPORT</a>
        </li>
        <li class="navbar-item">
          <a href="dis1.php" class="nav-link">DISABLED STUDENTS</a>
        </li>
        <li class="navbar-item">
          <a href="parentportal.php" class="nav-link">  PARENTS PORTAL</a>
        </li>
    <hr    width="200px"      size="4"        color="yellow">
        <li class="navbar-item">
          <h5 class="navbar-brand"> IMPORTANT  LINKS</h5>
          <div class="list-group">
            <a  href="ankit.php" class="nav-link">E-Learning</a>
            <a  href="studentwellfer.php" class="nav-link">  STUDENT WELFERE </a>
            <a  href="scholarship.php"  class="nav-link"> SCHOLARSHIP</a>
       <a  href="environmentwellfere.php"    class="nav-link"> ENVIRONMENT  WELFERE</a> 
      
          </div>
        </li>
      <?php } ?>
    </ul>
  </div>  
    
</sidebar> 

    <main class="col-12  col-md-9 py-md-3 pl-md-5 bd-content mt-3 mt-md-0">
      <marquee bgcolor="lightblue" scrollamount=" 12"><h3> !!!!!!!   EDUCATION AND  SPORTS FEST  COMMING SOON !!!!</h3></marquee>
  