<?php
include 'connection.php';
$obj = new Model();

if (isset($_GET['deleteid'])) {
    $deleteid = $_GET['deleteid'];
    $obj->delete_record($deleteid);
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <h3>Insert Record</h3>
    <form action="endpoint.php" method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
      </div>
      <div class="mb-3">
        <label for="color" class="form-label">Color</label>
        <input type="text" class="form-control" id="color" name="color">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" name="price">
      </div>
      <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
    </form>
    <h3>Products Table</h3>
    <table class="table">
      <thead>
        <tr class="text-center">
          <th scope="col">Id</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Color</th>
          <th scope="col">Product Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $data = $obj->fetch_products();
        $sno = 0;
       foreach ($data as $row) {  $sno = $sno +1; ?>
          <tr class="text-center">
            <td><?php echo $sno ?></td>
            <td><?php echo $row['P_name']; ?></td>
            <td><?php echo $row['P_color']; ?></td>
            <td><?php echo $row['P_price']; ?></td>
            <td><a href="view.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">View</a>
              <a href="update.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary">Edit</a>
              <a href="index.php?deleteid=<?php echo $row['id'] ?>" class="btn btn-danger" onclick="return del_data()">Delete</a>
            </td>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>