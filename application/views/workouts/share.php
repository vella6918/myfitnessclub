<h2><?php echo $title;?></h2></br>


<?php echo form_open('workouts/share_workout/'.$workout['workout_id']);?>


    	<div>
        	<div class="form-group">
        		<label><b>User</b></label>
        		<select name="user_id" class="form-control">
        			<?php foreach($users as $user): ?>
        				<option value="<?php echo $user['user_id'] ?>"><?php echo $user['username']; ?></option>
        			<?php endforeach;?>
        		</select>
        	</div>
        	
        	<button type="submit" class="btn btn-primary btn-block">Share</button>
        	
        </div>


<?php echo form_close();?>