<?php
include "config.php";

if (isset($_POST['school_submit'])) {
	$school_info = array(
		'name' => mysqli_real_escape_string($conn, $_POST['school_name']) ,
		'address' => mysqli_real_escape_string($conn, $_POST['school_address']) ,
		'district' => mysqli_real_escape_string($conn, $_POST['school_district']) ,
		'tehsil' => mysqli_real_escape_string($conn, $_POST['school_tehsil']) ,
		'pincode' => mysqli_real_escape_string($conn, $_POST['school_pincode']) ,
		'phone_number' => mysqli_real_escape_string($conn, $_POST['school_phone_number']) ,
		'landline_number' => mysqli_real_escape_string($conn, $_POST['school_landline_number']) ,
		'email' => mysqli_real_escape_string($conn, $_POST['school_email']) ,
		'police_station' => mysqli_real_escape_string($conn, $_POST['school_police_station']) ,
		'principle_name' => mysqli_real_escape_string($conn, $_POST['school_principle_name']) ,
		'vice_principle_name' => mysqli_real_escape_string($conn, $_POST['school_vice_principle_name']) ,
		'representative_name' => mysqli_real_escape_string($conn, $_POST['school_representative_name']) ,
		'representative_phone_number' => mysqli_real_escape_string($conn, $_POST['school_representative_phone_number']) ,
		'representative_landline_number' => mysqli_real_escape_string($conn, $_POST['school_representative_landline_number']) ,
		'representative_email' => mysqli_real_escape_string($conn, $_POST['school_representative_email']) ,
		'affiliation_code' => mysqli_real_escape_string($conn, $_POST['school_affiliation_code']) ,
		'schoolCode' => mysqli_real_escape_string($conn, $_POST['school_code']) ,
		'username' => mysqli_real_escape_string($conn, $_POST['school_username']) ,
		'password' => mysqli_real_escape_string($conn, $_POST['school_pwd']) ,
		'confirm_password' => mysqli_real_escape_string($conn, $_POST['school_confirm_pwd']) ,
		'board' => mysqli_real_escape_string($conn, $_POST['school_board'])
	);

	// CHECKING EMPTY FIELDS

	$isEmpty = isEmpty($school_info);
	if ($isEmpty != 'NOT_EMPTY') {
		redirect('../register.php?empty=' . $isEmpty);
	}
	else {

		// TRIMMING

		foreach($school_info as $key => $value) {

			// code...

			$school_info[$key] = test_input($value);
		}

		// VALIDATING DATA.
		// validating school code and school affiliation code

		$sql = "SELECT school_code FROM schools WHERE school_code = '$school_info[schoolCode]'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			redirect('../register.php?error=school_code');
		}
		else {
			$sql = "SELECT school_affiliation_code FROM schools WHERE school_affiliation_code = '$school_info[affiliation_code]'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				redirect('../register.php?error=school_affiliation_code');
			}
			else {

				// Validating District And Tehsil

				$sql = "SELECT id FROM district WHERE id = $school_info[district]";
				$result = mysqli_query($conn, $sql);
				$rowCount = mysqli_num_rows($result);
				if ($rowCount < 1) {
					redirect('../register.php?error=school_district');
				}
				else {
					$sql = "SELECT id FROM tehsil WHERE id = $school_info[tehsil]";
					$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) < 1) {
						redirect('../register.php?error=school_tehsil');
					}
					else {

						// Validating Names

						if (!isAlpha($school_info['name'])) {
							redirect("../register.php?error=school_name");
						}
						else {
							if (!isAlpha($school_info['principle_name'])) {
								redirect("../register.php?error=school_principle_name");
							}
							else {
								if (!isAlpha($school_info['vice_principle_name'])) {
									redirect("../register.php?error=school_vice_principle_name");
								}
								else {
									if (!isAlpha($school_info['representative_name'])) {
										redirect("../register.php?error=school_representative_name");
									}
									else {

										// VALIDATING PINCODE AND PHONE NUMBERS

										if (!isPincode($school_info['pincode'])) {

											// code...

											redirect("../register.php?error=school_pincode");
										}
										else {

											// validating phone numbers

											if (!isPhone($school_info['phone_number'])) {
												redirect("../register.php?error=school_phone_number");
											}
											else {
												if (!isPhone($school_info['landline_number'])) {
													redirect("../register.php?error=school_landline_number");
												}
												else {
													if (!isPhone($school_info['representative_phone_number'])) {
														redirect("../register.php?error=school_representative_phone_number");
													}
													else {
														if (!isPhone($school_info['representative_landline_number'])) {
															redirect("../register.php?error=school_representative_landline_number");
														}
														else {

															// VALIDATING EMAILS

															$sql = "SELECT email FROM schools WHERE email = '$school_info[email]'";
															$result = mysqli_query($conn, $sql);
															if (!filter_var($school_info['email'], FILTER_VALIDATE_EMAIL) || mysqli_num_rows($result) > 1) {
																redirect("../register.php?error=school_email");
															}
															else {
																$sql = "SELECT school_representative_email FROM schools WHERE school_representative_email = '$school_info[representative_email]'";
																$result = mysqli_query($conn, $sql);
																if (!filter_var($school_info['representative_email'], FILTER_VALIDATE_EMAIL) || mysqli_num_rows($result) > 1) {
																	redirect("../register.php?error=school_representative_email");
																}
																else {

																	// Validateing Username

																	$sql = "SELECT school_username FROM schools WHERE school_username = '$school_info[username]'";
																	$result = mysqli_query($conn, $sql);
																	if (mysqli_num_rows($result) > 0 and !isUserID($school_info[username])) {
																		redirect('../register.php?error=school_username');
																	}
																	else {

																		// VALIDATING BOARD

																		if (!isBoard($school_info['board'])) {
																			redirect("../register.php?error=school_board");
																		}
																		else {

																			// Password Validation

																			if (!checkpwd($school_info['password'], $school_info['confirm_password'])) {
																				redirect('../register.php?error=school_pwd');
																			}
																			else {
																				$hashedpwd = hashedPassword($school_info['password']);
																				$verification_code = generateVerification($school_info['email']);
																				$sql = "INSERT INTO `schools` (`name`, `address`, `district`, `tehsil`, `pincode`, `phone_number`, `landline_number`, `email`, `police_station`, `priciple_name`, `vice_principle_name`, `school_representative_name`, `school_representative_phone_number`, `school_representative_landline_number`, `school_representative_email`, `school_affiliation_code`, `school_code`, `verification_code`, `school_username` ,`pwd`, `board`) VALUES ('$school_info[name]', '$school_info[address]', '$school_info[district]', '$school_info[tehsil]', '$school_info[pincode]', '$school_info[phone_number]', '$school_info[landline_number]', '$school_info[email]', '$school_info[police_station]', '$school_info[principle_name]', '$school_info[vice_principle_name]', '$school_info[representative_name]', '$school_info[representative_phone_number]', '$school_info[representative_landline_number]', '$school_info[representative_email]', '$school_info[affiliation_code]', '$school_info[schoolCode]', '$verification_code', '$school_info[username]', '$hashedpwd', '$school_info[board]');";
																				$result = mysqli_query($conn, $sql);
																				if (!$result) {
																					redirect("../register.php?error=technicalError" . $sql);
																				}
																				else {
																					redirect("../register.php?succes=true");
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
											}
										}
									}
								}
							}
						}
					}
				}
			}
		}
	}
}

?> 

<?php
?>