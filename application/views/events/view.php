<h2><?php echo $event['title'];?></h2></br></br>


<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Event Details</th>
              <th>
              	<?php if($this->session->userdata('role') == 3):?>
              		<?php if($join == FALSE):?>
              			<a href="<?php echo base_url().'events/join/'.$event['id'];?>" class="btn btn-info btn-sm">Join</a>
              		<?php endif;?>
              	<?php else:?>                           	
              	<a href="<?php echo base_url().'events/edit/'.$event['id'];?>" class="btn btn-info btn-sm">Edit</a>&nbsp;&nbsp;
              	<a href="<?php echo base_url().'events/delete/'.$event['id'];?>" class="btn btn-warning btn-sm">Delete</a>
              	<?php endif;?>
              </th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td><b>Title:</b></td>
                  <td><?php echo $event['title'];?></td>
              </tr>
              <tr>
                  <td><b>Start Date and Time:</b></td>
                  <td><?php echo $event['start_event'];?></td>
              </tr>
              <tr>
                  <td><b>End Date and Time:</b></td>
                  <td><?php echo $event['end_event'];?></td>
              </tr>
              <tr>
                  <td><b>Trainer:</b></td>
                  <td><?php echo $event['name'];?>&nbsp;<?php echo $event['surname'];?></td>
              </tr>
          </tbody>
      </table>
</div>
</br>


<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Joiners</th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
              <?php foreach ($joiners as $joiner):?>
              <tr>
                  <td><b>Username:</b></td>
                  <td><?php echo $joiner['username'];?></td>
              </tr>
              <?php endforeach;?>
          </tbody>
      </table>
</div>


