<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('users/check');?>



    <div class="justify-content-center align-items-center row">
        <div class="col-md-6 col-md-offset-6">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<input type="text" name="code" class="form-control" placeholder="Enter User Code" required autofocus>
        	</div>
        	<button type="submit" class="btn btn-primary btn-block">Search</button>
        </div>
    </div>



<?php echo form_close();?>

