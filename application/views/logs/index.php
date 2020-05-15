		
		
		<div class="row">
			<div class="col-lg-6 col-md-6">
    			<h1><?php echo $title;?></h1>
    		</div>
    		<div class="col-lg-6 col-md-6">
        		<?php echo form_open('logs/search');?>
        			<div class="form-row align-items-center">
        				<div class="col-auto">
        					<input type="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search..." name="search">
        				</div>
        				<div class="col-auto">
        					<button type="submit" class="btn btn-primary">Search</button>
        				</div>
        			</div>
        		<?php echo form_close();?>
    		</div>
		</div>
		
		<div class="row">
		

		</div>
		
		<br>
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Log ID</th>
              <th scope="col">Username</th>
              <th scope="col">Log</th>
              <th scope="col">Time</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($logs as $log) : ?>
          
          <tr>
              <td>#<?php echo $log['log_id'];?></td>
              <td><a href="<?php echo base_url().'users/view/'.$log['user_id']; ?>"><?php echo $log['username'];?></td>
              <td><?php echo $log['log'];?></td>
              <td><?php echo $log['time'];?></td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
     

