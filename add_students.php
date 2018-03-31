<?php
include "system/config.php";

?>
<?php
if (isset($_POST))
{
    # code...
    
}

if (isset($_POST['submitBasicDetails']))
{

    $fname = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lname = mysqli_real_escape_string($conn, $_POST['lastName']);
    $fatherName = mysqli_real_escape_string($conn, $_POST['fatherName']);
    $motherName = mysqli_real_escape_string($conn, $_POST['motherName']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $district_id = mysqli_real_escape_string($conn, $_POST['district_id']);
    $tehsil_id = mysqli_real_escape_string($conn, $_POST['tehsil_id']);
    $residentialAddress = mysqli_real_escape_string($conn, $_POST['residentialAddress']);
    $isAddressSame = mysqli_real_escape_string($conn, $_POST['isAddressSame']);
    $permanentAddress = mysqli_real_escape_string($conn, $_POST['permanentAddress']);
    $guardianName = mysqli_real_escape_string($conn, $_POST['guardianName']);
    $guardianPhoneNumber = mysqli_real_escape_string($conn, $_POST['guardianPhoneNumber']);
    $guardianEmailAddress = mysqli_real_escape_string($conn, $_POST['guardianEmailAddress']);
    $studentClass = mysqli_real_escape_string($conn, $_POST['studentClass']);
    $studentAadhaarNumber = mysqli_real_escape_string($conn, $_POST['studentAadhaarNumber']);

    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['fname'] = $fname;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['lname'] = $lname;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['fatherName'] = $fatherName;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['motherName'] = $motherName;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['dob'] = $dob;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['gender'] = $gender;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['districtName'] = $district_id;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['tehsilName'] = $tehsil_id;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['residentialAddress'] = $residentialAddress;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['isAddressSame'] = $isAddressSame;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['permanentAddress'] = $permanentAddress;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['guardianName'] = $guardianName;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['guardianPhoneNumber'] = $guardianPhoneNumber;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['guardianEmailAddress'] = $guardianEmailAddress;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentClass'] = $studentClass;
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentAadhaarNumber'] = $studentAadhaarNumber;
    $studentId = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentId']  = date('Y').$_SESSION['SCHOOL']['ID'].$studentClass.$studentAadhaarNumber; 




    redirect('add_students.php?tab=academicDetails');

}
else if (isset($_POST['academicDetailSubmit']))
{

    foreach ($_POST as $key => $value)
    {

        if (ctype_digit($key[-1]))
        {
            $expKey = explode('_', $key);
            echo $expKey[0];
            if ($expKey[0] == 'obtainedMarks')
            {
                $_SESSION['STUDENT']['FORM']['REGISTRATION']['ACADEMIC']['CLASS'][$key[-3]][$key[-1]]['OBTAINED'] = mysqli_real_escape_string($conn, $value);
            }
            else if ($expKey[0] == 'totalMarks')
            {
                $_SESSION['STUDENT']['FORM']['REGISTRATION']['ACADEMIC']['CLASS'][$key[-3]][$key[-1]]['TOTAL'] = mysqli_real_escape_string($conn, $value);
            }
        }
    }
    redirect('add_students.php?tab=sportsActivity');
    # code...
    
}
else if (isset($_POST['sportDetailSubmit']))
{

    //for Outdoor activities
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['cricket'] = mysqli_real_escape_string($conn, $_POST['cricket']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['football'] = mysqli_real_escape_string($conn, $_POST['football']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['hockey'] = mysqli_real_escape_string($conn, $_POST['hockey']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['golf'] = mysqli_real_escape_string($conn, $_POST['golf']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['tennis'] = mysqli_real_escape_string($conn, $_POST['tennis']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['kho_kho'] = mysqli_real_escape_string($conn, $_POST['kho_kho']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['handball'] = mysqli_real_escape_string($conn, $_POST['handball']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['kabaddi'] = mysqli_real_escape_string($conn, $_POST['kabaddi']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['volley_ball'] = mysqli_real_escape_string($conn, $_POST['volley_ball']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['leg_cricket'] = mysqli_real_escape_string($conn, $_POST['leg_cricket']);

    

    // For iNDOOR Activity
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['carrom'] = mysqli_real_escape_string($conn, $_POST['carrom']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['chess'] = mysqli_real_escape_string($conn, $_POST['chess']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['batminton'] = mysqli_real_escape_string($conn, $_POST['batminton']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['professional_kabaddi'] = mysqli_real_escape_string($conn, $_POST['professional_kabaddi']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['squash'] = mysqli_real_escape_string($conn, $_POST['squash']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['pool'] = mysqli_real_escape_string($conn, $_POST['pool']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['table_tennis'] = mysqli_real_escape_string($conn, $_POST['table_tennis']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['karate'] = mysqli_real_escape_string($conn, $_POST['karate']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['snooker'] = mysqli_real_escape_string($conn, $_POST['snooker']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['boxing'] = mysqli_real_escape_string($conn, $_POST['boxing']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['wrestling'] = mysqli_real_escape_string($conn, $_POST['wrestling']);

   // Sport Atheletics 
   

    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_100m'] = mysqli_real_escape_string($conn, $_POST['race_100m']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_200m'] = mysqli_real_escape_string($conn, $_POST['race_200m']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_400m'] = mysqli_real_escape_string($conn, $_POST['race_400m']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_500m'] = mysqli_real_escape_string($conn, $_POST['race_500m']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_800m'] = mysqli_real_escape_string($conn, $_POST['race_800m']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_relay_race'] = mysqli_real_escape_string($conn, $_POST['race_relay_race']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_marathon'] = mysqli_real_escape_string($conn, $_POST['race_marathon']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_hurdle_race'] = mysqli_real_escape_string($conn, $_POST['race_hurdle_race']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['shotput'] = mysqli_real_escape_string($conn, $_POST['shotput']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['javelin'] = mysqli_real_escape_string($conn, $_POST['javelin']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['jump_long'] = mysqli_real_escape_string($conn, $_POST['jump_long']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['jump_high'] = mysqli_real_escape_string($conn, $_POST['jump_high']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['jump_tripple'] = mysqli_real_escape_string($conn, $_POST['jump_tripple']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['discthrow'] = mysqli_real_escape_string($conn, $_POST['discthrow']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['shooting'] = mysqli_real_escape_string($conn, $_POST['shooting']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['archery'] = mysqli_real_escape_string($conn, $_POST['archery']);
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['swimming'] = mysqli_real_escape_string($conn, $_POST['swimming']);

    redirect('add_students.php?tab=extraCurricularActivity');
    
}
else if (isset($_POST['extracurricularSubmit']))
{
    $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['painting'] = mysqli_real_escape_string($conn, $_POST['painting']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['music'] = mysqli_real_escape_string($conn, $_POST['music']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['dancing'] = mysqli_real_escape_string($conn, $_POST['dancing']);;

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['quiz'] = mysqli_real_escape_string($conn, $_POST['quiz']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['spell_bee'] = mysqli_real_escape_string($conn, $_POST['spell_bee']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['writing'] = mysqli_real_escape_string($conn, $_POST['writing']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['recitation'] = mysqli_real_escape_string($conn, $_POST['recitation']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['crafting'] = mysqli_real_escape_string($conn, $_POST['crafting']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['debate'] = mysqli_real_escape_string($conn, $_POST['debate']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['speech'] = mysqli_real_escape_string($conn, $_POST['speech']);

$_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['scout'] = mysqli_real_escape_string($conn, $_POST['scout']);



redirect('add_students.php?tab=imageUpload');
    
}
else if (isset($_POST['imageUploadSubmit']))
{
    mkdir("./uploads/temp/".$_SESSION['SCHOOL']['ID']."/".$_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentId']."/", 0777, true);
    $target_dir = "./uploads/temp/".$_SESSION['SCHOOL']['ID']."/".$_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentId']."/";
    $target_file = $target_dir . basename($_FILES["studentImage"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["studentImage"]["tmp_name"]);
    if ($check === false)
    {
        $uploadOk = 0;
        redirect('add_students.php?tab=imageUpload&error=filenotanimage');
    }
    elseif ($_FILES["studentImage"]["size"] > 150000)
    {
        $uploadOk = 0;
        redirect('add_students.php?tab=imageUpload&error=imageAlreadyExist');
    }
    elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg")
    {
        $uploadOk = 0;
        redirect('add_students.php?tab=imageUpload&error=wrongfileextension');
    }
    elseif ($uploadOk == 0)
    {
        redirect('add_students.php?tab=imageUpload&error=sorryFileNotUploaded');
    }
    else
    {
        if (move_uploaded_file($_FILES["studentImage"]["tmp_name"], $target_file))
        { 
            $_SESSION['STUDENT']['FORM']['REGISTRATION']['IMAGEUPLOAD']['URL'] = $target_dir.$_FILES["studentImage"]['name'];
            redirect('add_students.php?tab=imageUpload&sucess=true');
        }
        else
        {
            rmdir($target_dir);
            redirect('add_students.php?tab=imageUpload&error=technicalError');
        }
    }

}
elseif (isset($_POST['saveStudentDetail']))
{
    // Fetch School Information 
    
    $getSchoolInfo = "SELECT * FROM schools WHERE id = ".$_SERVER['SCHOOL']['ID'];
    $schoolInfo = mysqli_query($conn, $getSchoolInfo);
    $schoolInfo = mysqli_fetch_all($schoolInfo, MSQLI_ASSOC);

    // Database Table names and Other SQL Queries 
     

    $schoolStudentInfoTableName = 'student_info_'.$_SESSION['SCHOOL']['ID'].'_'.$schoolInfo['tehsil'].'_'.$schoolInfo['district'];
    $schoolSportIndoorTableName = 'school_sports_indoor_'.$_SESSION['SCHOOL']['ID'].'_'.$schoolInfo['tehsil'].'_'.$schoolInfo['district'];
    $schoolSportOutdoorTableName = 'school_sports_indoor_'.$_SESSION['SCHOOL']['ID'].'_'.$schoolInfo['tehsil'].'_'.$schoolInfo['district'];
    $schoolSportAtheleticsTableName = 'school_sports_atheletics_'.$_SESSION['SCHOOL']['ID'].'_'.$schoolInfo['tehsil'].'_'.$schoolInfo['district'];
    $schoolExtraCurricularActivity = 'school_activity_table_'.$_SESSION['SCHOOL']['ID'].'_'.$schoolInfo['tehsil'].'_'.$schoolInfo['district'];

    // Basic Details Data
    

    $fname = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['fname'];
    $lname = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['lname'];
    $fatherName = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['fatherName'];
    $motherName = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['motherName'];
    $dob = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['dob'];
    $gender = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['gender'];
    $districtName = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['districtName'];
    $tehsilName = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['tehsilName'];
    $residentialAddress = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['residentialAddress'];
    $isAddressSame = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['isAddressSame'];
    $permanentAddress = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['permanentAddress'];
    $guardianName = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['guardianName'];
    $guardianPhoneNumber = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['guardianPhoneNumber'];
    $guardianEmailAddress = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['guardianEmailAddress'];
    $studentClass = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentClass'];
    $studentAadhaarNumber = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentAadhaarNumber'];
    $studentId = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentId']; 
    
    // Acadenuc Detail Data 
    
    $studentAcademicDetailData = $_SESSION['STUDENT']['FORM']['REGISTRATION']['ACADEMIC']['CLASS'];

    // Sports Indoor Detail Data
      
    $carrom = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['carrom'];
    $chess = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['chess'];
    $batminton = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['batminton'];
    $professional_kabaddi = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['professional_kabaddi'];
    $squash = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['squash'];
    $pool = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['pool'];
    $table_tennis = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['table_tennis'];
    $karate = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['karate'];
    $snooker = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['snooker'];
    $boxing = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['boxing'];
    $wrestling = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['INDOOR']['wrestling'];

    // Sports Outdoor Detail Data
    
    $cricket = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['cricket'];
    $football = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['football'];
    $hockey = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['hockey'];
    $golf = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['golf'];
    $tennis = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['tennis'];
    $kho_kho = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['kho_kho'];
    $handball = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['handball'];
    $kabaddi = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['kabaddi'];
    $volley_ball = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['OUTDOOR']['volley_ball'];

    // Sports Atheletics Detail Data

      $race_100m = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_100m'];
      $race_200m = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_200m'];
      $race_400m = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_400m'];
      $race_500m = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_500m'];
      $race_800m = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_800m'];
      $race_relay_race = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_relay_race'];
      $race_marathon = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_marathon'];
      $race_hurdle_race = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['race_hurdle_race'];
      $shotput = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['shotput'];
      $javelin = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['javelin'];
      $jump_long = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['jump_long'];
      $jump_high = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['jump_high'];
      $jump_tripple = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['jump_tripple'];
      $discthrow = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['discthrow'];
      $shooting = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['shooting'];
      $archery = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['archery'];
      $swimming = $_SESSION['STUDENT']['FORM']['REGISTRATION']['SPORT']['SPORTS_ATHELETICS']['swimming'];

    // Extra Curricular Activity Detail Data
    
    $painting = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['painting'];
    $music = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['music'];
    $dancing = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['dancing'];
    $quiz = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['quiz'];
    $spell_bee = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['spell_bee'];
    $writing = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['writing'];
    $recitation = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['recitation'];
    $crafting = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['crafting'];
    $debate = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['debate'];
    $speech = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['speech'];
    $scout = $_SESSION['STUDENT']['FORM']['REGISTRATION']['EAA']['scout'];

    // Image Upload Data
    
    $imageUrl = $_SESSION['STUDENT']['FORM']['REGISTRATION']['IMAGEUPLOAD']['URL'];

    // Insert Data To Database
    
   $basicDetailInsert = "INSERT INTO $schoolStudentInfoTableName ('std_id', 'student_fname', 'student_lname', 'father_name', 'mother_name', 'dob', 'gender', 'school_id', 'address_residence', 'address_permanent', 'class', 'guardianName', 'guardianEmail', 'guardian_phone_no', 'school_name', 'education_board', 'tehsil', 'district', 'aadhaarNumber', imageUrl) VALUES ('$studentId', '$fname', '$lname', '$fatherName', '$motherName', '$dob', '$gender', '$schoolInfo[id]', '$residentialAddress', '$permanentAddress', '$studentClass', '$guardianName', '$guardianEmail', '$guardianPhoneNumber', '$schoolInfo[name]',  '$schoolInfo[board]', '$tehsilName', '$districtName', '$studentAadhaarNumber, '$imageUrl');";

    mysqli_query($conn, $basicDetailInsert);
   // Academic Detail Data Insertion
    foreach ($studentAcademicDetailData as $number => $class) {
      $classNo = $number;
      foreach ($class as $subjectNumber => $subjectMarks) {
          $classSubjectId = $subjectNumber;
          foreach ($subjectMarks as $marks) {
            $marksObtained = $marks['OBTAINED'];
            $marksTotal = $marks['TOTAL'];

            $insertAcademicMarks = "INSERT INTO $schoolAcademicMarksTableName (`std_id`, `class`, `subject`, `totalMarks`, `obtainedMarks`) VALUES ('$studentId', '$classNo', '$classSubjectId', '$marksObtained', '$marksTotal');";

            mysqli_query($conn, $insertAcademicMarks);
          }

      }
    }

    $sportsIndoorDetailInsert = "INSERT INTO $schoolSportIndoorTableName (`std_id`, `carrom`, `chess`, `badminton`, `professional_kabaddi`, `squash`, `pool`, `table_tennis`, `cycling`, `karate`, `snooker`, `boxing`, `wrestling`) VALUES ('$studentId', '$carrom', '$chess', '$badminton', '$professional_kabaddi', '$squash'. '$pool', '$table_tennis', '$cycling', '$karate', '$snooker', '$boxing', '$wrestling');";

    mysqli_query($conn, $sportsIndoorDetailInsert);

    $sportsOutdoorDetailInsert = "INSERT INTO `school_outdoor_1_2_12`(`id`, `std_id`, `cricket`, `football`, `hockey`, `golf`, `tennis`, `kho_kho`, `handball`, `kabaddi`, `volley_ball`, `leg_cricket`) VALUES ('$studentId', '$cricket', '$football', '$hockey','$golf', '$tennis', '$kho_kho', '$handball', '$kabaddi', '$volley_ball', '$leg_cricket' );";
    
    mysqli_query($conn, $sportsOutdoorDetailInsert);

    $sportAtheleticDetailInsert = "INSERT INTO `sports_atheletics`(`id`, `std_id`, `race_100m`, `race_200m`, `race_400m`, `race_500m`, `race_800m`, `race_relay_race`, `race_marathon`, `race_hurdle_race`, `shotput`, `javeli`, `jump_long`, `jump_high`, `jump_tripple`, `discthrow`, `shooting`, `archery`, `swimming`) VALUES (`$studentId`, `$race_100m`, `$race_200m`, `$race_400m`, `$race_500m`, `$race_800m`, `$race_relay_race`, `$race_marathon`, `$race_hurdle_race`, `$shotput`, `$javeli`, `$jump_long`, `$jump_high`, `$jump_tripple`, `$discthrow`, `$shooting`, `$archery`, `$swimming`)";

    mysqli_query($conn, $sportAtheleticDetailInsert);

    $extraCurricularActivityInsert = "INSERT INTO `activity_table`(`id`, `std_id`, `painting`, `music`, `dancing`, `quiz`, `spell_bee`, `writing`, `recitaton`, `crafting`, `debate`, `speech`, `scout`) VALUES (`$studentId`, `$painting`, `$music`, `$dancing`, `$quiz`, `$spell_bee`, `$writing`, `$recitaton`, `$crafting`, `$debate`, `$speech`, `$scout`)";

    mysqli_query($conn, $extraCurricularActivityInsert);
    unset($_SESSION['STUDENT']);
    redirect('add_students.php?tab=basicDetails');

}
else
{
?>
      
      <?php include "header.php" ?>

<div class="content">
  <div class="container-fluid">
    <div class="jumbotron" style="background: transparent !important;">
      <h3>Add Student Details
      </h3>
      <hr>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link <?php echo get_tab($_GET['tab'], "basicDetails");
    echo get_tab("", ""); ?> " data-toggle="tab" href="#basicDetails" id="basicDetailsTab">Basic Details
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo get_tab($_GET['tab'], "academicDetails") ?>" data-toggle="tab" href="#academicDetails" id="academicDetailsTab">Academic Details
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo get_tab($_GET['tab'], "sportsActivity") ?>" data-toggle="tab" href="#sportsActivity" id="sportsActivityTab">Sports Activity
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo get_tab($_GET['tab'], "extraCurricularActivity") ?>" data-toggle="tab" href="#extraCurricularActivity" id="extraCurricularActivityTab">Extra Curricular Activity
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo get_tab($_GET['tab'], "imageUpload") ?>" data-toggle="tab" href="#imageUpload" id="imageUploadTab">Image upload
          </a>
        </li>
      </ul>
      <div class="tab-content">
        <?php
    if ($_GET['tab'] == "basicDetails")
    {
?>
  
    <script>
      $(document).ready(function () {
        $.get("<?php echo htmlspecialchars("system/ajaxData.php") ?>", {getDistrict: true}, function(response) {
        $("#districtName").html(response);
        });

        $("#districtName").change(function () {
          var districtId = $('#districtName').val();
          $.get("<?php echo htmlspecialchars('system/ajaxData.php') ?>", {getTehsil: true, district_id: districtId}, function(response) {
            $('#tehsilName').html(response);
          });
        });

        $('#isAddressSame').on({
    change: function () {
      if(this.checked) {
        $('#permanentAddress').html("");
        $('#permanentAddress').html($('#residentialAddress').val());
        $('#permanentAddress').attr("disabled", "disabled");
      } else {
        $('#permanentAddress').html("");
        $('#permanentAddress').removeAttr('disabled');
      }
    }
  });

      });
      
    </script>
    <?php 
      $studentBasicDetails = $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']; ?>
        <form action="add_students.php" method="post" enctype="multipart/form-data">
          <div id="basicDetails" class="container tab-pane active">
            <br>
            <h3>Basic Details
            </h3>
            <div class="form-group">
              <label class="control-label col-sm-2" for="firstName">Student Firstname:
              </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="firstName" placeholder="Enter First Name" name="firstName" value="<?php echo $studentBasicDetails['fname']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="lastName">Student Last name:
              </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name" name="lastName" value="<?php echo $studentBasicDetails['lname']; ?>">
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-sm-2" for="fatherName">Father name:
              </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="fatherName" placeholder="Enter Father's Name" name="fatherName" value="<?php echo $studentBasicDetails['fatherName']; ?>">
              </div>
            </div> 
            <div class="form-group">
              <label class="control-label col-sm-2" for="motherName">Mother name:
              </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="motherName" placeholder="Enter Mother's Name" name="motherName" value="<?php echo $student_info['BASIC']['motherName'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="dob">Date Of Birth:
              </label>
              <div class="col-sm-10">
                <input type="date" class="form-control" id="dob" min="1900-01-01" max="<?php echo date('Y-m-d'); ?>" placeholder="Select Date Of Birth" name="dob" value="<?php echo $student_info['BASIC']['dob'] ?>">
              </div>
            </div>
            <script>
              $('#dob').val('<?php echo $_SESSION['STUDENT']['FORM']['BASIC']['dob'] ?>');
            </script>  
            <div class="form-group">
              <label class="control-label col-sm-2" for="gender">Gender:
              </label>
              <div class="col-sm-10">
                <label class="control-label">
                  <input type="radio" class="form-control" id="gender" value="1" name="gender">Male
                </label>
                <label class="control-label">
                  <input type="radio" class="form-control" id="gender" value="2" name="gender">Female
                </label>
                <label class="control-label">
                  <input type="radio" class="form-control" id="gender" value="3" name="gender">Other
                </label>
              </div>
            </div>
            <script>
              $('#gender').val('<?php echo $_SESSION['STUDENT']['FORM']['BASIC']['gender'] ?>');
            </script> 
            <div class="form-group">
              <label class="control-label col-sm-2" for="districtName">District:
              </label>
              <div class="col-sm-10">
                <select id="districtName" class="form-control" name="districtName" >
                  <option default>Select District</option>
                </select>
              </div>
            </div>
            <script>
              $('#districtName').val('<?php echo $_SESSION['STUDENT']['FORM']['BASIC']['districtName'] ?>');
            </script>
            <div class="form-group">
              <label class="control-label col-sm-2" for="tehsilName">Tehsil:
              </label>
              <div class="col-sm-10">
                <select class="form-control" id="tehsilName" class="tehsilName" >
                  <option default>Select Tehsil
                  </option>
                </select>
              </div>
            </div>
            <script>
              $('#tehsilName').val('<?php echo $_SESSION['STUDENT']['FORM']['BASIC']['tehsilName'] ?>');
            </script>
            <div class="form-group">
              <label class="control-label col-sm-2" for="residentialAddress">Residential Address:
              </label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="4" name="residentialAddress" placeholder="Enter Residential Address" id="residentialAddress"  value="<?php echo $student_info['BASIC']['residentialAddress'] ?>">
                </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="isAddressSame">
                <input type="checkbox" value="1" value="<?php echo $student_info['BASIC']['isAddressSame'] ?>" name="isAddressSame" id="isAddressSame">Same As Residential
              </label>
            </div>
            <script>
              $('#isAddressSame').val('<?php echo $_SESSION['STUDENT']['FORM']['BASIC']['isAddressSame'] ?>');
            </script>
            <div class="form-group">
              <label class="control-label col-sm-2" for="permanentAddress">Permanent Address:
              </label>
              <div class="col-sm-10">
                <textarea class="form-control" rows="4" name="permanentAddress" placeholder="Enter Permanent Address" id="permanentAddress" value="<?php echo $student_info['BASIC']['permanentAddress'] ?>">
                </textarea>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="guardianName">Guardian Name:
              </label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="guardianName" placeholder="Enter Guardian Name" name="guardianName" value="<?php echo $student_info['BASIC']['guardianName'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="guardianPhoneNumber">Guardian Phone Number:
              </label>
              <div class="col-sm-10">
                <input type="number" class="form-control" id="guardianPhoneNumber" placeholder="Enter Guardian Phone Number" name="guardianPhoneNumber" value="<?php echo $student_info['BASIC']['guardianPhoneNumber'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="guardianEmailAddress">Guardian Email Address:
              </label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="guardianEmailAddress" placeholder="Enter Guardian Email Address" name="guardianEmailAddress" value="<?php echo $student_info['BASIC']['guardianEmailAddress'] ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="studentClass">Class :
              </label>
              <div class="col-sm-10">
                <select class="form-control" id="studentClass" name="studentClass" >
                  <option default>Select Student Class
                  </option>
                  <option value="1">Class 1
                  </option>
                  <option value="2">Class 2
                  </option>
                  <option value="3">Class 3
                  </option>
                  <option value="4">Class 4
                  </option>
                  <option value="5">Class 5
                  </option>
                  <option value="6">Class 6
                  </option>
                  <option value="7">Class 7
                  </option>
                </select>
              </div>
              <script>
                $('#studentClass').val('<?php echo $_SESSION['STUDENT']['FORM']['BASIC']['studentClass'] ?>');
              </script>
            </div>
            <div class="form-group">
               <label class="control-label col-sm-2" for="studentAadhaarNumber">Aadhaar Number :
              </label>
              <div class="col-sm-10">
                <input type="number" max=12 class="form-control" id="studentAadhaarNumber" name="studentAadhaarNumber" placeholder="Student Aadhaar Number">
              </div>
             </div>
            <div class="form-group">
              <div class="col-sm-10">
                <button type="submit" class="form-control btn btn-outline-success" id="submitBasicDetails" name="submitBasicDetails">Submit
                </button>
              </div>
             </div>
            </form>
          <?php
    }
    elseif ($_GET['tab'] == "academicDetails")
    {
?>
    <script>
      $(document).ready(function() {
        $.get("<?php echo htmlspecialchars('system/ajaxData.php') ?>", {showAcademicClass: true}, function(response) {
          $("#academicAccordion").html(response);
        });
       
         /*$('#academicDetailsForm').on(
          {
            'submit': function(e) {
              e.preventDefault();
              console.log('submititng');
              var formData = $('#academicDetailsForm').serialize();
              console.log(formData);
              $.ajax({
                  type: 'POST',
                  url: $('#academicDetailsForm').attr('action'),
                  data: formData,
                  success: function (response) {
                   // console.log(response);
                  }
              })
              return true;
            }
          });*/
      });

      $(document).ajaxComplete(function (){
       
      });

      function changeIdAndAdd(e) {

            var classNumber = $(e).parent().parent().attr("classNumber");
            var subjectId = $(e).val();
            $(e).next().attr("id", "obtainedMarks_"+classNumber+"_"+subjectId+"");
            $(e).next().next().attr("id", "totalMarks_"+classNumber+"_"+subjectId+"");
            $(e).next().attr("name", "obtainedMarks_"+classNumber+"_"+subjectId+"");
            $(e).next().next().attr("name", "totalMarks_"+classNumber+"_"+subjectId+"");
         
            /*$(e).prev().prop("readonly", true);
            $(e).prev().prev().prop("readonly", true);
            $(e).prev().prev().prev().prop("readonly", true);
            $(e).text('Edit'); 
            $(e).attr("onclick", 'editSubjectMarks(this);');*/
         }
/*
         function editSubjectMarks(e) {
          $(e).prev().removeProp("readonly");
          $(e).prev().prev().removeProp("readonly");
          $(e).prev().prev().prev().removeProp("readonly");
          $(e).text('Add'); 
          $(e).attr("onclick", 'changeIdAndAdd(this);');
         }*/
    </script>
          <form id="academicDetailsForm" action="add_students.php" method="post" enctype="multipart/form-data">
            <div id="academicDetails" class="container tab-pane active">
              <br>
              <h3>Add Acedemic Details
              </h3>
              <hr>
              <div class="accordion" id="academicAccordion">
                    
              </div>
              <button type="submit" id="academicDetailSubmit" name="academicDetailSubmit" class="form-control btn btn-outline-primary mt-2">Submit Academic Details</button>
            </div>
          </form>
          <?php
    }
    elseif ($_GET['tab'] == "sportsActivity")
    {

?>
            <form id="academicDetailsForm" action="add_students.php" method="post" enctype="multipart/form-data">
        

          <div id="sportsActivity" class="container tab-pane active">
            <br>
            <h3>Sports Activity Details: 
            </h3>
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <!-- For Indoor Activity -->
                <br>
                <h4>Indoor Activity
                </h4>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="carrom">Carrom Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="carrom" id = "carrom" value = "0" class="form-control">
                  </div>
                </div> 
                <div class="form-group">
                  <label class="control-label col-sm-2" for="chess">Chess Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="chess" id="chess" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="badminton">Badminton Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="badminton" id="badminton" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="professional_kabaddi">Professional Kabaddi Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="professional_kabaddi" value="0" id="professional_kabaddi" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="squash">Squash Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="squash" id="squash" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="pool">Pool Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="pool" id="pool" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="table_tennis">Table Tennis Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="table_tennis" id="table_tennis" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="karate">Karate Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="karate" id="karate" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="snooker">Snooker Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="snooker" id="snooker" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="boxing">Boxing Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="boxing" id="boxing" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="wrestling">Wrestling Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="wrestling" id="wrestling" class="form-control">
                  </div>
                </div>
                <!--<div class="form-group">
                  <label class="control-label col-sm-2" for="activityScout">Scout Marks: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="activityScout" id="activityScout" class="form-control">
                  </div>
                </div>-->
              </div>
              <div class="col-sm-6">
                <!-- For outdoor Activity -->
                <br>
                <h4>Outdoor Activity
                </h4>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="cricket">Cricket: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="cricket" id="cricket" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="football">Football: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="football" id="football" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="hockey">Hockey: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="hockey" id="hockey" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="golf">Golf: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="golf" id="golf" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="tennis">Tennis: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="tennis" id="tennis" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="kho_kho">Kho-Kho: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="kho_kho" id="kho_kho" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="handball">Handball: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="handball" id="handball" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="kabaddi">Kabaddi: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="kabaddi" id="kabaddi" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="volley_ball">Volley Ball: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="volley_ball" id="volley_ball" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="leg_cricket">Leg Cricket: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="leg_cricket" id="leg_cricket" value="0" class="form-control">
                  </div>
                </div>

                <h4>Atheletics</h4>
                <div class="form-group">                
                  <label class="control-label col-sm-2" for="race_100m">Race 100: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="race_100m" id="race_100m" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="race_200m">Race 200: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="race_200m" id="race_200m" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="race_400m">Race 400: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="race_400m" id="race_400m" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="race_500m">Race 500: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="race_500m" id="race_500m" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="race_800m">Race 800: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="race_800m" id="race_800m" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="race_relay_race">Race Relay Race: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="race_relay_race" id="race_relay_race" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="race_marathon">Race Marathon: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="race_marathon" id="race_marathon" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="race_hurdle_race">Race Hurdle Race: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="race_hurdle_race" id="race_hurdle_race" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="shotput">Shotput: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="shotput" id="shotput" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="javelin">Javelin: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="javelin" id="javelin" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="jump_long">Jump Long: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="jump_long" id="jump_long" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="jump_high">Jump High: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="jump_high" id="jump_high" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="jump_tripple">Jump Tripple: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="jump_tripple" id="jump_tripple" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="discthrow">Discthrow: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="discthrow" id="discthrow" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="shooting">Shooting: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="shooting" id="shooting" value="0" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="archery">Archery: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="archery" id="archery" value="0" class="form-control">
                  </div>
                </div><div class="form-group">
                  <label class="control-label col-sm-2" for="swimming">Swimming: 
                  </label>
                  <div class="col-sm-10">
                    <input type="number" name="swimming" id="swimming" value="0" class="form-control">
                  </div>
                </div>
                

              </div>

            </div>

              <div class="form-group">
                  <div class="col-sm-10">
                    <button class="btn btn-outline-success form-control" id="sportDetailSubmit" name="sportDetailSubmit" type="submit" >Submit
                    </button>
                  </div>
                </div>
          </div>
        </form>
          <?php
    }
    elseif ($_GET['tab'] == "extraCurricularActivity")
    {
?>
            <form id="academicDetailsForm" action="add_students.php" method="post" enctype="multipart/form-data">

          <div id="extraCurricularActivity" class="container tab-pane active">
            <br>
            <h3>Extra Curricular Activity Details:
            </h3>
            <hr>
            <div class="form-group">
              <label class="control-label col-sm-2" for="ecaCarrom">Painting Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityPainting" id="activityPainting" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activityMusic">Music Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityMusic" id="activityMusic" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activityDancing">Dancing Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityDancing" id="activityDancing" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activityQuiz">Quiz Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityQuiz" id="activityQuiz" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activitySpellbee">Spell Bee Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activitySpellbee" id="activitySpellbee" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activityWriting">Writing Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityWriting" id="activityWriting" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activityRecitation">Recitation Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityRecitation" id="activityRecitation" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activityCrafting">Crafting Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityCrafting" id="activityCrafting" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activityDebate">Debate Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityDebate" id="activityDebate" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activitySpeech">Speech Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activitySpeech" id="activitySpeech" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-2" for="activityScout">Scout Marks: 
              </label>
              <div class="col-sm-10">
                <input type="number" name="activityScout" id="activityScout" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <button class="btn btn-outline-success form-control" id="extracurricularSubmit" name="extracurricularSubmit">Submit
                </button>
              </div>
            </div>
          </div>
        </form>
          <?php
    }
    elseif ($_GET['tab'] == "imageUpload")
    {
?>
       <form id="academicDetailsForm" action="add_students.php" method="post" enctype="multipart/form-data">
          <div id="imageUpload" class="container tab-pane active">
            <br>
            <h3>Upload Student Image
            </h3>
            <hr>
            <div class="form-group">
              <label class="control-label col-sm-2" for="studentImage">Student Image Upload: 
              </label>
              <div class="col-sm-10">
                <input type="file" name="studentImage" id="studentImage" class="form-control">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-10">
                <button class="btn btn-outline-success form-control" id="imageUploadSubmit" name="imageUploadSubmit" type="submit">Upload Image
                </button>
              </div>
            </div>
            <p>Image size should be under 150 kb and resolution should be 132px x 170px
            </p>     
          </div>
        </form>

        <?php 
          if ($_GET['sucess'] == 'true') {
            ?>
          <h2>Uploaded Image is... </h2>
          <p>To Change the Image please Reupload unless press Save Details Button </p>
          <div class="studentImg" align="center">
            <img src="<?php echo $_SESSION['STUDENT']['FORM']['REGISTRATION']['IMAGEUPLOAD']['URL'] ?>" alt="studentImage" width="132px" height="170px" >
          </div>
          <form id="academicDetailsForm" action="add_students.php" method="post" enctype="multipart/form-data">
            <button  class="btn btn-outline-success form-control mt-2" id="saveStudentDetail" name="saveStudentDetail">Save Student Details</button>
          </form>
            <?php
          }
         ?>
          <?php
    }
?>
          </div>
      </div>
    </div>
  </div>
  <?php include "footer.php" ?>


    <?php
}

?>
