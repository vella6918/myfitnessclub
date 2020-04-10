
		
		<div class="row">
			<div class="col-lg-6 col-md-6">
    			<h1><?php echo $title;?></h1>
    		</div>
    		<div class="col-lg-6 col-md-6">
			<?php if($this->session->userdata('role') == 3):?>
    			<a href="<?php echo base_url().'my_workouts';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">My Workouts</a>&nbsp;
    			<a href="<?php echo base_url().'shared';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Workouts Shared With Me</a>&nbsp;
			<?php endif;?>
    		</div>
		</div>
		
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Workout ID:</th>
              <th scope="col">Workout Title:</th>
              <th scope="col">Date created:</th>
              <th><a href="<?php echo base_url().'workouts/create';?>" class="btn btn-success btn-sm float-right">Add New Workout</a></th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($my_workouts as $my_workout) : ?>
          
          <tr>
              <td><a href="<?php echo base_url().'workouts/view/'.$my_workout['workout_id'];?>">#<?php echo $my_workout['workout_id'];?></a></td>
              <td><?php echo $my_workout['workout'];?></td>
              <td><?php echo $my_workout['created_at'];?></td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
