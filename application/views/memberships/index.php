

		<div class="row">
    		<div class="col">
    			<h1><?php echo $title;?></h1>
    		</div>
    		<div class="col">
    			<?php if($this->session->userdata('administrator') == 1) : ?>
					<a href="<?php echo base_url();?>memberships/create" class="btn btn-primary float-right">Add New Membership</a>
				<?php endif;?>	
			</div>
		</div>
		
		<hr>
		


		<div class="row">
            <?php  foreach ($memberships as $membership) : ?>
            	<div class="col-lg-2">
                    <div class="card ">
                      <div class="card-header">
                        <?php echo $membership['name'];?>
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">&euro;<?php echo $membership['price'];?></h5>
                        <a href="<?php echo base_url().'memberships/buy/'.$membership['membership_id'];?>" class="btn btn-primary">Buy / Renew</a>
                      </div>
                    </div>
                    <br>
                </div>
            <?php endforeach;?>
	 	</div>

