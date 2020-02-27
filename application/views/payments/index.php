
		
		<div class="row">
    			<h1><?php echo $title;?></h1>
		</div>
		
		<table class="table table-sm">
          <thead class="thead-dark">
            <tr>
              <th scope="col">Payment ID</th>
              <th scope="col">Payer</th>
              <th scope="col">Product</th>
              <th scope="col">Payment Gross</th>
              <th scope="col">Payer PayPal Email</th>
              <th scope="col">Payment Status</th>
              <th scope="col">Payment Date</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($payments as $payment) : ?>
          
          <tr>
              <td>#<?php echo $payment['payment_id'];?></td>
              <td><a href="<?php echo base_url().'users/view/'.$payment['user_id'];?>"><?php echo $payment['username'];?></a></td>
              <td><?php echo $payment['name'];?></td>
              <td>&euro;<?php echo $payment['payment_gross'];?></td>
              <td><?php echo $payment['payer_email'];?></td>
              <td><?php echo $payment['payment_status'];?></td>
              <td>
              		<?php 
                  	  $date = $payment['payment_date'];
                  	  $convertDate = date(DATE_RFC850, strtotime($date));
                  	  echo $convertDate;
                  	?>
              </td>

          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
     

