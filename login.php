<?php include "header.php" ?>
<script>
   /* $(document).ready(function() {
    		
    
    		$('#user_type').on('click', function(){
    			
    			var user_type = $('#user_type').val();
    		
    			if(user_type == 1) {
    				$.get("<?php echo htmlspecialchars('system/ajaxData.php') ?>", {getSchoolform: true}, function(response) {
    					$('#show_form').html(response);
    				});
    			} else if(user_type == 2) {
    				$.get("<?php echo htmlspecialchars('system/ajaxData.php') ?>", {getGovernmentform: true}, function(response) {
    					$('#show_form').html(response);
    				});
    			}
    		});
    
    		
    		
    	});*/
</script>

<div class="content">
    <div class="container-fluid">
        <div class="login-form">
            <div class="jumbotron">
                <form action="<?php echo htmlspecialchars('system/login.inc.php') ?>" method="post" enctype="multipart/form-data">
                    <!-- <h2 align="center">Login Form</h2>
						Select User Type
						<select name="user_type" id="user_type"  class="form-control">
							<option value="">Select User Type</option>
							<option value="1">School</option>
							<option value="2">Government</option>

                        <label>Select Your District</label>

						</select> -->
					<h2 align="center">School Login</h2>
                    <div class="" id="show_form" align="center">
                    	<div class="form-group">
	      <label class="control-label col-sm-2" for="school_username">Username: </label>
	      <div class="col-sm-10">
	        <input type="text" placeholder="Enter Username" name="school_username" class="form-control">
	      </div>
                     	<div class="form-group">
	      <label class="control-label col-sm-2" for="school_pwd">Password: </label>
	      <div class="col-sm-10">
		  <input type="password" placeholder="Enter password" name="school_pwd" class="form-control">
	      </div>
          <div class="form-group">
	    
	      <div class="col-sm-10">
	         <button type="submit" name="school_login" class="btn btn-outline-success form-control my-2">Login Now</button>
	      </div><div class="form-group">
	    
	      <div class="col-sm-10">  <a href="forgotpass.php" class="btn btn-sm btn-outline-success form-control">Forgot Password</a>
	      </div>
                     
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
<?php include "footer.php" ?>
