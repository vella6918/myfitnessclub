<div class="card" style="width: 100%;">
	<div class="card-header">
    	<div class="row">
        	<h1><?php echo $title;?></h1>
        </div>
  	</div>
    <div class="card-body">
        
        <div class="row">
        	<h3><?php echo $sender['name'];?>&nbsp;<?php echo $sender['surname'];?></h3>
        </div>
        
        <div class="row">
        	<p><i><?php echo $message['date_created'];?></i></p>
        </div>
        
        <div class="row">
        	<p><?php echo $message['message'];?></p>
        </div>
    </div>
</div>

</br>

<?php foreach ($replies as $reply):?>
<!-- Replies -->
<div class="card" style="width: 100%;">
	<div class="card-header">
    	<div class="row">
        	<h4>Replies</h4>
        </div>
  	</div>
    <div class="card-body bg-light">
        
        <div class="row">
        	<h3><?php echo $reply['name'];?>&nbsp;<?php echo $reply['surname'];?></h3>
        </div>
        
        <div class="row">
        	<p><i><?php echo $reply['replied_at'];?></i></p>
        </div>
        
        <div class="row">
        	<p><?php echo $reply['reply'];?></p>
        </div>
    </div>
</div>

</br>

<?php endforeach;?>

</br>

<div class="card" style="width: 100%;">
    <div class="card-body">
	<?php echo form_open('messages/reply/'.$message['message_id'].'/'.$this->session->userdata('user_id'));?>		
        <div class="row">
        	<label>Reply</label>
        	<textarea type="text" class="form-control"name="reply" placeholder="Reply"></textarea>
        </div>
        </br>
        <div class="row">
        <button type="submit" class="btn btn-primary btn-sm">Reply</button>
        </div>
    <?php echo form_close();?>
    </div>
</div>


