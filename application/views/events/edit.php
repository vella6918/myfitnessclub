<?php 
    //echo errors
    echo validation_errors();
    
    $startDate = strtotime($event['start_event']);
    $newStartDate = date('Y-m-d\TH:i', $startDate);
    
    $endDate = strtotime($event['end_event']);
    $newEndDate = date('Y-m-d\TH:i', $endDate);
?>

<?php echo form_open('events/update/'.$event['id']);?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-4 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Event Title</label>
        		<input type="text" class="form-control" name="title" value="<?php echo $event['title'];?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Start Date and Time</label>
        		<input type="datetime-local" class="form-control" name="start" value="<?php echo $newStartDate;?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>End Date and Time</label>
        		<input type="datetime-local" class="form-control" name="end" value="<?php echo $newEndDate;?>" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Trainer</label>
        		<select name="trainer" class="form-control">
                  <option value="<?php echo $event['user_id']; ?>"><?php echo $event['username'];?></option>
                  <?php  foreach ($trainers as $trainer) : ?>
                  <option  value="<?php echo $trainer['user_id']; ?>"><?php echo $trainer['username'];?></option>
                  <?php endforeach;?>
                </select>
        	</div>
        	

                        		

       	
        	<button type="submit" class="btn btn-primary btn-block">Update</button>
        	
        </div>
    </div>


<?php echo form_close();?>



