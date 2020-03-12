<html>
	<head>
		<title>My Fitness Club</title>
		<!-- <link rel="stylesheet" href="https://bootswatch.com/4/flatly/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css"/>
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
	    
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        
       
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	</head>
	<body>
	
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                  <a class="navbar-brand" href="<?php echo base_url();?>calendar">My Fitness Club</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
            
                  <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                    
                    <!-- if user is not logged in -->
                    <?php if(!$this->session->userdata('logged_in')) : ?>
                	               
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>about">About</a>
                      </li>
                      
                    <?php endif; ?>
                    
                    
                    
                    <!-- if user is logged in -->
                    <?php if($this->session->userdata('logged_in')) : ?>
                    
                    
                    
                    	
                    	
                    	  <!-- if user is administrator -->                 	
                        <?php if($this->session->userdata('role') == 1): ?>
                            <li class="nav-item">
                              <a class="nav-link" href="<?php echo base_url();?>users/index">Users</a>
                             </li>
                             
                             <li class="nav-item">
                       	 		<a class="nav-link" href="<?php echo base_url();?>exercises">Exercises</a>
                      		</li>
                      		
                      		<li class="nav-item">
                              <a class="nav-link" href="<?php echo base_url();?>workouts">Workouts</a>
                        	</li>                 			
                         <?php endif; ?>
                         
                         
                         
                         
                         <!-- If user is Trainee or admin -->
                         <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 3 ):?>
                         	<li class="nav-item">
                       	 		<a class="nav-link" href="<?php echo base_url();?>payments">Payments</a>
                      		</li>
                      		
                      		<li class="nav-item">
                       	 		<a class="nav-link" href="<?php echo base_url();?>check">Check-in</a>
                      		</li>
                         <?php endif;?>
                         
                         
                         
                         
                         <!-- If user is Trainee or Trainer -->
                         <?php if($this->session->userdata('role') == 3 || $this->session->userdata('role') == 2 ):?>
                         	  <li class="nav-item">
                              	<a class="nav-link" href="<?php echo base_url();?>my_workouts">My Workouts</a>
                        	  </li> 
                         <?php endif;?>
                         
                         
                         
                      	
     
                     <?php endif; ?>
                    
                    
                    
                    
                     <!-- If user is administrator or trainee or if logged out -->
                     <?php if($this->session->userdata('role') == 1 || $this->session->userdata('role') == 3 || $this->session->userdata('logged_in') == FALSE):?>
                    
                      <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url();?>memberships/index">Memberships</a>
                      </li>
                                            
                      <?php endif;?>
                                      	
                    </ul>
                    
                    
                    
                    <ul  class="nav-item navbar-nav navbar-right nav">
                    
                    
                    
                    
                    
                    
                    <!-- 
                        Right hand side of the Nav Bar
                        If user is not logged in
                     -->
					<?php if(!$this->session->userdata('logged_in')) : ?>
                    	 <li class="nav-item">
                        	<a class="nav-link" href="<?php echo base_url();?>users/login">Login</a>
                      	</li>
                    
                    	 <li class="nav-item">
                        	<a class="nav-link" href="<?php echo base_url();?>users/register">Register</a>
                      	</li>
                    <?php endif; ?>
                    
                    
                    
                    
                    
                    
                    <!-- If user is logged in -->
                    <?php if($this->session->userdata('logged_in')) : ?>

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
            
            <?php if($this->session->flashdata('membership_created')):?>
            <?php $flash_message = $this->session->flashdata('membership_created');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('membership_deleted')):?>
            <?php $flash_message = $this->session->flashdata('membership_deleted');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('membership_updated')):?>
            <?php $flash_message = $this->session->flashdata('membership_updated');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_disable')):?>
            <?php $flash_message = $this->session->flashdata('user_disable');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_enabled')):?>
            <?php $flash_message = $this->session->flashdata('user_enabled');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_password_updated')):?>
            <?php $flash_message = $this->session->flashdata('user_password_updated');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_update')):?>
            <?php $flash_message = $this->session->flashdata('user_update');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('exercise_deleted')):?>
            <?php $flash_message = $this->session->flashdata('exercise_deleted');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('exercise_created')):?>
            <?php $flash_message = $this->session->flashdata('exercise_created');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('exercise_updated')):?>
            <?php $flash_message = $this->session->flashdata('exercise_updated');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('workout_created')):?>
            <?php $flash_message = $this->session->flashdata('workout_created');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
             <?php if($this->session->flashdata('workout_updated')):?>
            <?php $flash_message = $this->session->flashdata('workout_updated');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
             <?php if($this->session->flashdata('workout_deleted')):?>
            <?php $flash_message = $this->session->flashdata('workout_deleted');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('workout_shared')):?>
            <?php $flash_message = $this->session->flashdata('workout_shared');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('check-in')):?>
            <?php $flash_message = $this->session->flashdata('check-in');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('membership_renewed')):?>
            <?php $flash_message = $this->session->flashdata('membership_renewed');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('event_update')):?>
            <?php $flash_message = $this->session->flashdata('event_update');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('event_created')):?>
            <?php $flash_message = $this->session->flashdata('event_created');?>
            <?php echo '<p class="alert alert-success">'.$flash_message.'</p>';?>
            <?php endif;?>
            
             <?php if($this->session->flashdata('event_deleted')):?>
            <?php $flash_message = $this->session->flashdata('event_deleted');?>
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
            
            <?php if($this->session->flashdata('membership_failed_to_updat')):?>
            <?php $flash_message = $this->session->flashdata('membership_failed_to_updat');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_disable_failed')):?>
            <?php $flash_message = $this->session->flashdata('user_disable_failed');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_enable_failed')):?>
            <?php $flash_message = $this->session->flashdata('user_enable_failed');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_disabled')):?>
            <?php $flash_message = $this->session->flashdata('user_disabled');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('user_password_failed_update')):?>
            <?php $flash_message = $this->session->flashdata('user_password_failed_update');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('exercise_failed_to_update')):?>
            <?php $flash_message = $this->session->flashdata('exercise_failed_to_update');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('workout_failed_to_updat')):?>
            <?php $flash_message = $this->session->flashdata('workout_failed_to_updat');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('workout_already_shared')):?>
            <?php $flash_message = $this->session->flashdata('workout_already_shared');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            <?php if($this->session->flashdata('no_membership')):?>
            <?php $flash_message = $this->session->flashdata('no_membership');?>
            <?php echo '<p class="alert alert-danger">'.$flash_message.'</p>';?>
            <?php endif;?>
            
            </div>
