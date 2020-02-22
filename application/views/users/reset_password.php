<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('users/update_password/'.$user['user_id']);?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-6 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>New Password</label>
        		<input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Confirm Password</label>
        		<input type="password" class="form-control" name="password2" placeholder="Confirm Password" required autofocus>
        	</div>
        	<button type="submit" class="btn btn-primary btn-block">Update</button>
        	
        </div>
    </div>


<?php echo form_close();?>