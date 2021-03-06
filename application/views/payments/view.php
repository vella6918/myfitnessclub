


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>#<?php echo $payment['payment_id'];?></title>
  </head>
  <body>
   	
   	<div class="container">
        <div class="justify-content-center align-items-center row">
        	<h1><?php echo $title;?></h1>
        </div>
        
        </br></br>
        <hr>
        
        <div class="row ">
        	
        	<div class="col-lg-6">
                <p><b>Company Name:</b> My Fitness Club</p>
                <p><b>Payment Date:</b> <?php echo $payment['payment_date'];?></p>
                <p><b>Payment ID:</b> #<?php echo $payment['payment_id'];?></p>
				</br>
                <p><b>Customer Name:</b> <?php echo $payment['name'].' '.$payment['surname'];?></p>
                <p><b>Customer Email:</b> <?php echo $payment['email']?></p>       
                <p><b>Payment Type:</b> <?php echo $payment['payment_type']?></p>
         	</div>
       	
        </div>
        <hr>
   		</br></br>
        <div>
          <table class="table table-sm">
  			<thead class="thead-dark">
                <tr>
                  <th scope="col">Membership Details</th>
                  <th scope="col">Ammount</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td><?php echo $payment['membership']?></td>
                  <td>&euro;<?php echo $payment['price']?></td>
                </tr>
              </tbody>
            </table>
       	</div>       	
	</div>
	
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>