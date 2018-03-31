<?php 


include "config.php";
if (isset($_POST['school_login'])) {
	if(isset($_POST['user_type']) and $_POST['user_type'] != 1) {redirect('../login.php?error=user_type');}
	$school_info = array(
		'username' => mysqli_real_escape_string($conn, $_POST['school_username']) ,
		'password' => mysqli_real_escape_string($conn, $_POST['school_pwd']) 
	);
	
	// CHECKING EMPTY FIELDS

	$isEmpty = isEmpty($school_info);
	if ($isEmpty != 'NOT_EMPTY') {
		redirect('../login.php?empty=' . $isEmpty);
	} else {
		// TRIMMING
		foreach($school_info as $key => $value) {

			// code...

			$school_info[$key] = test_input($value);
		}

		// Validating District and Tehsil

		
			// validating Tehsil 
			
			
				// validating username
				
				$sql = "SELECT id FROM schools WHERE school_username = '$school_info[username]'";

				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) == 0) {
					redirect('../login.php?empty=school_username');
				} else {
					// validating password
					
					$sql = "SELECT pwd FROM schools WHERE school_username = '$school_info[username]'";

					$result = mysqli_query($conn, $sql);

					if($row = mysqli_fetch_assoc($result)) {
						$hashedpwdCheck = password_verify($school_info[password], $row['pwd']);

						if($hashedpwdCheck == false) {
							redirect('../login.php?error=pwd');

						} else {
							$sql = "SELECT id, school_username FROM schools WHERE school_username = '$school_info[username]'";
							$result = mysqli_query($conn, $sql); 
							
							if($row = mysqli_fetch_assoc($result)) {

								$_SESSION["SCHOOL"]["ID"] = $row['id'];
								$_SESSION["SCHOOL"]["USERNAME"] = $row['school_username'];

								redirect('../index.php?success=true');

							}
						}
					}
				}
			
		
	}	
} 

 ?>

<?php 

/*else if (isset($_POST['department_login'])) {
	if(isset($_POST['user_type']) and $_POST['user_type'] != 2) {redirect('../login.php?error=user_type');}
	$department_info = array('type' => mysqli_real_escape_string($conn, $_POST['department_type']),
							'district' => mysqli_real_escape_string($conn, $_POST['department_district']),
							'tehsil' => mysqli_real_escape_string($conn, $_POST['department_tehsil']),
							'username' => mysqli_real_escape_string($conn, $_POST['department_username']),
							'password' => mysqli_real_escape_string($conn, $_POST['department_pwd']),
							);

	// Is Empty
	$isEmpty = isEmpty($department_info);

	if($isEmpty != 'NOT_EMPTY') {
		redirect('../login.php?error=empty_'.$isEmpty);
	} else {
		// Validating Department Type
		
		$sql = "SELECT id from government_department_names";
		$result = mysqli_query($conn,$sql);

		if (mysqli_num_rows($result) < 1) {
			redirect('../login.php?error=wrongdepartmenttype');
		} else {
			// Validating District
			
			$sql = "SELECT id, district_id FROM tehsil WHERE id = $department_info[tehsil] AND district_id = $department_info[district]";
			$result = mysqli_query($conn, $sql);
			
			if (mysqli_num_rows($result) < 1) {
				redirect('../login.php?error=wrongdistrict_tehsil');
			} else {
				// Validating Username AND pASSWORD
				
				if(!isUserID($department_info['username'])) {
					redirect('../login.php?error=wrongusernameSyntax');
				} else {

				$sql = "SELECT * FROM government_departments WHERE  username = '$department_info[username]'";	

				$result = mysqli_query($conn, $sql);

				if(mysqli_num_rows($result) < 1) {
					redirect('../login.php?error=usernotfound');
				} else {

					if($row = mysqli_fetch_assoc($result)) {

						$hashedpwdCheck = password_verify($department_info['password'], $row['password']);

						if($hashedpwdCheck == false) {
							redirect('../login.php?error=wrongpassword');
						} else {
							// Login User
									
							$_SESSION['DEPARTMENT']['ID'] = $row['id'];
							$_SESSION['DEPARTMENT']['TYPE'] = $row['department_type'];
							$sql = "SELECT name FROM government_department_names WHERE id = $department_info[type]";
							$result = mysqli_query($conn, $sql);

							$department_name = mysqli_fetch_assoc($result);
							if($department_name) {

							/*redirect('../department/'.$department_name[name].'/index.php?login=success');
							redirect('../departments/index.php?login=success');
							} else {
								redirect('../login.php?error=technicalError');
							}
						}
					} else {	
						redirect('..login.php?error=technicalError');
					}
				}
				}
			}
		}
	}
}
*/
 ?>