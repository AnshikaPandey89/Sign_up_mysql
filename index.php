<?php
$success = 0;
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `registration` WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num = mysqli_num_rows($result);
        if ($num > 0) {
            $user = 1;
        } else {
            $sql = "INSERT INTO `registration` (username, email, password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $success = 1;
                header('location:login.php');
            } else {
                die(mysqli_error($conn));
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom CSS -->
</head>

<body>
    <div class="container">
        <?php
        if ($user) {
            echo '<div class="position-absolute top-0 start-0 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>User Already Exists</strong> Try again with a different name.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
        <?php
        if ($success) {
            echo '<div class="position-absolute top-0 start-0 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registration Successful!</strong> You have successfully registered.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>
        <h2>User Registration</h2>
        <form action="index.php" method="post" id="registrationForm">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
</body>
</html>
