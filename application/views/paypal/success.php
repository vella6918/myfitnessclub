<div class="card">
  <div class="card-header">
    Thank you! Your payment was successful.
  </div>
  <div class="card-body">
    <h5 class="card-title">Payment Details:</h5>
    <p class="card-text"><b>Item Name : </b><span><?php echo $item_name; ?></span></p>
    <p class="card-text"><b>Item Number : </b><span><?php echo $item_number; ?></span></p>
    <p class="card-text"><b>TXN ID : </b><span><?php echo $txn_id; ?></span></p>
    <p class="card-text"><b>Amount Paid : </b><span>$<?php echo $payment_amt.' '.$currency_code; ?></span></p>
    <p class="card-text"><b>Payment Status : </b><span><?php echo $status; ?></span></p>
    
    <a href="<?php echo base_url();?>payments" class="btn btn-primary">View Payments</a>
  </div>
</div>