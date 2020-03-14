<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('users/update/'.$user['user_id']);?>



    	

        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="row">
            	<div class="col-lg-6 col-md-6">
                	<div class="form-group">
                		<label>Name</label>
                		<input type="text" class="form-control" name="name" value="<?php echo $user['name'];?>" required autofocus>
                	</div>
            	</div>
            	<div class="col-lg-6 col-md-6">
                	<div class="form-group">
                		<label>Surname</label>
                		<input type="text" class="form-control" name="surname" value="<?php echo $user['surname'];?>" required autofocus>
                	</div>
            	</div>
        	</div>
        	
        	<div class="row">
            	<div class="col-lg-6 col-md-6">
                	<div class="form-group">
                		<label>Username</label>
                		<input type="text" class="form-control" name="username" value="<?php echo $user['username'];?>" required autofocus>
                	</div>
                </div>
                <div class="col-lg-6 col-md-6">
                    	<div class="form-group">
                    		<label>Gender</label>
                    		<select name="gender" class="form-control">
                    		<option value="<?php echo $user['gender'];?>"><?php echo $user['gender'];?></option>
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
                		<input type="date" class="form-control" name="dob" value="<?php echo $user['dob'];?>" required autofocus autocomplete=off>
                	</div>
                </div>
                <div class="col-lg-6 col-md-6">
                	<div class="form-group">
                		<label>Mobile Number</label>
                		<input type="number" class="form-control" name="mobile" value="<?php echo $user['mobile'];?>" required autofocus autocomplete=off>
                	</div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-6 col-md-6">
            	<div class="form-group">
            		<label>Email</label>
            		<input type="email" class="form-control" name="email" value="<?php echo $user['email'];?>" required autofocus>
            	</div>
            	</div>
            	<div class="col-lg-6 col-md-6">
                	<?php if($this->session->userdata('role') == 1) : ?>
                	<div class="form-group">
                		<label>Role</label>
                		
                		<?php if($user['role_id'] == 3):?>
                		<select name="role_id" class="form-control">
                				<option value="<?php echo $user['role_id'] ?>"><?php echo $user['role']; ?></option>
                				<option value="2">Trainer</option>
                				<option value="1">Admin</option>
                		</select>
                		<?php elseif ($user['role_id'] == 2):?>
                		<select name="role_id" class="form-control">
                				<option value="<?php echo $user['role_id'] ?>"><?php echo $user['role']; ?></option>
                				<option value="3">Trainee</option>
                				<option value="1">Admin</option>
                		</select>
                		<?php elseif ($user['role_id'] == 1):?>
                		<select name="role_id" class="form-control">
                				<option value="<?php echo $user['role_id'] ?>"><?php echo $user['role']; ?></option>
                				<option value="2">Trainer</option>
                				<option value="3">Trainee</option>
                		</select>
                	
                	<?php endif;?>
            		</div>
	        		<?php endif;?>
        		</div>

			</div>
       	
        	<button type="submit" class="btn btn-primary btn-block">Update</button>
        	




<?php echo form_close();?>



