
		
		<div class="row">
    			<h1><?php echo $title;?></h1>
		</div>
		
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Disabled</th>
              <th><a href="<?php echo base_url().'users/register';?>" class="btn btn-success btn-sm ">Add New User</a></th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($users as $user) : ?>
          
          <tr>
              <td><?php echo $user['name'];?></td>
              <td><?php echo $user['surname'];?></td>
              <td><?php echo $user['username'];?></td>
              <td><?php echo $user['email'];?></td>
              <td>
              	<?php if($user['disabled']):?>
              		YES
              	<?php else:?>
              		NO
              	<?php endif;?>
              </td>
              <td>
              	<?php if($user['disabled']):?>
              		<a href="<?php echo base_url().'users/enable/'.$user['user_id'];?>" class="btn btn-success btn-sm">Enable</a>&nbsp;&nbsp;
              	<?php else:?>
              		<a href="<?php echo base_url().'users/disable/'.$user['user_id'];?>" class="btn btn-danger btn-sm">Disable</a>&nbsp;&nbsp;
              	<?php endif;?>
              	<a href="<?php echo base_url().'users/view/'.$user['user_id'];?>" class="btn btn-info btn-sm">View</a>&nbsp;&nbsp;
              	<a href="<?php echo base_url().'users/resetPassword/'.$user['user_id'];?>" class="btn btn-warning btn-sm">Reset Password</a>
              </td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
     

