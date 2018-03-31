<?php if (isset($_POST['add_department_submit'])): ?>
	<?php 
	include "../system/config.php";
	$department_info = array('type' => mysqli_real_escape_string($conn, $_POST[department_type]), 
							 'district' => mysqli_real_escape_string($conn, $_POST[district]),
							 'tehsil' => mysqli_real_escape_string($conn, $_POST[tehsil]),
							 'name' => mysqli_real_escape_string($conn, $_POST[representative_name]),
							 'email' => mysqli_real_escape_string($conn, $_POST[representative_email]),
							 'phone' => mysqli_real_escape_string($conn, $_POST[representative_phone]),
							 'username' => mysqli_real_escape_string($conn, $_POST[representative_username]),
							 'password' => mysqli_real_escape_string($conn, $_POST[representative_pwd]),
							 'confirm_password' => mysqli_real_escape_string($conn, $_POST[confirm_password]));

	// Is empty
	// 
	
	$isEmpty = isEmpty($department_info);

	if($isEmpty != 'NOT_EMPTY') {
		redirect('add_department.php?error='.$isEmpty);
	} else {
		// validating district
		
		$sql = "SELECT id from tehsil where district_id = '$department_info[district]' and id = '$department_info[tehsil]'";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) < 1) {
			redirect('add_department.php?error=district_tehsil');
		} else {
			if (!isAlpha($department_info['name'])) {
			redirect("add_department.php?error=name");
		} else {
			// VALIDATING EMAILS

			$sql = "SELECT email FROM government_departments WHERE email = '$department_info[email]'";
			$result = mysqli_query($conn, $sql);
			if (!filter_var($department_info['email'], FILTER_VALIDATE_EMAIL) || mysqli_num_rows($result) > 1) {
				redirect("add_department.php?error=department_email");
			} else {
				// validating phone 
				if (!isPhone($department_info['phone'])) {
					redirect("add_department.php?error=phone");
				} else {
					// validating username
					
					$sql = "SELECT username FROM government_departments WHERE username = '$department_info[username]'";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0 and !isUserID($department_info[username])) {
						redirect('add_department.php?error=username');
					} else {
						// Validating PAssword
					
						if (!checkpwd($department_info['password'], $department_info['confirm_password'])) {
							redirect('add_department.php?error=pwd');
						} else {
							$hashedpwd = hashedPassword($department_info['password']);

							$sql = "INSERT INTO `government_departments`(`name`, `email`, `phone`, `username`, `password`, `district`, `tehsil`, `department_type`) VALUES ('$department_info[name]','$department_info[email]','$department_info[phone]','$department_info[username]','$hashedpwd','$department_info[district]','$department_info[tehsil]','$department_info[type]')";

							$result = mysqli_query($conn, $sql);

							if ($result) {
								/*$to = $department_info['email'];
								$from = 'admin@hackathon.com';
								$replyto = 'admin@hackathon.com';
								$subject = 'Hi You have successfully registered - hackathon.com';
								$msg = 'Hi,\nYour Login Credential:\nUsername: $department_info[username]\nPassword: $department_info[password]';
							

								sendEmail($to, $from, $replyto, $subject, $msg);*/
								redirect('add_department.php?department_added=success');
							} else {
								redirect('add_department.php?error=technicalerror');
							}
							
						}
					}
				}
			}
		}
		}
	}

	 ?>
<?php else: ?>
	
<?php include "../header.php" ?>
<script>
	$(document).ready(function() {
		$("#district_select").on("click", function() {
			var district_id = $('#district_select').val();
			if(!district_id) {
				$.get('<?php echo htmlspecialchars('../system/ajaxData.php') ?>', {getDistrict: true}, function(response) {
					$('#district_select').html(response);
				});
			}	
		});

		$('#tehsil_select').on('click', function() {
			var district_id = $('#district_select').val();
			var tehsil_id = $(this).val();
			if(!district_id) {
				$('#tehsil_select').html('<option default>Select District First</option>');
			} else {
				$.get('<?php echo htmlspecialchars('../system/ajaxData.php') ?>', {getTehsil: true, district_id: district_id}, function(response) {
					$('#tehsil_select').html(response);
				});
			}
		});

		$('#department_type').on('click', function() {
			$.get('<?php echo htmlspecialchars('../system/ajaxData.php') ?>', {getDepartment: true}, function(response) {
				$('#department_type').html(response);
			});
		});
		
	});
</script>
<div class="main-page">
	<h2>Add Departments</h2>
	<hr>
	<form action="<?php echo htmlspecialchars('add_department.php') ?>" method="post" enctype=multipart/form-data>
		<label>Department Type:   </label>
		<select name="department_type" id="department_type">
			<option default>Select A Department</option>
		</select>
		<label>Select District:   </label>
		<select name="district" id="district_select">
			<option value="">Select District</option>
		</select>
		<label>Select Tehsil:   </label>
		<select name="tehsil" id="tehsil_select">
			<option value="">Select Tehsil</option>
		</select>
		<label>Representative Name: </label>
		<input type="text" name="representative_name">
		<label>Representative Phone Number: </label>
		<input type="text" name="representative_phone">
		<label>Representative Phone Email: </label>
		<input type="email" name="representative_email">
		<label>Representative Username: </label>
		<input type="text" name="representative_username">
		<label>Password: </label>
		<input type="password" name="representative_pwd">
		<label>Confirm password: </label>
		<input type="password" name="confirm_password">
		<button type="submit" name="add_department_submit">Add user</button>
	</form>
</div>


<?php include "../footer.php" ?>
<?php endif ?>
