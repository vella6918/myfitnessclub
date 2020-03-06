<h2><?php echo $exercise['exercise'];?></h2></br></br>


<div>
		<table class="table table-sm">
          <thead class="thead-dark">
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
                  <td><b>Muscle Group:</b></td>
                  <td><?php echo $muscle_group['muscle'];?></td>
              </tr>
          </tbody>
      </table>
</div>

</br></br>

<div class="justify-content-center align-items-center row">
    <div class="col-md-5 col-md-offset-5">
    	<iframe width="520" height="415"
        	src="https://www.youtube.com/embed/<?php echo $exercise['video'];?>?autoplay=1">
        </iframe>
    </div>
</div>


