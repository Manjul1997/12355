<?php 
	include "system/config.php";
	session_unset();
	session_destroy();
	redirect('index.php?logout=success');
 ?>