<?php
require_once 'ProductsController.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Products</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <header>
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h4>Product List</h4>
        <div>
          <button class="btn btn-primary" onclick="location.href='add.php'">
            ADD
          </button>
          <button class="btn btn-danger" id="delete-product-btn" type="submit" name="delete" value="delete" form="delete-checkboxes">
            MASS DELETE
          </button>
        </div>
      </div>
    </div>
    <hr>
  </header>
  <main class="container-fluid">
    <form action="Config/delete.php" method="POST" name="delete-checkboxes" id="delete-checkboxes">
      <div class="row row-cols-md-4 row-cols-sm-2 row-cols-1 g-3">
        <?php
        $objects = ProductsController::fetchData();
        if (!is_null($objects)) {
          foreach ($objects as $object) {
            $result = new Product($object); ?>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <input type="checkbox" class="delete-checkbox" id="checkboxNoLabel" name="checkbox[]" value="<?= $result->getSkus() ?>" />
                  <div class="card-text text-center">
                    <ul>
                      <li><b>SKU: </b><?= $result->getSku() ?></li>
                      <li><b>Name: </b><?= $result->getName() ?></li>
                      <li><b>Price: </b><?= $result->getPrice() ?></li>
                      <li>
                        <?= $result->getAttribute() . $result->getValue() .
                          $result->getUnit() ?>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        <?php }
        } ?>
      </div>
    </form>
  </main>

  <footer>
    <hr />
    <h6>Scandiweb Test assignment</h6>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>