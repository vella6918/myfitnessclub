<?php 
    //echo errors
    echo validation_errors();
?>

<?php 
echo form_open('workouts/update/'.$workout['workout_id']);
?>


    <div class="justify-content-center align-items-center row">
    	
    	<div >

        	<h1 class="text-center"><?php echo $title; ?></h1>
        		
                 	<div class="form-group">
                		<label><b>Workout Title</b> </label>
                		<input type="text" class="form-control" name="workout" value="<?php echo $workout['workout'];?>" required autofocus>
                	</div>
        	
                	<div class="form-group">
           	
                    <table class="table table-sm" id="exercises">
                      <thead>
                      	<tr>
                      		<th scope="col">Exercises</th>
                      		<th scope="col">Sets</th>
                      		<th scope="col">Reps</th>
                      		<th></th>
                      	</tr>
                      </thead>
                  	  <tbody>
                  	  
                  	  <?php foreach ($selected_exercises as $x):?>
                      	  <tr>
                      	  	<td>
                        		<select name="w_name[]" id="w_name" class="form-control">
                        			<option value="<?php echo $x['exercise_id']; ?>"><?php echo $x['exercise'];?></option>
                                  <?php  foreach ($exercises as $exercise) : ?>
                    				<option  value="<?php echo $exercise['exercise_id']; ?>"><?php echo $exercise['exercise'];?></option>
                                  <?php endforeach;?>
                              	</select>
                          	</td>
                          	
                          	<td>
                    			<input type="text" name="sets[]" id="sets" class="form-control"  value="<?php echo $x['sets'];?>" autocomplete="off" required autofocus>
                    		</td>
                    		
                    		<td>
                    			<input type="text" class="form-control" name="reps[]" id="reps" value="<?php echo $x['reps'];?>" required autofocus>
                    		</td>
                    		
                    		<!-- hiding and posting the slug -->
                    		<input type="hidden" name="slugs[]" value="<?php echo $x['slug'];?>">
            	 			<?php endforeach;?>
            	 			 
                    		<td>
                    			<button type="button" name="add" id="add" class="btn btn-success btn-sm">Add</button>
                    		</td>
                    	  </tr>	
                    	  
                    	  
                    	  
    
                    	  
                	  </tbody>
        	 		</table> 
        			</div>
        
        			<div class="formgroup">
            			<button type="submit" class="btn btn-primary btn-block">Update</button>
                    </div>
                </div>
            </div>

  
<?php echo form_close();?>


 <script>  
 $(document).ready(function(){  
     var i=1;  
     $('#add').click(function(){  
          i++;  
          $('#exercises').append('<tr id="row'+i+'"><td><select name="new_exercise[]" id="new_exercise" class="form-control"><option>Exercise '+i+'</option><?php  foreach ($exercises as $exercise) : ?><option  value="<?php echo $exercise['exercise_id'] ?>"><?php echo $exercise['exercise'];?></option><?php endforeach;?></select></td><td><input type="text" name="new_sets[]" id="new_sets" class="form-control"  placeholder="Sets" autocomplete="off" required autofocus></td><td><input type="text" class="form-control" name="new_reps[]" id="new_reps" placeholder="Reps" required autofocus></td><td><button type="button" name="remove" id='+i+' class="btn btn-danger btn_remove btn-sm">X</button></td>');  
     });
     $(document).on('click', '.btn_remove', function(){  
         var button_id = $(this).attr("id");   
         $('#row'+button_id+'').remove(); 
         i--; 
    });    
}); 
 </script>