<?php 

$date = date('d-m-y');

//check if user has been disabled
if($details['disabled'] == TRUE){
    echo '<p class="alert alert-danger"><b>USER HAS BEEN DISABLED</b></p>';
}else{
    
    //check if user holds a valif membership
    if($details['expires_on'] >= $date){
        echo '<p class="alert alert-success"><b>VALID MEMBERSHIP</b></p>';
    }else{
        echo '<p class="alert alert-danger"><b>ACCESS DENIED</b></p>';
    }

}
    
    
?>


<h2>User #<?php echo $details['user_id'];?></h2></br></br>


<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">User Details</th>
              <th>
              	<a href="<?php echo base_url().'checkins/checkin/'.$details['user_id'];?>" class="btn btn-success btn-sm">Check-in</a>
 			  </th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td><b>Name:</b></td>
                  <td><?php echo $details['name'];?></td>
              </tr>
              <tr>
                  <td><b>Surname:</b></td>
                  <td><?php echo $details['surname'];?></td>
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
                  	  $date = $details['created_at'];
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
                  <td><?php echo $details['username'];?></td>
              </tr>
               <tr>
                  <td><b>Role: </b></td>
                  <td><?php echo $details['role'];?></td>
              </tr>
              <tr>
                  <td><b>Disabled: </b></td>
                  <td>
                      <?php 
                          if($details['disabled']){
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
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Membership Details</th>
              <th>
              	<a href="<?php echo base_url().'assign/'.$user['user_id'];?>" class="btn btn-info btn-sm">Renew Membership</a>
              </th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td><b>Membership:</b></td>
                  <td><?php echo $details['membership'];?></td>
              </tr>
              <tr>
                  <td><b>Expiry:</b></td>
                  <td><?php echo $details['expires_on'];?></td>
              </tr>
          </tbody>
      </table>
</div>