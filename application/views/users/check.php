


<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'check';?>">Checkin <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'all_checkins';?>">All Checkins</a>
      </li>
    </ul>
  </div>
</nav>


<hr>


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

