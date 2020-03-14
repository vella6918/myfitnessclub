<a href="<?php echo base_url().'create';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Create</a>&nbsp;
<a href="<?php echo base_url().'inbox';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Inbox</a>&nbsp;
<a href="<?php echo base_url().'sent';?>" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">sent</a>&nbsp;
		

<hr>		
		
		
		
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
     