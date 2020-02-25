<h2><?php echo $exercise['exercise'];?></h2></br></br>


<div>
		<table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Exercise Details</th>
              <th>
              	
              	<a href="<?php echo base_url().'exercises/edit/'.$exercise['exercise_id'];?>" class="btn btn-warning btn-sm">Edit</a>&nbsp;&nbsp;
              	<a href="<?php echo base_url().'exercises/delete/'.$exercise['exercise_id'];?>" class="btn btn-danger btn-sm">Delete</a>
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
                  <td><b>Video:</b></td>
                  <td><?php echo $exercise['video'];?></td>
              </tr>
              <tr>
                  <td><b>Muscle Group:</b></td>
                  <td><?php echo $exercise['group_id'];?></td>
              </tr>
          </tbody>
      </table>
</div>



