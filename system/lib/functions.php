<?php

function executeSql($sqlFileToExecute){
    $templine = '';
	$lines    = file($sqlFileToExecute);
	$impError = 0;
	foreach($lines as $line) {
		if(substr($line, 0, 2) == '--' || $line == '')
			continue;
		$templine .= $line;
		if (substr(trim($line), -1, 1) == ';') {
			if (!mysql_query($templine)) {
				$impError = 1;
			}
			$templine = '';
		}
	}
    if ($impError == 0) {
        return 'Script is executed succesfully!';
    } else {
        return 'An error occured during SQL importing!';
    }
}

function redirect($location){
    $hs = headers_sent();
    if($hs === false){
        header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        header('Location: '.$location);
    }elseif($hs == true){
        echo "<script>document.location.href='".htmlspecialchars($location)."'</script>";
    }
    exit(0);
}

function checkPwd($x,$y){
	if(empty($x) || empty($y) ) { return false; }
	if (strlen($x) < 8 || strlen($y) < 8 ) { return false; }
	if (strcmp($x,$y) != 0) { return false; } 
	return true;
}

function hashedPassword($password) {
	return password_hash($password, PASSWORD_DEFAULT);
}
function generateVerification($email) {
	return sha1(mt_rand(10000,99999).time().$email);
}
function VisitorIP(){ 
    return $_SERVER['REMOTE_ADDR'];
}

function isEmpty($fields) {
	foreach ($fields as $key => $value) {
		if(empty($value)) {
			return $key;
		}

	}

	return "NOT_EMPTY";
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


function isEmail($email){
	return preg_match('/^\S+@[\w\d.-]{2,}\.[\w]{2,6}$/iU', $email) ? true : false;
}

function isUserID($username){
	return preg_match('/^[a-z\d_]{4,20}$/i', $username) ? true : false;
}

function isPhone($phone){
	return preg_match("/^[0-9]{10}$/", $phone) ? true : false;
}

function isAlpha($field) {
	return preg_match("/^([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+$/", $field) ? true : false;
}

function isPincode($pincode) {
	return preg_match("/^[1-9][0-9]{5}$/", $pincode) ? true : false;
}

function GetHref($value){
	$qS = preg_replace(array('/p=[^&]*&?/', '/&$/'), array('', ''), $_SERVER['QUERY_STRING']);
	$qS = str_replace('&', '&amp;', $qS);
	
	if (!empty($qS)){
		$qS.= '&amp;';
	}
	
	return '?'.$qS.$value;
}

function ClearText($string){
	if(get_magic_quotes_gpc()){ 
		$string = stripslashes($string); 
	}
	
	return $string;
}

function truncate($str, $length, $trailing='...'){
	if(function_exists('mb_strlen') && function_exists('mb_substr')){
		$length-=mb_strlen($trailing);
		if(mb_strlen($str)> $length){
			return mb_substr($str,0,$length).$trailing;
		}else{
			return $str;
		}
	}else{
		return $str;
	}
} 

function get_data($url, $timeout = 15, $header = array(), $options = array()){
	if(!function_exists('curl_init')){
        return file_get_contents($url);
    }elseif(!function_exists('file_get_contents')){
        return '';
    }

	if(empty($options)){
		$options = array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
			CURLOPT_TIMEOUT => $timeout
		);
	}
	
	if(empty($header)){
		$header = array(
			"Accept: text/xml,application/xml,application/xhtml+xml,text/html;q=0.9,text/plain;q=0.8,image/png,*\/*;q=0.5",
			"Accept-Language: en-us,en;q=0.5",
			"Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7",
			"Cache-Control: must-revalidate, max-age=0",
			"Connection: keep-alive",
			"Keep-Alive: 300",
			"Pragma: public"
		);
	}

	if($header != 'NO_HEADER'){
		$options[CURLOPT_HTTPHEADER] = $header;
	}
			
	$ch = curl_init();
	curl_setopt_array($ch, $options);
	$data = curl_exec($ch);
	curl_close($ch);
	return $data;
}

function percent($num_amount, $num_total){
	$count = ($num_amount/$num_total)*100;
	return number_format($count,0);
}

function get_tab($tabName1, $tabName2) {
	if($tabName1 == $tabName2) {
		return "active";
	} else {
		return "disabled";
	}
}

function get_gender($id, $man='Man', $woman='Woman', $unknow='Unknown'){
	$gender = ($id == 1 ? $man : ($id == 2 ? $woman : $unknow));
	return $gender;
}
function get_district($id) {
	$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/hackathon/system/dbconn.php";
   include($path);
	$sql = 'SELECT name FROM district WHERE id = '.$id;
	$district = mysqli_query($conn, $sql);
	if($row = mysqli_fetch_assoc($district)){
	 return $row['name'];
	}
}

function get_tehsil($id) {
	$path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/hackathon/system/dbconn.php";
   include($path);
	$sql = 'SELECT name FROM tehsil WHERE id = '.$id;
	$tehsil = mysqli_query($conn, $sql);
	if($row = mysqli_fetch_assoc($tehsil)){
	return  $row['name'];
	}
}

function get_schoolBoard($id) {
	if ($id == 1) {
		return "CBSE";
	} else if ($id == 2) {
		return "ICSE";
	} else if ($id == 3) {
		return "GBSE";
	}
}
function isBoard($id) {
	return ($id == 1 or $id == 2 or $id == 3);
}

function sendEmail($from, $fromName, $to, $replyto, $subject, $message) {
	require "PHPMailer_5.2.4/class.phpmailer.php";

	$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
//$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                               // Enable SMTP authentication
//$mail->Username = '';                 // SMTP username
//$mail->Password = '';                           // SMTP password
//$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                                    // TCP port to connect to

$mail->From = $from;
$mail->FromName = $fromName;

	$mail->addAddress($to);     // Add a recipient

//$mail->addReplyTo($reptyto);
/*
$mail->addAttachment('');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
*/
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;
/*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
*/
if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

}

function getDepartment($id) {
	$sql = "SELECT name FROM government_department_names WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	if($row = mysqli_fetch_assoc($result))
		return $row['name'];
}
		
/* Register filters - used for modules */
$filter_events = array();

function hook_filter($event,$content) {
    global $filter_events;
    if(isset($filter_events[$event])){
        foreach($filter_events[$event] as $func){
            if(!function_exists($func)) {
                die('Unknown function: '.$func);
            }
			$content = call_user_func($func,$content);
        }
    }
    return $content;
}

function register_filter($event, $func){
    global $filter_events;
    $filter_events[$event][] = $func;
}

