<h2><?php echo $workout['workout'];?></h2></br></br>


<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Workout details:</th>
              <th>
            	
              	<!-- if user is admin or the same person that created the workout the display and edit button will be displayed -->
              	<?php if($this->session->userdata('role') == 1 ||  $this->session->userdata('user_id') == $workout['created_by']):?>
              	<a href="<?php echo base_url().'workouts/edit/'.$workout['workout_id'];?>" class="btn btn-warning btn-sm">Edit</a>
              	<a href="<?php echo base_url().'workouts/delete/'.$workout['workout_id'];?>" class="btn btn-danger btn-sm">Delete</a>
              	<?php endif;?>
              	<?php if($this->session->userdata('role') == 1 ||  $this->session->userdata('role') == 2):?>
              	<a href="<?php echo base_url().'share/'.$workout['workout_id'];?>" class="btn btn-info btn-sm">Share</a>
              	<?php endif;?>
              	
              	
              </th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td><b>Workout Title:</b></td>
                  <td><?php echo $workout['workout'];?></td>
              </tr>
              <tr>
                  <td><b>Owner:</b></td>
                  <td><?php echo $workout['username'];?></td>
              </tr>
              <tr>
                  <td><b>Created On:</b></td>
                  <td>
                     <?php 
                      $date = $workout['created_at'];
                  	  $convertDate = date(DATE_RFC850, strtotime($date));
                  	  echo $convertDate;
                  	?>
                  </td>
              </tr>
          </tbody>
      </table>
</div>
</br></br>
<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Exercises details:</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
          
          		<?php $counter = 1;?>
              
                  <?php foreach($exercises as $exercise): ?>
                  <tr>
                      <td><b>Exercise <?php echo $counter;?>:</b> <?php echo $exercise['exercise'];?></td>
                      <td><b>Sets:</b> <?php echo $exercise['sets'];?></td>
                      <td><b>Reps:</b> <?php echo $exercise['reps'];?></td>
                  </tr>
                  
                  <?php $counter++;?>
                  <?php endforeach;?>
          </tbody>
      </table>
</div>
</br></br>

<!-- display only if user is admin or trainer-->
<?php if($this->session->userdata('role') == 1 ||  $this->session->userdata('role') == 2):?>
<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Shared with:</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
              
                  <?php foreach($users as $user): ?>
                  <tr>
                      
                      <td><b>Username: </b><a href="<?php echo base_url().'users/view/'.$user['user_id']; ?>"><?php echo $user['username'];?></a></td>
                      <td><b>Full Name: </b><?php echo $user['name'];?> <?php echo $user['surname'];?></td>
                  </tr>
                  <?php endforeach;?>
          </tbody>
      </table>
</div>
<?php endif;?>
</br></br>

