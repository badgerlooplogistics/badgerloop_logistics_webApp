<?php

require_once("includes/database.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['passwordConfirm']);
    if ($password == $confirmPassword) {
        $md5pass = md5($password);
        $id = $_POST['userId'];
        $query = "UPDATE users SET password = '{$md5pass}' WHERE id={$id}";
        mysqli_query($conn, $query);
        header("Location: login.php?mess=changedpassword");
    }
}

// if form is submitted
if (isset($_GET['id']) && isset($_GET['code'])) {
    $id = $_GET['id'];
    $code = $_GET['code'];

    $query = "SELECT * FROM users WHERE id={$id} AND secret_code = '{$code}'";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 0) {
        header("Location: forgotpassword.php");
    }
} else {
    header("Location: forgotpassword.php");
}
?>
<!doctype html>
<html>
<head>
    <title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.min.css" />
    <!--    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>
<body id="loginPage">
<div>
    <header>

    </header>
    <div id="loginPage">
        <form action="" method="post">
            <h1 id="loginHeader">Change Password</h1>
            <input type="password" placeholder="New password" name="password" required autofocus><br>
            <input type="password" placeholder="Confirm new password" name="passwordConfirm" required><br>
            <input type="hidden" value="<?php echo $_GET['id']; ?>" name="userId">
            <input type="submit" class="btn btn-primary" value="Submit" style="font-weight: 300">
        </form>
    </div>
    <footer>

    </footer>
</div>
</body>
</html>
