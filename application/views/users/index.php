
		<h1><?php echo $title;?></h1></br>
		
		<table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
          
          <?php  foreach ($users as $user) : ?>
          
          <tr>
          <td><?php echo $user['name'];?></td>
          <td><?php echo $user['surname'];?></td>
          <td><?php echo $user['username'];?></td>
          <td><?php echo $user['email'];?></td>
          </tr>
          
          <?php endforeach;?>
       	</tbody>
	 </table> 
     

