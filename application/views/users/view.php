<h2>User #<?php echo $user['user_id'];?></h2></br></br>


<div>
		<table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">User Details</th>
              <th>
              
              	<?php if($user['disabled']):?>
              		<a href="<?php echo base_url().'users/enable/'.$user['user_id'];?>" class="btn btn-success btn-sm">Enable</a>&nbsp;&nbsp;
              	<?php else:?>
              		<a href="<?php echo base_url().'users/disable/'.$user['user_id'];?>" class="btn btn-danger btn-sm">Disable</a>&nbsp;&nbsp;
              	<?php endif;?>
              	
              	<a href="<?php echo base_url().'users/edit/'.$user['user_id'];?>" class="btn btn-info btn-sm">Edit</a>&nbsp;&nbsp;
              	<a href="<?php echo base_url().'users/resetPassword/'.$user['user_id'];?>" class="btn btn-warning btn-sm">Reset Password</a>
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
                  <td></td>
              </tr>
              <tr>
                  <td><b>Date of Birth:</b></td>
                  <td></td>
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
                  <td></td>
              </tr>
              <tr>
                  <td><b>Username: </b></td>
                  <td><?php echo $user['username'];?></td>
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
          </tbody>
      </table>
</div>
</br>
<div>
		<table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Membership Details</th>
              <th>
              	<a href="<?php echo base_url()?>" class="btn btn-info btn-sm">Renew Membership</a>
              	<a href="<?php echo base_url();?>" class="btn btn-info btn-sm">Buy New Membership</a>
              </th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td><b>Membership:</b></td>
                  <td></td>
              </tr>
              <tr>
                  <td><b>Expiry:</b></td>
                  <td></td>
              </tr>
          </tbody>
      </table>
</div>


