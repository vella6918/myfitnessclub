
		
		<div class="row">
    			<h1><?php echo $title;?></h1>
		</div>
		
		<table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Exercise ID</th>
              <th scope="col">Exercise</th>
              <th><a href="<?php echo base_url().'exercises/create';?>" class="btn btn-success btn-sm ">Add New Exercise</a></th>
            </tr>
          </thead>
          <tbody>

          <?php  foreach ($exercises as $exercise) : ?>
          
          <tr>
          	
              <td><a href="<?php echo base_url().'exercises/view/'.$exercise['exercise_id']; ?>">#<?php echo $exercise['exercise_id'];?></a></td>
              <td><?php echo $exercise['exercise'];?></td>
              <td>
              	<a href="<?php echo base_url().'exercises/edit/'.$exercise['exercise_id'];?>" class="btn btn-warning btn-sm">Edit</a>
              	<a href="<?php echo base_url().'exercises/delete/'.$exercise['exercise_id'];?>" class="btn btn-danger btn-sm">Delete</a>
              </td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
	 


