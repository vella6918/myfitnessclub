<?php echo form_open('exercises/update/'.$exercise['exercise_id']);?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-4 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Exercise Name</label>
        		<input type="text" class="form-control" name="exercise" value="<?php echo $exercise['exercise'];?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Details</label>
        		<input type="text" class="form-control" name="details" value="<?php echo $exercise['details'];?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Video</label>
        		<input type="text" class="form-control" name="video" value="<?php echo $exercise['video'];?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Muscle Group</label>
        		<input type="text" class="form-control" name="muscle_group" value="<?php echo $exercise['group_id']?>" required autofocus>
        	</div>
        	<div class="form-group">
        	
        	<button type="submit" class="btn btn-primary btn-block">Update</button>
        	
        </div>
    </div>


<?php echo form_close();?>