
		<div class="row">
    		<div class="col-lg-6">
    			<h1><?php echo $title;?></h1>
    		</div>
		</div>
		
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
            	<th scope="col">Event ID</th>
              <th scope="col">Event Title</th>
              <th scope="col">Trainer Name</th>
              <th scope="col"> <a href="<?php echo base_url().'events/create';?>" class="btn btn-success btn-sm">Add New</a></th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($events as $event) : ?>
          
          <tr>
              <td><a href="<?php echo base_url().'events/view/'.$event['id'];?>">#<?php echo $event['id'];?></a></td>
              <td><?php echo $event['title'];?></td>
              <td><?php echo $event['name'];?>&nbsp;<?php echo $event['surname'];?></td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
     