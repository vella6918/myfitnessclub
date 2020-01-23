<html>
	<head>
		<title>My Fitness Club</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
	</head>
	<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/">My Fitness Club</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url();?>">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url();?>about">About</a>
      </li>

    </ul>
    
    <ul>
    	<li class="nav-item navbar-nav navbar-right">
        	<a class="nav-link" href="<?php echo base_url();?>users/register">Register</a>
      	</li>
    </ul>

  </div>
</nav>

<div class="container">

<!--  Display Flash Messages -->

<div>

<?php if($this->session->flashdata('user_registered')):?>
<?php $flash_message = $this->session->flashdata('user_registered');?>
<?php echo '<p class="alert a;ert-success">'.$flash_message.'</p>';?>
<?php endif;?>

</div>
