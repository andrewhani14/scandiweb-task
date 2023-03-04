<?php
require_once 'ProductsValidator.php';
require_once 'ProductsController.php';

$errors = [];

if (isset($_POST['button-save'])) {
  $validation = new ProductsValidator($_POST);

  if (empty($_POST['productType'])) {
    $errors['productType'] = "Please, choose type of a product";
  } else {
    $validation_method = 'validate' . ucfirst($_POST['productType']) . 'Form';
    $errors = $validation->$validation_method();
  }

  if (empty($errors)) {
    ProductsController::create($_POST);
    header("Location: index.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Product</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous" />

  <link rel="stylesheet" href="css/style.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

  <script src="https://kit.fontawesome.com/09d622c225.js" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <div class="row">
      <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h4>Add Product</h4>
        <div>
        <input name="button-save" id="button-save" type="submit" value="Save" form="product_form" class="btn btn-primary" />
        <input name="button-cancel" id="button-cancel" type="button" value="Cancel" class="btn btn-danger" onclick="location.href='index.php'" />
        </div>
      </div>
    </div>
    <hr />
  </header>

  <main class="container-fluid">
    <p>All fields marked with * are required</p>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" id="product_form" name="product_form" method="POST">
      <label for="sku">SKU *</label>
      <br />

      <input autofocus name="sku" required type="text" id="sku" minlength="2" maxlength="20" size="20" autocomplete="off" value="<?= ($_POST['sku']) ?? '' ?>" />
      <span class="check"></span>
      <br />

      <div class="error"><?= $errors['sku'] ?? '' ?></div>

      <br />
      <label for="name">Name *</label>
      <br />

      <input name="name" required type="text" id="name" minlength="2" maxlength="20" size="20" autocomplete="off" value="<?= ($_POST['name']) ?? '' ?>" />
      <span class="check"></span>
      <br />

      <div class="error"><?= $errors['name'] ?? '' ?></div>

      <br />
      <label for="price">Price ($) *</label>
      <br />

      <input name="price" required type="text" id="price" minlength="1" maxlength="10" autocomplete="off" value="<?= ($_POST['price']) ?? '' ?>" />
      <span class="check"></span>
      <br />

      <div class="error"><?= $errors['price'] ?? '' ?></div>
      <br />

      <label for="productType">Type of product *</label>
      <br />

      <div class="select">
        <select name="productType" required id="productType">
          <option value="">Select Type</option>
          <option value="dvd">DVD</option>
          <option value="furniture">Furniture</option>
          <option value="book">Book</option>
        </select>
        <span class="focus"></span>
      </div>

      <div id="genContent"></div>
    </form>
    <br />
  </main>

  <footer>
    <hr />
    <h6>Scandiweb Test assignment</h6>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  <script src="validation.js"></script>
</body>

</html>