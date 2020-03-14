<a href="<?php echo base_url().'check';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Checkin</a>&nbsp;
<a href="<?php echo base_url().'all_checkins';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">All Checkins</a>&nbsp;

<hr>


<div class="row">
	<div class="col-lg-6">
		<h1><?php echo $title;?></h1>
	</div>
</div>

<table class="table table-sm">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Checkin ID</th>
      <th scope="col">Member</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
  
  <?php  foreach ($checkins as $checkin) : ?>
  
  <tr>
      <td><?php echo $checkin['checkin_id'];?></td>
      <td><a href="<?php echo base_url().'users/view/'.$checkin['user_id'];?>"><?php echo $checkin['username'];?></a></td>
      <td>
      	<?php 
      	  $date = $checkin['created_at'];
      	  $convertDate = date(DATE_RFC850, strtotime($date));
      	  echo $convertDate;
      	?>
	  </td>
 
  </tr>
  
  <?php endforeach;?>
</tbody>
</table> 
     