		
		
		<div class="row">
			<div class="col-lg-6 col-md-6">
    			<h1><?php echo $title;?></h1>
    		</div>
    		<div class="col-lg-6 col-md-6">
			<?php if($this->session->userdata('role') != 3):?>
    			<a href="<?php echo base_url().'users';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">All Users</a>&nbsp;
    			<a href="<?php echo base_url().'members';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Members</a>&nbsp;
    			<a href="<?php echo base_url().'trainers';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Tainers</a>&nbsp;
    			<a href="<?php echo base_url().'admins';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Administrators</a>&nbsp;
    			<a href="#" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Assigned Members</a>
			<?php endif;?>
    		</div>
		</div>
		
		<div class="row">
		

		</div>
		
		<br>
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
              	<a href="<?php echo base_url().'users/view/'.$user['user_id'];?>" class="btn btn-info btn-sm">View</a>&nbsp;&nbsp;
              	<a href="<?php echo base_url().'users/resetPassword/'.$user['user_id'];?>" class="btn btn-warning btn-sm">Reset Password</a>
              </td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
     

