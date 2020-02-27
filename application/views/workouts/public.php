		<div class="row">
    			<h1><?php echo $title;?></h1>
		</div>
		
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Workout ID</th>
              <th scope="col">Workout Title</th>
              <th scope="col">Owner</th>
              <th><a href="<?php echo base_url().'my_workouts';?>" class="btn btn-success btn-sm ">Go Back to my workouts</a></th>
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


