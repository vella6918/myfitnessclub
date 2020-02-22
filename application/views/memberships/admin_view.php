
		<div class="row">
    		<div class="col-lg-6">
    			<h1><?php echo $title;?></h1>
    		</div>
    		<div class="col-lg-6">
    			<a href="<?php echo base_url().'memberships/create';?>" class="btn btn-success	 float-right">Add New</a>
    		</div>
		</div>
		
		<table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Membership Name</th>
              <th scope="col">Price</th>
              <th scope="col"> </th>
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
     