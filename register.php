<?php include "header.php" ?>
<script>
	$(document).ready(function() {
		$("#district_select").on("click", function() {
			var district_id = $('#district_select').val();
			if(!district_id) {
				$.get('<?php echo htmlspecialchars('system/ajaxData.php') ?>', {getDistrict: true}, function(response) {
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
				$.get('<?php echo htmlspecialchars('system/ajaxData.php') ?>', {getTehsil: true, district_id: district_id}, function(response) {
					$('#tehsil_select').html(response);
				});
			}
		});
		
	});
</script>



<?php 
	$school_name_error = "Enter Correct School Name";
	$school_address_error = "Enter Correct School Address";
	$school_district_error = "Choose Correct District";
	$school_tehsil_error = "Choose Correct Tehsil";
	$school_pincode_error = "Enter Correct Pincode";
	$school_phone_number_error = "Enter Correct Phone Number";
	$school_landline_number_error = "Enter Correct Landline Number";
	$school_email_error = "Enter Correct Email Address";
	$school_police_station_error = "Enter Correct Police Station Name";
	$school_principle_name_error = "Enter Correct Name";
	$school_vice_principle_name_error = "Enter Correct Vice Principle Name";
	$school_representative_name_error = "Enter Correct Name";
	$school_representative_phone_number_error = "Enter Correct Phone Number";
	$school_representative_landline_number_error = "Enter Correct Landline Number";
	$school_representative_email_error = "Enter Correct Email";
	$school_affiliation_code_error = "Enter Correct Affiliation Code";
	$school_code_error = "Enter Correct School Code";
	$school_username = "Enter Correct And Unique UserName";
	$school_pwd_error = "Enter Correct Password";
	$school_board_error = "Choose Correct Board";
function error_msg($err_msg) {
	echo '<div class="alert alert-success">
  <strong>Error!</strong> '.$err_msg.'.
</div>';
} ?>
	<div class="content">
			<div class="container-fluid" id="main-content">
				<div class="register-form">
				<div class="jumbotron">
					<form action="<?php echo htmlspecialchars("system/register.inc.php") ?>" method="post" enctype="multipart/form-data">
						<h2 align="center">Registration Form</h2>
					
						<div class="" id="show-form">
							Enter School Name..
							<input class = "form-control" name = "school_name" type="school-name" placeholder="Enter School Name.." value="<?php echo $_POST['school_name'] ?>" required>
							<?php if($_GET['error'] == "school_name") {
								error_msg($school_name_error);
							} ?>
							Enter School Address..
							<input class = "form-control" type="school-address" name = "school_address" placeholder="Enter School Address.." value="<?php echo $_POST['school_address'] ?>" required>
							<?php if ($_GET['error'] == "school_address") {
								error_msg($school_address_error);
							} ?>
							Select Your District
							<select name="school_district" class="form-control" id="district_select" >
								<option value="">Select Your District</option>
							</select>
							<?php if ($_GET['error'] == "school_district") {
								error_msg($school_district_error);
							} ?>
							Select Your Town
							<select name="school_tehsil" id="tehsil_select" class="form-control">
								<option value="">Select Your Tehsil</option>
							</select>
							<?php if ($_GET['error'] == "school_tehsil") {
								error_msg($school_tehsil_error);
							} ?>
							Enter Pincode
							<input type="text" placeholder="Enter Pincode" name = "school_pincode" class="form-control" value="<?php echo $_POST['school_pincode'] ?>" required>
							<?php if ($_GET['error'] == "school_pincode") {
								error_msg($school_pincode_error);
							} ?>
							Enter Nearest Police Station
							<input type="text" placeholder="Enter Nearest Police Station" name = "school_police_station" class="form-control" value="<?php echo $_POST['school_police_station'] ?>" required>
							<?php if ($_GET['error'] == "school_police_station") {
								error_msg($school_police_station_error);
							} ?>
							Enter Principle Name
							<input type="text" placeholder="Enter Principle Name" name = "school_principle_name" class="form-control" value="<?php echo $_POST['school_principle_name'] ?>" required>
							<?php if ($_GET['error'] == "school_principle_name") {
								error_msg($school_principle_name_error);
							} ?>
							Enter Vice Principle Name
							<input type="text" placeholder="Enter Vice Principle Name" name = "school_vice_principle_name" class="form-control" value = "<?php echo $_POST['school_vice_principle_name'] ?>" required>
							<?php if ($_GET['error'] == "school_vice_principle_name") {
								error_msg($school_vice_principle_name_error);
							} ?>
							Enter School Representative Name
							<input type="text" placeholder="Enter School Representative Name" name = "school_representative_name" class="form-control" value="<?php echo $_POST['school_representative_name'] ?>" required>
							<?php if ($_GET['error'] == "school_representative_name") {
								error_msg($school_representative_name_error);
							} ?>
							Enter School Representative Phone Number
							<input type="text" placeholder="Enter School Representative Phone Number" name = "school_representative_phone_number" class="form-control" value="<?php echo $_POST['school_representative_phone_number'] ?>" required>
							<?php if ($_GET['error'] == "school_representative_phone_number") {
								error_msg($school_representative_phone_number_error);
							} ?>
							Enter School Representative Phone Landline Number
							<input type="text" placeholder="Enter School Representative Phone Landline Number" name = "school_representative_landline_number" class="form-control" value="<?php echo $_POST['school_representative_landline_number'] ?>" required >
							<?php if ($_GET['error'] == "school_representative_landline_number") {
								error_msg($school_representative_landline_number_error);
							} ?>
							Enter School Representative Email
							<input type="text" placeholder="Enter School Representative Email" name = "school_representative_email" class="form-control" value="<?php echo $_POST['school_representative_email'] ?>" required>
							<?php if ($_GET['error'] == "school_representative_email") {
								error_msg($school_representative_email_error);
							} ?>
							Enter School Code
							<input type="text" placeholder="Enter School Code" name = "school_code" class="form-control" value="<?php echo $_POST['school_code'] ?>" required> 
							<?php if ($_GET['error'] == "school_code") {
								error_msg($school_code_error);
							} ?>
							Enter School Affiliation
							<input type="text" placeholder="Enter School Affiliation" name = "school_affiliation_code" class="form-control" value="<?php echo $_POST['school_affiliation_code'] ?>" required>
							<?php if ($_GET['error'] == "school_affiliation_code") {
								error_msg($school_affiliation_code_error);
							} ?>
							Enter Your Email
							<input type="email" placeholder="Enter Your Email" name = "school_email" class="form-control" value="<?php echo $_POST['school_email'] ?>" required>
							<?php if ($_GET['error'] == "school_email") {
								error_msg($school_email_error);
							} ?>
							Enter Your Phone Number
							<input type="text" placeholder="Enter Your Phone Number" name = "school_phone_number" class="form-control" value="<?php echo $_POST['school_phone_number'] ?>" required>
							<?php if ($_GET['error'] == "school_phone_number") {
								error_msg($school_phone_number_error);
							} ?>
							Enter Your Telephone Number
							<input type="text" placeholder="Enter Your Telephone Number" name = "school_landline_number" class="form-control" value="<?php echo $_POST['school_landline_number'] ?>" required>
							<?php if ($_GET['error'] == "school_landline_number") {
								error_msg($school_landline_number_error);
							} ?>
							Enter Username
							<input type="text" placeholder="Enter Username" name = "school_username" class="form-control" value="<?php echo $_POST['school_username'] ?>" required>
							Select Your School Board
							<select name="school_board" id="board-type" class="form-control">
								<option default>Select Your School Board</option>
								<option value="1">CBSE</option>
								<option value="2">ICSE</option>
								<option value="3">GBSC</option>
							</select>
							<?php if ($_GET['error'] == "school_board") {
								error_msg($school_board_error);
							} ?>
							Enter password
							<input type="password" placeholder="Enter password" name = "school_pwd" class="form-control" required>
							Confirm Password
							<input type="password" placeholder="Confirm Password" name = "school_confirm_pwd" class="form-control" required>
							<?php if ($_GET['error'] == "school_pwd") {
								error_msg($school_pwd_error);
							} ?>
							<button type="submit" name="school_submit" class="btn btn-outline-success form-control">Register Now</button>
						</div>
					</form>
				</div>
			</div>
		</div>	
	</div>
<?php include "footer.php" ?>