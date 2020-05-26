<?php 
    //echo errors
    echo validation_errors();
?>

<?php echo form_open('memberships/create');?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-6 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Name</label>
        		<input type="text" class="form-control" name="name" placeholder="Name" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Duration in days</label>
        		<input type="text" class="form-control" name="days" placeholder="Days" required autofocus>
        	</div>
        	<div class="form-group">
        		<label>Price in &euro;</label>
        		<input type="text" class="form-control" name="price" placeholder="Price" required autofocus>
        	</div>
        	<button type="submit" class="btn btn-primary btn-block">Create</button>
        	
        </div>
    </div>


<?php echo form_close();?>