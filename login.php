<?php
$invalid = 0;
$login = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "Select * from `registration` where username='$username' and password='$password'";
    
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
        } else {
            $invalid=1;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login </title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom CSS -->
</head>

<body>
    <div class="container">
    <?php
        if ($invalid) {
            echo '<div class="position-absolute top-0 start-0 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Invaild Credentials</strong> Check data and try again .
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <?php
        if ($login) {
            echo '<div class="position-absolute top-0 start-0 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Login Successful!</strong> You have successfully Logged in.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
        <h2>User Login</h2>
        <form action="login.php" method="post" id="registrationForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
