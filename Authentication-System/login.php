<?php include_once("partials/_err.php") ?>
<?php include_once("partials/_dbconnect.php") ?>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {


  $username = $_POST['username'];
  $password = $_POST['password'];
  $loggedin = false;
  $showErr = false;


  $sql = "SELECT * FROM `signup` WHERE `username` = '$username' and `password` = '$password'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);


  if ($num == 1) {
    $loggedin = true;
    session_start();
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    header("location: index.php");
  } else {
    $showErr = true;
  }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Authentication-System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
  <?php include_once("partials/_nav.php") ?>

  <?php

  if ($loggedin) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Sucsess!</strong> You are Logged in successfully
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    header("location:index.php");
  }

  if ($showErr) {
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Error!</strong> Invalid Credetials!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }


  ?>

  <div class="container py-5">
    <h1 class="text-center py-3">Login To Our Website</h1>
    <form action="/Authentication-System/login.php" method="post">
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" aria-describedby="usernameHelp">
        <div id="usernameHelp" class="form-text">We'll never share your username with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
    crossorigin="anonymous"></script>
</body>

</html>