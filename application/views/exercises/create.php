<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('exercises/create');?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-4 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Exercise Name</label>
        		<input type="text" class="form-control" name="exercise" placeholder="Exercise" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Details</label>
        		<input type="text" class="form-control" name="details" placeholder="Details" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Video</label>
        		<input type="text" class="form-control" name="video" placeholder="Video" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Muscle Group</label>
        		<input type="text" class="form-control" name="muscle_group" placeholder="Muscle Group" required autofocus>
        	</div>
        	<div class="form-group">
        	
        	<button type="submit" class="btn btn-primary btn-block">Create</button>
        	
        </div>
    </div>


<?php echo form_close();?>