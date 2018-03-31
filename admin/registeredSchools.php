<?php 
include '../system/config.php';
if (isset($_POST['activateSchool'])) {
	$schoolid = mysqli_real_escape_string($conn, $_POST['schoolid']);

	$sql = 'UPDATE schools SET isActive = 1 WHERE id = '.$schoolid;
	mysqli_query($conn, $sql);
	$schoolData = "SELECT id, district, tehsil FROM schools WHERE id =".$schoolid;
	$schoolDetail = mysqli_query($conn, $schoolData);
	$schoolDetail = mysqli_fetch_assoc($schoolDetail);
	$createStudentTable = "CREATE table student_info_".$schoolDetail['id']."_".$schoolDetail['district']."_".$schoolDetail['tehsil']." (
		`id` int(11) NOT NULL AUTO_INCREMENT UNIQUE KEY,
		`std_id` int(20) NOT NULL PRIMARY KEY,
		`student_fname` varchar(255) NOT NULL,
		`student_lname` varchar(255) NOT NULL,
		`father_name` varchar(256) NOT NULL,
		`mother_name` varchar(256) NOT NULL,
		`dob` date NOT NULL,
		`gender` varchar(1) NOT NULL,
		`school_id` int(11) NOT NULL,
		`address_residence` varchar(256) NOT NULL,
		`address_permanent` varchar(256) NOT NULL,
		`class` int(1) NOT NULL,
		`guardianName` varchar(255) NOT NULL,
		`guardianEmail` varchar(255) NOT NULL,
		`guardian_phone_no` int(11) NOT NULL,
		`school_name` varchar(256) NOT NULL,
		`education_board` int(1) NOT NULL,
		`taluka` int(11) NOT NULL,
		`district` int(11) NOT NULL	
	);";
	$createSportsIndoorTable = "CREATE table sports_indoor_".$schoolDetail['id']."_".$schoolDetail['district']."_".$schoolDetail['tehsil']." (
	  `id` int(11) NOT NULL AUTO_INCREMENT UNIQUE KEY,
	  `std_id` varchar(20) NOT NULL REFERENCES student_info_".$schoolDetail['id']."_".$schoolDetail['district']."_".$schoolDetail['tehsil']."(std_id),
	  `carrom` varchar(255) DEFAULT 'Not Intersted',
	  `chess` varchar(255) DEFAULT 'Not Intersted',
	  `badminton` varchar(255) DEFAULT 'Not Intersted',
	  `professional_kabaddi` varchar(255) DEFAULT 'Not Intersted',
	  `squash` varchar(255) DEFAULT 'Not Intersted',
	  `pool` varchar(255) DEFAULT 'Not Intersted',
	  `table_tennis` varchar(255) DEFAULT 'Not Intersted',
	  `cycling` varchar(255) DEFAULT 'Not Intersted',
	  `karate` varchar(255) DEFAULT 'Not Intersted',
	  `snooker` varchar(255) DEFAULT 'Not Intersted',
	  `boxing` varchar(255) DEFAULT 'Not Intersted',
	  `wrestling` varchar(255) DEFAULT 'Not Intersted'
	);";
	$createSportsOutdoorTable = "CREATE table school_outdoor_".$schoolDetail['id']."_".$schoolDetail['district']."_".$schoolDetail['tehsil']." (
	  `id` int(11) NOT NULL AUTO_INCREMENT UNIQUE KEY,
	  `std_id` varchar(20) NOT NULL REFERENCES student_info_".$schoolDetail['id']."_".$schoolDetail['district']."_".$schoolDetail['tehsil']."(std_id),
	  `cricket` varchar(255) DEFAULT 'Not Intersted',
	  `football` varchar(255) DEFAULT 'Not Intersted',
	  `hockey` varchar(255) DEFAULT 'Not Intersted',
	  `golf` varchar(255) DEFAULT 'Not Intersted',
	  `tennis` varchar(255) DEFAULT 'Not Intersted',
	  `kho_kho` varchar(255) DEFAULT 'Not Intersted',
	  `handball` varchar(255) DEFAULT 'Not Intersted',
	  `kabaddi` varchar(255) DEFAULT 'Not Intersted',
	  `volley_ball` varchar(255) DEFAULT 'Not Intersted',
	  `leg_cricket` varchar(255) DEFAULT 'Not Intersted'
	);";
	$createActivityTable = "CREATE table school_".$schoolDetail['id']."_".$schoolDetail['district']."_".$schoolDetail['tehsil']." (
	  `id` int(11) NOT NULL AUTO_INCREMENT UNIQUE KEY,
	  `std_id` varchar(20) NOT NULL REFERENCES student_info_".$schoolDetail['id']."_".$schoolDetail['district']."_".$schoolDetail['tehsil']."(std_id),
	  `painting` varchar(255) DEFAULT 'Not Intersted',
	  `music` varchar(255) DEFAULT 'Not Intersted',
	  `dancing` varchar(255) DEFAULT 'Not Intersted',
	  `quiz` varchar(255) DEFAULT 'Not Intersted',
	  `spell_bee` varchar(255) DEFAULT 'Not Intersted',
	  `writing` varchar(255) DEFAULT 'Not Intersted',
	  `recitaton` varchar(255) DEFAULT 'Not Intersted',
	  `crafting` varchar(255) DEFAULT 'Not Intersted',
	  `debate` varchar(255) DEFAULT 'Not Intersted',
	  `speech` varchar(255) DEFAULT 'Not Intersted',
	  `scout` varchar(255) DEFAULT 'Not Intersted'
	);";

	mysqli_query($conn, $createStudentTable);
	mysqli_query($conn, $createActivityTable);
	mysqli_query($conn, $createSportsIndoorTable);
	mysqli_query($conn, $createSportsOutdoorTable);

	$changeActiveStatement = "UPDATE schools SET isActive = 1 WHERE id =".$schoolDetail['id'];

	mysqli_query($conn, $changeActiveStatement);

	redirect('registeredSchools.php?activated=true');

} else if (isset($_POST['deactivateSchool'])) {

	$schoolid = mysqli_real_escape_string($conn, $_POST['schoolid']);
	$changeActiveStatement = 'UPDATE schools SET isActive = 0 WHERE id = '.$schoolid;
	mysqli_query($conn, $changeActiveStatement);

	redirect('registeredSchools.php?deactivated=true');
}	else {
 ?>
<?php include "../header.php" ?>

<div class="content">
	<div class="container-fluid">
		<div class="jumbotron">
			<h2>Registered Schools...</h2>
			<hr>
			<table class="table">
		    <thead class="thead-dark">
		      <tr>
		        <th>School ID</th>
		        <th>School Name</th>
		        <th>School Address</th>
		        <th>School Board</th>
		        <th>Allow and See Profile</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php 

		      	$sql = "SELECT id, name, address, district, tehsil, pincode, board, isActive from schools";

		      	$inactiveSchools = mysqli_query($conn, $sql);

		      	while($inactiveSchool = mysqli_fetch_assoc($inactiveSchools)) { ?>
					<?php $address = $inactiveSchool['address'];
						$district = get_district($inactiveSchool['district']);
						$tehsil = get_tehsil($inactiveSchool['tehsil']);
						$pincode = $inactiveSchool['pincode'];
						$address .= ', '.$district.', '.$tehsil.', '.$pincode;
						

					?>
					<tr>
						<td><?php echo $inactiveSchool['id'] ?></td>
						<td><?php echo $inactiveSchool['name'] ?></td>
						<td><?php echo $address ?></td>
						<td><?php echo get_schoolBoard($inactiveSchool['board']) ?></td>
						<td>
							<form action="<?php echo htmlspecialchars("registeredSchools.php") ?>" method="post" enctype="	">
								<input type="text" name="schoolid" style="display: none" id="schoolid" value="<?php echo $inactiveSchool['id'] ?>">	
								<?php 
									if($inactiveSchool['isActive'] == 0) {
										?>
																		<button class="btn btn-outline-primary" id="activateSchool" name="activateSchool" type="submit">Activate</button>
										<?php
									} else {
										?>	
																			<button class="btn btn-outline-primary" id="deactivateSchool" name="deactivateSchool" type="submit">Deactivate/Remove School</button>
										<?php
									}
								 ?>
							</form>
							<button class="btn btn-outline-primary" id="seeProfile">See Profile</button></td>
					</tr>
	
		      	<?php }

		       ?>
		    </tbody>
		  </table>
		</div>
	</div>
</div>

<?php include "../footer.php" ?>
 <?php	
}

?>

