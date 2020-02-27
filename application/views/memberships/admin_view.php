
		<div class="row">
    		<div class="col-lg-6">
    			<h1><?php echo $title;?></h1>
    		</div>
		</div>
		
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Membership Name</th>
              <th scope="col">Price</th>
              <th scope="col"> <a href="<?php echo base_url().'memberships/create';?>" class="btn btn-success btn-sm">Add New</a></th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($memberships as $membership) : ?>
          
          <tr>
              <td><?php echo $membership['name'];?></td>
              <td><?php echo $membership['price'];?></td>
              <td>
                  <a href="<?php echo base_url().'memberships/detele/'.$membership['membership_id'];?>" class="btn btn-danger btn-sm">Delete</a>&nbsp;&nbsp;
                  <a href="<?php echo base_url().'memberships/edit/'.$membership['membership_id'];?>" class="btn btn-warning btn-sm">Edit</a>
              </td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
     