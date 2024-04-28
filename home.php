<?php
session_start();
if(!isset($_SESSION['username'])){
    header('loaction:login.php');
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center text-success mt-5">Welcome
        <?php
        echo $_SESSION['username'];
        ?>

        <div class="container">
            <a href="logout.php " class="btn btn-primary mt-5">Logout</a>
        </div>

    </h1>
    </body>
</html>