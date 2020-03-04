<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'check';?>">Checkin <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'all_checkins';?>">All Checkins</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

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
     