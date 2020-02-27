
		
		<div class="row">
    		<h1><?php echo $title;?></h1>
		</div>
		
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Workout ID:</th>
              <th scope="col">Workout Title:</th>
              <th scope="col">Date created:</th>
              <th></th>
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
     
     <div>
     	<a href="<?php echo base_url().'workouts/create';?>" class="btn btn-success btn-sm float-right">Add New Workout</a>
     	<a href="<?php echo base_url().'public';?>" class="btn btn-info btn-sm float-right">View public workouts of other users</a>
     	
     </div>