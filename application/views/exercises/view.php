<h2><?php echo $exercise['exercise'];?></h2></br></br>


<div>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Exercise Details</th>
              <th>
              <?php if($this->session->userdata('role') == 1):?>
              	<a href="<?php echo base_url().'exercises/edit/'.$exercise['exercise_id'];?>" class="btn btn-warning btn-sm">Edit</a>&nbsp;&nbsp;
              	<a href="<?php echo base_url().'exercises/delete/'.$exercise['exercise_id'];?>" class="btn btn-danger btn-sm">Delete</a>
              <?php endif;?>
              </th>
            </tr>
          </thead>
          <tbody>
              <tr>
                  <td><b>Exercise:</b></td>
                  <td><?php echo $exercise['exercise'];?></td>
              </tr>
              <tr>
                  <td><b>Details:</b></td>
                  <td><?php echo $exercise['details'];?></td>
              </tr>
              <tr>
                  <td><b>Muscle Group:</b></td>
                  <td><?php echo $muscle_group['muscle'];?></td>
              </tr>
          </tbody>
      </table>
</div>


<div class="embed-responsive embed-responsive-21by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $exercise['video'];?>?autoplay=1&controls=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>

