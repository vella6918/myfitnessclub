

<div class="container col-md-4 col-md-offset-4">
		<h1 class="text-center"><?php echo $title;?></h1></br>
        <?php  foreach ($memberships as $membership) : ?>
            <div class="card text-center">
              <div class="card-header">
                <?php echo $membership['name'];?>
              </div>
              <div class="card-body">
                <h5 class="card-title">&euro;<?php echo $membership['price'];?></h5>
                <a href="<?php echo base_url().'memberships/buy/'.$membership['membership_id'];?>" class="btn btn-primary">Buy / Renew</a>
              </div>
            </div>
            <br>
        <?php endforeach;?>

</div>

