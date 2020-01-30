<html>
	<head>
		<title>My Fitness Club</title>
		<link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
	</head>
	<body>
	
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
                  <a class="navbar-brand" href="<?php echo base_url();?>">My Fitness Club</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
            
                  <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                	               
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>about">About</a>
                      </li>
                      
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>memberships/index">Memberships</a>
                      </li>
                      
                                      	
                    </ul>
                    
                    <ul  class="nav-item navbar-nav navbar-right nav">
                    
					<?php if(!$this->session->userdata('logged_in')) : ?>
                    	 <li class="nav-item">
                        	<a class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
                      	</li>
                    
                    	 <li class="nav-item">
                        	<a class="nav-link" href="<?php echo base_url();?>users/register">Register</a>
                      	</li>
                    <?php endif; ?>
                    
                    <?php if($this->session->userdata('logged_in')) : ?>
                      	
                      	
                      	<?php if($this->session->userdata('administrator') == 1) : ?>
                      		<a class="nav-link" href="<?php echo base_url();?>users/index">Members</a>                 			
                      	<?php endif; ?>
                      	
                      	 <li class="nav-item">
                        	<a class="nav-link" href="<?php echo base_url();?>users/logout">Logout</a>
                      	</li>
                      	
                    <?php endif; ?>
                    </ul>
                    
                   </div>
        </nav>


        
        <br>
    
    
    
    	<div class="container">
        
        <!--  Display Flash Messages -->
        
            <div>
            
            <?php if($this->session->flashdata('user_registered')):?>
            <?php $flash_message = $this->session->flashdata('user_registered');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_loggedin')):?>
            <?php $flash_message = $this->session->flashdata('user_loggedin');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('successful_transaction')):?>
            <?php $flash_message = $this->session->flashdata('successful_transaction');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('login_failed')):?>
            <?php $flash_message = $this->session->flashdata('login_failed');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_loggedout')):?>
            <?php $flash_message = $this->session->flashdata('user_loggedout');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_notloggedin')):?>
            <?php $flash_message = $this->session->flashdata('user_notloggedin');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            </div>
