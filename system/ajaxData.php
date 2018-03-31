

<?php 
	include_once "config.php";
	if(isset($_GET['getDistrict'])) {
		

		$sql = "SELECT * FROM district";

		$districts = mysqli_query($conn, $sql);
		echo '<option default>Select District</option>';
		while($district = mysqli_fetch_assoc($districts)) {
			?>
			<option value = "<?php echo $district['id'] ?>"><?php echo $district['name'] ?></option>
			<?php
		}
	} else if (isset($_GET['getTehsil'])) {
		
		$district_id = mysqli_real_escape_string($conn, $_GET['district_id']);

		$sql = "SELECT * FROM tehsil WHERE district_id = '$district_id'";
		echo "<option value=''>Select Tehsil</option>";
		$tehsils = mysqli_query($conn, $sql);
		while($tehsil = mysqli_fetch_assoc($tehsils)) {
			?>
			<option value="<?php echo $tehsil['id'] ?>"><?php echo $tehsil['name'] ?></option>
			 <?php
		}
	} else if(isset($_GET['getDepartment'])) {
		
		$sql =  "SELECT * FROM government_department_names";

		$departments = mysqli_query($conn, $sql);

		while($department = mysqli_fetch_assoc($departments)) {
			?>
			<option value="<?php echo $department['id'] ?>"><?php echo $department['name'] ?></option>
			
			<?php
		}
	} else if(isset($_GET['getSchoolform'])) {
		?>
		<script>
		$(document).ready(function() {
		$("#district_select").on("mouseenter", function() {
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
			<label>Select Your District</label>
			<select name="school_district" class="form-control" id="district_select">
				<option value="">Select Your District</option>
			</select>
			<label>Select Tehsil</label>
			<select name="school_tehsil" id="tehsil_select" class="form-control">
				<option value="">Select Tehsil</option>
				
			</select>
			<label>Enter Username</label>
			<input type="text" placeholder="Enter Username"  name="school_username" class="form-control">
			Select Your School Board
			<select name="school_board" id="board-type" class="form-control">
				<option default>Select Your School Board</option>
				<option value="1">CBSE</option>
				<option value="2">ICSE</option>
				<option value="3">GBSC</option>
			</select>
			<label>Enter Username</label>
			<input type="password" placeholder="Enter password" name="school_pwd" class="form-control">
			<button type="submit" name="school_login" class="btn btn-outline-success form-control">Login Now</button>
		<?php
	} else if(isset($_GET['getGovernmentform'])) {
		?>	
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

		$('#department_type').on('click', function() {
			
			$.get("<?php echo htmlspecialchars('system/ajaxData.php') ?>", {getDepartment: true}, function(response) {
				$('#department_type').html(response);
			});
		});
		
		
	});
</script>
<label>Select Department Type</label>
			<select name="department_type" class="form-control" id="department_type">
				<option default>Select Your Department</option>
			</select>
			<label>Select Your District</label>
			<select name="department_district" class="form-control" id="district_select">
				<option value="">Select Your District</option>
			</select>
			<label>Select Tehsil</label>
			<select name="department_tehsil" id="tehsil_select" class="form-control">
				<option value="">Select Tehsil</option>
				
			</select>
			<label>Enter Username</label>
			<input type="text" placeholder="Enter Username"  name="department_username" class="form-control">
			<label>Enter Password</label>
			<input type="password" placeholder="Enter password" name="department_pwd" class="form-control">
			<button type="submit" name="department_login" class="btn btn-outline-success form-control">Login Now</button>
		<?php
	} else if (isset($_GET['getSubjectlist'])) { 

		?>


		<?php if ($_GET['schoolBoard'] == 1) {
			?>
				<?php $sql = "SELECT id, name FROM subjects WHERE iscbse = 1"; ?>
			<?php
		} else if($_GET['schoolBoard'] == 2) {
			?>
				<?php $sql = "SELECT id, name FROM subjects WHERE isicse = 1"; ?>
			<?php
		} else { 
			?>
				<?php $sql = "SELECT id, name FROM subjects WHERE isgbse = 1"; ?>
			<?php
		}?>

		<?php 
			//	echo $conn;
			$subjects = mysqli_query($conn, $sql);

			echo '<option value="">Select Subject</option>';
			while($subject = mysqli_fetch_assoc($subjects)) { 
				?>
				<option value="<?php echo $subject['id'] ?>"><?php echo $subject['name'] ?></option>
				<?php
			}
		 ?>
		
		<?php 
	} else if (isset($_GET['getSubjectClassList'])) {
		?>
		
		<label>Select class</label>
      	<select class="form-control" id="subjectClass">
      		<option default>Select Class</option>
      		<option value="1">Class 1</option>
      		<option value="2">Class 2</option>
      		<option value="3">Class 3</option>
      		<option value="4">Class 4</option>
      		<option value="5">Class 5</option>
      		<option value="6">Class 6</option>
      		<option value="7">Class 7</option>
      	</select>
		<select name="subject_name" id="subject_list" class="form-control">
			<option default>Subjects Name</option>
		</select>	
		<?php if ($schoolDetails['board'] == 3): ?>
			<select>
				<option default>Select Semester</option>
				<option value="1">Semester 1</option>
				<option value="2">Semester 2</option>
			</select>
		<?php endif ?>
		
      	<button type="button" name = "class-select" class="btn btn-outline-success">Add</button>

		<?php
	} else if (isset($_GET['addNewAcademics'])) {
		?>
			<label>Select Class</label>
			<br>
			<select class="form-control" name="subjectClass" id="subjectClass">
	      		<option default>Select Class</option>
	      		<option value="1">Class 1</option>
	      		<option value="2">Class 2</option>
	      		<option value="3">Class 3</option>
	      		<option value="4">Class 4</option>
	      		<option value="5">Class 5</option>
	      		<option value="6">Class 6</option>
	      		<option value="7">Class 7</option>
      		</select>
      		<label>Select Subject</label>
      		<br>
      		<select name="subject_name" id="subject_list" class="form-control">
			<option default>Subjects Name</option>
			</select>
			<?php if ($schoolDetails['board'] == 3): ?>
			<select>
				<option default>Select Semester</option>
				<option value="1">Semester 1</option>
				<option value="2">Semester 2</option>
			</select>
			<?php endif ?>
		
		<div id="addMarkField"></div>
		<br>
      	<button type="button" name = "class-select" class="btn btn-outline-success" id="addSubjectMarks">Add</button>
		
		<?php
	} else if (isset($_GET['marksObtained'])) {
		# code...
		
		$obtained = mysqli_real_escape_string($conn, $_GET['marksObtained']);
		$total = mysqli_real_escape_string($conn, $_GET['totalMarks']);
		$className = mysqli_real_escape_string($conn, $_GET['subjectClass']);
		$subjectName = mysqli_real_escape_string($conn, $_GET['subject']);
		
		$_SESSION['FORM']['SCHOOL']['ACADEMIC']['STUDENT']['$className']['$subjectName']['obtainedMarks'] = $obtained;
		$_SESSION['FORM']['SCHOOL']['ACADEMIC']['STUDENT']['$className']['$subjectName']['obtainedMarks'] = $total;

		?> 
		
		<tr>
			<td><?php echo $className ?></td>
			<td><?php echo $subjectName ?></td>
			<td><?php echo $obtained ?></td>
			<td><?php echo $total ?></td>
		</tr>
		<?php
	} elseif (isset($_GET['getNewSubject'])) {
		?>
			<script>
       
         
      </script>
		<div class="subjectForm">
				<br>
				<hr>
				<select id="selectSubject" onchange="changeIdAndAdd(this);" class="form-control">
					<option value="">Select Subject</option>
					<option value="1">Mathematic</option>
					<option value="2">Science</option>
					<option value="3">Social Science</option>
					<option value="4">English</option>
					<option value="5">Hindi</option>
					<option value="6">Gujarati</option>
					<option value="7">Sanskrit</option>
					<option value="8">Computer</option>
					<option value="9">Environmental Science</option>
				</select>
				<input type="text" name="marksObtained" class="form-control" placeholder="Enter Obtained Marks">
				<input type="text" name="totalMarks" class="form-control" placeholder="Enter Total Marks">
				<!-- <button type="button" class="btn btn-outline-primary" id="addMarks" onclick="changeIdAndAdd(this);">Add</button> -->
				<button type="button" class="btn btn-outline-primary" onclick="$(this).parent().fadeOut(300)">Remove</button>
			</div>
	
		<?php
	} elseif(isset($_GET['showAcademicClass'])) {
		?>

		<?php 
			for ($i=1; $i <= $_SESSION['STUDENT']['FORM']['REGISTRATION']['BASIC']['studentClass']; $i++) { 
				?>
							<script> 
								$(document).ready(function(){
									$('#addNewSubject_<?php echo $i?>').on(
										{
											click: function() {
												$.get('<?php echo htmlspecialchars("system/ajaxData.php") ?>', {getNewSubject: true}, function(response) {
													$('#subjectMarks_<?php echo $i?>').append(response);
												});
											}
										});
								});
							</script>
					    	<div class="card">
						    <div class="card-header">
						      <a class="card-link" data-toggle="collapse" href="#collapse_<?php echo $i ?>">
						       	Class <?php echo $i ?>
						      </a>
						    </div>
						    <div id="collapse_<?php echo $i ?>" class="collapse hide" data-parent="#academicAccordion">
						      <div class="card-body">
						        <button type="button" role="button" class="btn btn-outline-primary" id="addNewSubject_<?php echo $i ?>">Add Subject</button>
						        <div class="subjectMarks_<?php echo $i?>" classNumber = "<?php echo $i ?>" id="subjectMarks_<?php echo $i?>">
						        	
						        </div>
						      </div>
						    </div>
						  </div>
		
				<?php
			}
		 ?>

		<?php
	}

 ?>