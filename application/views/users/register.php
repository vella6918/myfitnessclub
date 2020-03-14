<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('users/register');?>



    	<h1 class="text-center"><?php echo $title; ?></h1>
        <div class="row">
        	<div class="col-lg-6 col-md-6">
            	<div class="form-group">
            		<label>Name</label>
            		<input type="text" class="form-control" name="name" placeholder="Name" required autofocus autocomplete=off>
            	</div>
        	</div>
        	<div class="col-lg-6 col-md-6">
            	<div class="form-group">
            		<label>Surname</label>
            		<input type="text" class="form-control" name="surname" placeholder="Surname" required autofocus autocomplete=off>
            	</div>
        	</div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 col-md-6">
            	<div class="form-group">
            		<label>Username</label>
            		<input type="text" class="form-control" name="username" placeholder="Username" required autofocus autocomplete=off>
            	</div>
            </div>
            <div class="col-lg-6 col-md-6">
            	<div class="form-group">
            		<label>Gender</label>
            		<select name="gender" class="form-control">
            		<option value=""></option>
            		<option value="Male">Male</option>
            		<option value="Female">Female</option>
            		<option value="Other">Other</option>
            		</select>
            	</div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-6 col-md-6">	
            	<div class="form-group">
            		<label>Date of Birth</label>
            		<input type="date" class="form-control" name="dob" placeholder="dob" required autofocus autocomplete=off>
            	</div>
            </div>
            <div class="col-lg-6 col-md-6">
            	<div class="form-group">
            		<label>Mobile Number</label>
            		<input type="number" class="form-control" name="mobile" placeholder="mobile" required autofocus autocomplete=off>
            	</div>
            </div>
        </div>
        
        <div class="row">
        <div class="col-lg-6 col-md-6">
        	<div class="form-group">
        		<label>Password</label>
        		<input type="password" class="form-control" name="password" placeholder="Password" required autofocus autocomplete=off>
        	</div>
        </div>
        <div class="col-lg-6 col-md-6">
			<div class="form-group">
        		<label>Confirm Password</label>
        		<input style="border-color: green;" type="password" class="form-control" name="password2" placeholder="Confirm Password" required autofocus autocomplete=off>
        	</div>
       	</div>
       	</div>
       	
       	<div class="row">
       	<div class="col-lg-6 col-md-6">
        	<div class="form-group">
        		<label>Email</label>
        		<input type="email" class="form-control" name="email" placeholder="Email" required autofocus autocomplete=off>
        	</div>
        </div>
        	<?php if($this->session->userdata('role') == 1) : ?>
        	<div class="col-lg-6 col-md-6">
            	<div class="form-group">
            		<label>Role</label>
            		<select name="role_id" class="form-control">
            			<?php foreach($roles as $role): ?>
            				<option value="<?php echo $role['role_id'] ?>"><?php echo $role['role']; ?></option>
            			<?php endforeach;?>
            		</select>
            	</div>
        	</div>
        	<?php endif;?>
        	</div>
        	
        	<button type="submit" class="btn btn-primary btn-block">Register</button>
        	


<?php echo form_close();?>