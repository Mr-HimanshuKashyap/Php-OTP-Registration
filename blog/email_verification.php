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
<div class="text-center">
    <h3>Enter OTP</h3>
</div>
<form action="endpoint.php" method="post">
<div class="mb-3 first_box">

  </div>
  <div class="mb-3 first_box">
    <label for="email" class="form-label">Enter OTP</label>
    <input type="text" class="form-control" id="otp" name="otp"  required >
  </div>

 <div class="mb-3 first_box">
  <button type="submit" name="verify_email" class="btn btn-primary">Verify</button>
  </div>
</form>
</div>  

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.js"></script>
</body>
</html>
