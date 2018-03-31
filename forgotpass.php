<?php include "header.php" ?>
	<div class="content">
		<div class="container-fluid">
			<div class="login-form">
			<div class="jumbotron">
			<form action="#" method="post" enctype="multipart/form-data">
						<h2 align="center">Account Recovery</h2>
						<select name="user-type" id="registration-type" class="form-control">
							<option default>Select User Type</option>
							<option value="1">School</option>
							<option value="2">Government</option>
						</select>
						<div class="" id="show-form">
							<select name="destrict-select" class="form-control" id="destrict-select">
								<option default>Select Your District</option>
								<option value="">All District here</option>
							</select>
							<select name="town-select" id="town-select" class="form-control">
								<option default>Select Your Town</option>
								<option value="">All Town Here</option>
							</select>
							<input type="email" placeholder="Enter Email" class="form-control">
							<select name="board-type" id="board-type" class="form-control">
								<option default>Select Your School Board</option>
								<option value="1">CBSE</option>
								<option value="2">ICSE</option>
								<option value="3">GBSC</option>
							</select>
							<button type="submit" name="submit" class="btn btn-outline-success form-control">Request New Password</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php include "footer.php" ?>