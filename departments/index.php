<?php 
	
	if (!isset($_SESSION['DEPARTMENT']['ID'])) {
		# code...
		print_r($_SESSION);
		//header('Location: ../index.php');
		//exit(0);
	} else { ?>

	<?php include "header.php" ?>

	

	<?php include "footer.php" ?>
	<?php }
 ?>