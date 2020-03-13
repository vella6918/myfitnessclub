<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'messages/create';?>">Create <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url().'inbox';?>">Inbox</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url().'sent';?>">Sent</a>
      </li>
    </ul>
  </div>
</nav>
		
		
		
		
		
		<div class="row">
    		<div class="col-lg-6">
    			<h1><?php echo $title;?></h1>
    		</div>
		</div>
		
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Message ID</th>
              <th scope="col">Subject</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($messages as $message) : ?>
          
          <tr>
              <td><a href="<?php echo base_url().'messages/view/'.$message['message_id'];?>"><?php echo $message['message_id'];?></a></td>
              <td><?php echo $message['subject'];?></td>
          </tr>
          <?php endforeach;?>
       	</tbody>
	 </table> 
     