<?php
    session_start();
    require_once("includes/database.php");
    //
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "logout") {
            unset($_SESSION['login']);
        }
    }
    // if form is submitted
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if (empty($email) || empty($password)) {
            header("Location: login.php?mess=missing");
        } else {
            // find email
            $query = "SELECT * FROM users WHERE email='".$email."'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) == 0) {
                header("Location: login.php?mess=email");
            } else {
                // check password
                $person = mysqli_fetch_assoc($result);
                if ($password == $person['password']) {
                    $_SESSION['login'] = true;
                    $_SESSION['user'] = $person['id']; // store user id in session
                    $_SESSION['userName'] = $person['name']; // store user name in session
                    $_SESSION['access'] = $person['access'];
                    header("Location: index.php");
                } else {
                    header("Location: login.php?mess=password");
                }
            }
        }
    }

?>
<!doctype html>
<html>
<head>
    <title>Login</title>
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
            <h1 id="loginHeader">Badgerloop Logistics Login</h1>
                <input id="loginHeader" type="email" placeholder=" Email" name="email" required autofocus><br>
                <input id="loginHeader" type="password" placeholder=" Password" name="password" required><br>
                <input id="loginHeader" type="submit" class="btn btn-primary" value="Login"> 
    </form><br />
    </div>
    <footer>

    </footer>
</div>
</body>
</html>

