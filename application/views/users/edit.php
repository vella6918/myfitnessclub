<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('users/update/'.$user['user_id']);?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-4 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Name</label>
        		<input type="text" class="form-control" name="name" value="<?php echo $user['name'];?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Surname</label>
        		<input type="text" class="form-control" name="surname" value="<?php echo $user['surname'];?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Username</label>
        		<input type="text" class="form-control" name="username" value="<?php echo $user['username'];?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Email</label>
        		<input type="email" class="form-control" name="email" value="<?php echo $user['email'];?>" required autofocus>
        	</div>
        	
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

       	
        	<button type="submit" class="btn btn-primary btn-block">Update</button>
        	
        </div>
    </div>


<?php echo form_close();?>



