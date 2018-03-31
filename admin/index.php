<?php if(isset($_POST['admin_submit'])) {
include "../system/config.php";

		$username = mysqli_real_escape_string($conn, $_POST['admin_username']);
		$password = mysqli_real_escape_string($conn, $_POST['admin_pwd']);

		// Check Empty
		$admin_info = array('username' => $username, 
							'password' => $password);

		$isEmpty = isEmpty($admin_info);
		if ($isEmpty != 'NOT_EMPTY') {
		redirect('index.php?empty='.$isEmpty);
		}  else {
			// validating username
 
			$sql = "SELECT username FROM admin WHERE username = '$admin_info[username]'";
			$result = mysqli_query($conn, $sql);
			
			if(mysqli_num_rows($result) == 0) {
				redirect("index.php?error=user-not-found");
			} else {
				$sql = "SELECT `password` FROM admin WHERE username = '$admin_info[username]'
";
				$result = mysqli_query($conn, $sql);
				
				if($row = mysqli_fetch_assoc($result)) { 
					$hashedpwdCheck = password_verify($admin_info[password], $row['password']);

					if($hashedpwdCheck == false) {
						redirect("index.php?error=password");
					} else {

						$sql = "SELECT username, id FROM admin WHERE username = '$admin_info[username]'";
							$result = mysqli_query($conn, $sql); 
							
							if($row = mysqli_fetch_assoc($result)) {

								$_SESSION["ADMIN"]["ID"] = $row['id'];
								$_SESSION["ADMIN"]["USERNAME"] = $row['username'];

								redirect('index.php?success=true');
					}
				}
			}
		}
	}
		
} else {?> 


<?php include "../header.php" ?>
	<div class="main-page">
		<?php if(!isset($_SESSION[ADMIN][ID])) { ?>
			<h2 align="center">Login</h2>
			<hr>
			<div class="jumbotron">
				<form action="<?php echo htmlspecialchars('index.php') ?>" method="post" enctype="multipart/form-data">
		<label for="admin_username">Admin Username</label>
		<input type="text" name="admin_username" placeholder="Enter Username" class="form-control">
		<label for="admin_pwd">Admin Password</label>
		<input type="password" name="admin_pwd" placeholder="Enter Password" class="form-control">

		<button type="submit" name="admin_submit" class="btn btn-outline-success">Login</button>
	</form>

	<a href="recover_password_admin.php" class="btn btn-outline-success">forget PAssword</a>
			</div>
		<?php } else if(isset($_SESSION[ADMIN][ID])) {?>
			<h2>Hello Admin</h2>
		 <?php } ?>
	</div>
<?php include "../footer.php" ?>


<?php  } ?>
