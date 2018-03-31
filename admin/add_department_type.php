<?php if(isset($_POST['add_department_name'])) {

	include "../system/config.php";

	$name = mysqli_real_escape_string($conn, $_POST['new_department_name']);

	if(empty($name)) {
		redirect('add_department_type.php?error=empty');
	} else {
		if(!isAlpha($name)) {
			redirect('add_department_type.php?error=name');
		} else {
			$sql = "SELECT name from government_department_names where name = '$name'";

			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows($result) > 0) {
				redirect('add_department_type.php?error=alreadyExist');
			} else {
				$sql = "INSERT INTO `government_department_names`(`name`) VALUES ('$name')";

				$result = mysqli_query($conn, $sql);

				if($result) {
/*					if (!file_exists('../departments/'.$name)) {
 					   mkdir('../departments/'.$name, 0777, true);
}*/
					redirect('add_department_type.php?success=true');
				} else {
					redirect('add_department_type.php?error=technicalError');
				}
			}
		}
	}

} else {?> 

<?php include "../header.php" ?>

<div class="main-page">
	<h2>Add New Department Type</h2> <hr>
	<form action="<?php echo htmlspecialchars('add_department_type.php') ?>" method="post" enctype="multipart/form-data">
		<label>Name:</label> <br>
		<input type="text" name="new_department_name" placeholder="Department name"><br>
		<button type="submit" name="add_department_name">ADD Department name</button>
	</form>
</div>

<?php include "../footer.php" ?>

<?php } ?>