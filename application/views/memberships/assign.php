<?php echo form_open('memberships/assign/'.$user);?>


    <div class="justify-content-center align-items-center row">
    	
        <div class="col-md-6 col-md-offset-4">
        	<h1 class="text-center"><?php echo $title; ?></h1>
        	<div class="form-group">
        		<label>Select a Membership</label>
        		<select name="membership" class="form-control">
            		<?php  foreach ($memberships as $membership) : ?>
            			<option value="<?php echo $membership['membership_id'] ?>"><?php echo $membership['membership']; ?></option>
            		<?php endforeach;?>
            	</select>
        	</div>
        	
        	<button type="submit" class="btn btn-primary btn-block">Pay by Cash</button>
        	
        </div>
    </div>


<?php echo form_close();?>