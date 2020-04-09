<div class="card" style="width: 100%;">
	<div class="card-header">
    	<div class="row">
        	<h1><?php echo $title;?></h1>
        </div>
  	</div>
    <div class="card-body">
	<?php echo form_open('messages/create');?>
    	<div class="form-group">
    		<label>Send to</label>
    		<select name="receiver" class="form-control">
    			<option></option>
    			<?php foreach ($receivers as $receiver):?>
    				<option value="<?php echo $receiver['user_id'] ?>"><?php echo $receiver['name']; ?>&nbsp;<?php echo $receiver['surname']; ?></option>
    			<?php endforeach;?>
    		</select>
    	</div>
    	
		<div class="form-group">
        	<label>Subject</label>
        	<input type="text" name="subject" class="form-control" placeholder="Subject" required autofocus autocomplete=off>
        </div>	
        	
        <div class="form-group">
        	<label>Message</label>
        	<textarea type="text" class="form-control"name="message" placeholder="Message" required></textarea>
        </div>
        
        <div class="form-group">
        	<button type="submit" class="btn btn-primary btn-sm">Send</button>
        </div>
    <?php echo form_close();?>
    </div>
</div>