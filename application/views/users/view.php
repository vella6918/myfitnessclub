<h2>User #<?php echo $user['user_id'];?></h2></br></br>


<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">User Details</th>
              <th>
              	<?php if($this->session->userdata('role') == 1):?>
                  	<?php if($user['disabled']):?>
                  		<a href="<?php echo base_url().'users/enable/'.$user['user_id'];?>" class="btn btn-success btn-sm">Enable</a>&nbsp;&nbsp;
                  	<?php else:?>
                  		<a href="<?php echo base_url().'users/disable/'.$user['user_id'];?>" class="btn btn-danger btn-sm">Disable</a>&nbsp;&nbsp;
                  	<?php endif;?>
                <?php endif;?>
                
                <?php if($this->session->userdata('role') == 1 || $this->session->userdata('user_id') == $user['user_id']):?>
                  	<a href="<?php echo base_url().'users/edit/'.$user['user_id'];?>" class="btn btn-info btn-sm">Edit</a>&nbsp;&nbsp;
                  	<a href="<?php echo base_url().'users/resetPassword/'.$user['user_id'];?>" class="btn btn-warning btn-sm">Reset Password</a>
              	<?php endif;?>
              	
              	<?php if($this->session->userdata('role') == 1 && $user['role_id']==3):?>
              	<a href="<?php echo base_url().'users/assign_trainer/'.$user['user_id'];?>" class="btn btn-success btn-sm">Assign Trainer</a>
              	<?php endif;?>
              </th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td><b>Name:</b></td>
                  <td><?php echo $user['name'];?></td>
              </tr>
              <tr>
                  <td><b>Surname:</b></td>
                  <td><?php echo $user['surname'];?></td>
              </tr>
              <tr>
                  <td><b>Mobile Number:</b></td>
                  <td><?php echo $user['mobile'];?></td>
              </tr>
              <tr>
                  <td><b>Date of Birth:</b></td>
                  <td><?php  echo date('d-m-Y', strtotime($user['dob']));?></td>
              </tr>
              <tr>
                  <td><b>Enrolled on:</b></td>
                  <td>
                  	<?php 
                  	  $date = $user['created_at'];
                  	  $convertDate = date(DATE_RFC850, strtotime($date));
                  	  echo $convertDate;
                  	?>
                  </td>
              </tr>
               <tr>
                  <td><b>Gender:</b></td>
                  <td><?php echo $user['gender'];?></td>
              </tr>
              <tr>
                  <td><b>Username: </b></td>
                  <td><?php echo $user['username'];?></td>
              </tr>
         	  <tr>
                  <td><b>Email: </b></td>
                  <td><?php echo $user['email'];?></td>
              </tr>
               <tr>
                  <td><b>Role: </b></td>
                  <td><?php echo $user['role'];?></td>
              </tr>
              <tr>
                  <td><b>Disabled: </b></td>
                  <td>
                      <?php 
                          if($user['disabled']){
                              echo 'YES';
                          }else{
                              echo 'NO';
                          }
                              
                      ?>
                  </td>
              </tr>
              
              <?php if($user['role_id']==3):?>
              <?php if($user['trainer'] != NULL):?>
              	<tr>
                  <td><b>Trainer: </b></td>
                  <td><a href="<?php echo base_url().'users/view/'.$trainer['user_id'];?>"><?php echo $trainer['username'];?></a></td>
              	</tr>
              <?php endif;?>
              <?php endif;?>
          </tbody>
      </table>
</div>
</br>

<!-- Display only if user is trainee -->
<?php 
    if($user['role_id'] == 3):
    $date = date('y-m-d');
?>

<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Membership Details</th>
              <th>
              	<?php     
                    //check if user holds a valid membership
                    if($membership['expires_on'] < $date):
                 ?>
              	<a href="<?php echo base_url().'assign/'.$user['user_id'];?>" class="btn btn-info btn-sm">Renew Membership</a>
              	<?php endif;?>
              </th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td><b>Membership:</b></td>
                  <td><?php echo $membership['membership'];?></td>
              </tr>
              <tr>
                  <td><b>Expiry:</b></td>
                  <td><?php echo $membership['expires_on'];?></td>
              </tr>
          </tbody>
      </table>
</div>

<?php endif;?>


<!-- Display only if user is trainer -->
<?php 
    if($user['role_id'] == 2):
?>

<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Assigned Members:</th>
             </tr>
          </thead>
          <tbody>
              <tr>
					<?php foreach ($trainees as $trainee):?>
						<td><a href="<?php echo base_url().'users/view/'.$trainee['user_id'];?>"><?php echo $trainee['username'];?></a></td>
					<?php endforeach;;?>
              </tr>
          </tbody>
      </table>
</div>

<?php endif;?>

