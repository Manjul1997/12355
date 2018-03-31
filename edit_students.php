<?php if (isset($_POST['search_string'])): ?>
	<?php 
		include "config.php";
		$search_string = mysqli_real_escape_string($conn, $_POST['search_string']);

		if(isempty($search_string)) {
			redirect('edit_students.php?error=search_string_not_found');
		} else {
			$sql = 'SELECT * FROM std_school_code WHERE student_fname = $search_string';
			$result = mysqli_query($conn, $sql);

			if(mysqli_num_rows < 1) {
				echo '<div class="alert alert-info">
				<strong>Not Found</strong> No Student of name $search_string found.</div>';
			} else { 

				$students = mysqli_fetch_all($result, MYSQLI_ASSOC);
				echo '	<table class="table table-hover">
				<thead>
				<tr>
					<th>Student Id</th>
					<th>Student Name</th>
					<th>Student Fathers Name</th>
					<th>Student Class</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>';
				foreach ($students as $student) { ?>
					
				<tr>
					<td><?php echo $student['std_id'] ?></td>
					<td><?php echo $student['student_name'] ?></td>
					<td><?php echo $student['father_name'] ?></td>
					<td><?php echo $student['class'] ?></td>
					<td>
						<button class="btn btn-outline-success mr-1" id = >Update</button>
					</td>
				</tr>
			
		<?php	}

			echo '
			</tbody>
			</table>';
			}
		}

	 ?>
<?php else: ?>


<?php include 'header.php' ?>

<?php if (isset($_SESSION['SCHOOL']['ID']) and isset($_SESSION['SCHOOL']['USERNAME'])): ?>

	<script>
		$(document).ready(function() {
			$("#search_btn").on('submit', function(event) {
				event.preventDefault();
				var search_data = $('#student_search').val();
				if(search_data == '' || !search_data.match('/([a-zA-Z]+[\'-]?[a-zA-Z]+[ ]?)+/')) {
					alert('Please Enter Correct Name');
				} else {
					$.ajax(
						type: 'post',
						url: 'edit_students.php',
						data: {search_string: search_data},
						success: function(response) {
						 	$('#students_found').html(response);
						},
						dataType: 'json');
				}
			});
		});
	</script>
	<div class="main-page">
		
		<h2>Edit Student Details</h2>
		<br>	
		
		<hr>

		<form action="">
		
			<label for="search_student">Search: </label>
			<br>
			<input type="text" id="student_search" name="student_search" class="form-control" placeholder="Enter Student Name">
			<button type="submit" class="btn btn-outline-success mt-2" id="search_btn">Search</button>
		
		</form>

		<br>
		<hr>

		<div class="students_found">
			
		</div>
	</div>
<?php else: ?>
	<?php redirect('index.php?error=filenotfound'); ?>	
<?php endif ?>

<?php include 'footer.php' ?>


	
<?php endif ?>
