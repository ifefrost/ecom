<?php
  require('db_conn.php');
  require_once("functions.inc.php");
  redirectIfNotLoggedIn(); 

  $query = 'SELECT * FROM products'; // replace with paramertized query using mysqli_stmt_bind_param for asynchronous work task
  $results = $pdo->query($query);
 
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://quotes15.p.rapidapi.com/quotes/random/",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: quotes15.p.rapidapi.com",
		"X-RapidAPI-Key: 83896e3ec8msh72aeddc177b6912p1ef602jsnbb768a8686c0"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
 $response=(json_decode($response));

  echo 'quote of the day:';
	echo $response->{'content'};
  echo gettype($response);
}
?>

<!DOCTYPE html>
<html>
  <?php pageheader('Home') ?>
  <body class="container">
    <div class="container">
      <div class="row">
        <?php
          while($row = $results->fetch())
          {   
            echo' 
              <div class="col-lg-4 col-md-6 col-sm-12 mb-5 mt-5">
                <div class="card">
                  <img src='.$row['product_img'].' class="card-img-top" name="product_img" alt="notfound">
                  <div class="card-body">
                    <h5 class="card-title">
                      '.$row['product_name'].'
                    </h5>
                    <p class="card-text">
                      Description: '.$row['product_description'].' 
                    </p>
                    <p class="card-text">
                      Price:&dollar; '.$row['product_price'].' 
                    </p>
                  </div>
                  <a href="product.php?id='.$row['product_id'].'" class="btn btn-primary">View Product</a>
                </div>
              </div>
            ';
          }
        ?>
      </div>
    </div>
    <?php footer() ?>
  </body>
</html>

