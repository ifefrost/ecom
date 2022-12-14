<?php
  require('./db/db_conn.php');
  require_once("./db/functions.inc.php");
  redirectIfNotLoggedIn();

  if (isset($_GET['id'])) {
    $query = $pdo->prepare('SELECT * FROM products WHERE product_id = ?'); // replace with paramertized query using mysqli_stmt_bind_param for asynchronous work task
    $query->execute([$_GET['id']]);
    $product = $query->fetch(PDO::FETCH_ASSOC);

    if (!$product) {
      die('Product does not exist!');
    }
  } else {
    die('Product does not exist!');
  }

  if($_SERVER['REQUEST_METHOD']=='POST')
  {
    addToCart($_POST);
  }
?>
<!DOCTYPE html>
<html>
  <?php pageheader('Product | '.$product['product_name'].'') ?>
  <body class="container">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
            <img src=<?php echo $product['product_img'] ?> class="card-img-top mb-5 mb-md-0" >
        </div>
        <div class="col-md-6">
            <h1 class="display-5 fw-bolder">
                <?php echo $product['product_name'] ?>
            </h1>
            <div class="fs-5 mb-5">
                <span> &dollar;<?php echo $product['product_price'] ?> </span>
            </div>
            <p class="lead">
                <?php echo $product['product_description'] ?>
            </p>
            <p class="lead">
                Currently In Stock: <span class="text-success"><?php echo $product['product_qty'] ?></span>
            </p>
            <form method="post">
                <div class="input-group mb-3">
                    <input type="number" name="cart_qty" class="form-control" placeholder="Quantity" aria-label="Quantity" aria-describedby="cart quantity" min="1" max="<?php $product['product_qty'] ?>" required>
                    <input type="hidden" name="product_id" value="<?php echo $product['product_id'] ?>">
                    <button class="btn btn-outline-dark" type="submit"><i class='fas fa-shopping-cart'></i> Add to Cart</button>
                </div>
            </form>
        </div>
    </div>
    <?php footer() ?>
  </body>
</html>
            