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
        		<textarea type="text" class="form-control"name="details" placeholder="Details"></textarea>
        	</div>
        	<div class="form-group">
        		<label>YouTube Video ID:</label>
        		<input type="text" class="form-control" name="video" placeholder="Video" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Muscle Group</label>      		
        		<select name="muscle_id" class="form-control">
        			<?php foreach($muscle_groups as $muscle_group): ?>
        				<option value="<?php echo $muscle_group['muscle_id'] ?>"><?php echo $muscle_group['muscle']; ?></option>
        			<?php endforeach;?>
        		</select>
        	</div>
        	<div class="form-group">
        	
        	<button type="submit" class="btn btn-primary btn-block">Create</button>
        	
        </div>
    </div>


<?php echo form_close();?>