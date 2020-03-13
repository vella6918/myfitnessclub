<?php 
    //echo errors
    echo validation_errors();
    
    $user_id = $user['user_id'];
?>

<?php echo form_open('users/assign_trainer/'.$user_id);?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-4 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Assign Trainer</label>
        		<select name="trainer" class="form-control">
        			<option></option>
        			<?php foreach ($trainers as $trainer):?>
        				<option value="<?php echo $trainer['user_id'] ?>"><?php echo $trainer['username']; ?></option>
        			<?php endforeach;?>
        		</select>
        	</div>
      	
        	<button type="submit" class="btn btn-primary btn-block">Assign</button>
        	
        </div>
    </div>


<?php echo form_close();?>