<div class="card" style="width: 100%;">
	<div class="card-header">
    	<div class="row">
        	<h1><?php echo $title;?></h1>
        </div>
  	</div>
    <div class="card-body">
	<?php echo form_open('messages/create');?>
		<div class="row">
        	<label>Subject</label>
        	<input type="text" name="subject" class="form-control" placeholder="Subjecte" required autofocus autocomplete=off>
        </div>
        </br>		
        <div class="row">
        	<label>Message</label>
        	<textarea type="text" class="form-control"name="message" placeholder="Message"></textarea>
        </div>
        </br>
        <div class="row">
        	<button type="submit" class="btn btn-primary btn-sm">Send</button>
        </div>
    <?php echo form_close();?>
    </div>
</div>