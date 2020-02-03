		<h1><?php echo $title;?></h1></br>
		
		<table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Membership Name</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($memberships as $membership) : ?>
          
          <tr>
          <td><?php echo $membership['name'];?></td>
          <td><?php echo $membership['price'];?></td>
          <td><a href="<?php echo base_url().'memberships/detele/'.$membership['membership_id'];?>" class="btn btn-danger float-right">Delete</a><a href="#" class="btn btn-warning float-right">Edit</a></td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
     