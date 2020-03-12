<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('events/create')?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-4 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Event Title</label>
        		<input type="text" class="form-control" name="title" placeholder="Title" required autofocus autocomplete=off>
        	</div>
        	<div class="form-group">
        		<label>Start Date and Time</label>
        		<input type="datetime-local" class="form-control" name="start" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>End Date and Time</label>
        		<input type="datetime-local" class="form-control" name="end" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Trainer</label>
        		<select name="trainer" class="form-control">
                  <option></option>
                  <?php  foreach ($trainers as $trainer) : ?>
                  <option  value="<?php echo $trainer['user_id']; ?>"><?php echo $trainer['username'];?></option>
                  <?php endforeach;?>
                </select>
        	</div>
        	

                        		

       	
        	<button type="submit" class="btn btn-primary btn-block">Create</button>
        	
        </div>
    </div>


<?php echo form_close();?>