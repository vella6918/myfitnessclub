<?php 
    //echo errors
    echo validation_errors();
?>

<?php 
    $attributes = array('name' => 'add_exercise', 'id' => 'add_exercise');
    echo form_open('workouts/create', $attributes);
?>


    <div class="justify-content-center align-items-center row">
    	
    	<div >

        	<h1 class="text-center"><?php echo $title; ?></h1>
        		
                 	<div class="form-group">
                		<label><b>Workout Title</b> </label>
                		<input type="text" class="form-control" name="workout" placeholder="Workout title" required autofocus>
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
                      	  <tr>
                      	  	<td>
                        		<select name="w_name[]" id="w_name" class="form-control">
                        			<option>Exercise 1</option>
                                  <?php  foreach ($exercises as $exercise) : ?>
                    				<option  value="<?php echo $exercise['exercise_id'] ?>"><?php echo $exercise['exercise'];?></option>
                                  <?php endforeach;?>
                              	</select>
                          	</td>
                          	
                          	<td>
                    			<input type="text" name="sets[]" id="sets" class="form-control"  placeholder="Sets" autocomplete="off" required autofocus>
                    		</td>
                    		
                    		<td>
                    			<input type="text" class="form-control" name="reps[]" id="reps" placeholder="Reps" required autofocus>
                    		</td>
                    		
                    		<td>
                    			<button type="button" name="add" id="add" class="btn btn-success btn-sm">Add</button>
                    		</td>
                    	  </tr>	
                	  </tbody>
        	 		</table> 
        			</div>
        
        			<div class="formgroup">
            			<button type="submit" class="btn btn-primary btn-block">Create</button>
                    </div>
                </div>
            </div>

  
<?php echo form_close();?>


 <script>  
 $(document).ready(function(){  
     var i=1;  
     $('#add').click(function(){  
          i++;  
          $('#exercises').append('<tr id="row'+i+'"><td><select name="w_name[]" id="w_name" class="form-control"><option>Exercise '+i+'</option><?php  foreach ($exercises as $exercise) : ?><option  value="<?php echo $exercise['exercise_id'] ?>"><?php echo $exercise['exercise'];?></option><?php endforeach;?></select></td><td><input type="text" name="sets[]" id="sets" class="form-control"  placeholder="Sets" autocomplete="off" required autofocus></td><td><input type="text" class="form-control" name="reps[]" id="reps" placeholder="Reps" required autofocus></td><td><button type="button" name="remove" id='+i+' class="btn btn-danger btn_remove btn-sm">X</button></td>');  
     });  
     $(document).on('click', '.btn_remove', function(){  
          var button_id = $(this).attr("id");   
          $('#row'+button_id+'').remove(); 
          i--; 
     });  
}); 
 </script>