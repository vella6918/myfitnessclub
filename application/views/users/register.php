<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('users/register');?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-4 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Name</label>
        		<input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Surname</label>
        		<input type="text" class="form-control" name="surname" placeholder="Surname" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Username</label>
        		<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Email</label>
        		<input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Password</label>
        		<input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Confirm Password</label>
        		<input type="password" class="form-control" name="password2" placeholder="Confirm Password" required autofocus>
        	</div>
        	<button type="submit" class="btn btn-primary btn-block">Register</button>
        	
        </div>
    </div>


<?php echo form_close();?>