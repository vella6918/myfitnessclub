		
		<div class="row">
    			<h1><?php echo $title;?></h1>
		</div>
		
		<table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Workout ID</th>
              <th scope="col">Workout Title</th>
              <th scope="col">Owner</th>
              <th><a href="<?php echo base_url().'workouts/create';?>" class="btn btn-success btn-sm ">Add New Workout</a></th>
            </tr>
          </thead>
          <tbody>

          <?php  foreach ($workouts as $workout) : ?>
          
          <tr>
          	
              <td><a href="<?php echo base_url().'workouts/view/'.$workout['workout_id'];?>">#<?php echo $workout['workout_id'];?></a></td>
              <td><?php echo $workout['workout'];?></td>
              <td><a href="<?php echo base_url().'users/view/'.$workout['created_by'];?>"><?php echo $workout['username'];?></a></td>
              <td></td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
	 

