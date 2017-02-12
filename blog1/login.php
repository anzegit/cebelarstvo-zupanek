<?php
session_start();

if (isset($_POST['login'])) {
    include_once("db.php");
    $username = strip_tags($_POST['username']);
    $password = strip_tags($_POST['password']);

    $username = stripslashes($_POST['username']);
    $password = stripslashes($_POST['password']);

    $username = mysqli_real_escape_string($db, $username);
    $password = mysqli_real_escape_string($db, $password);

    $password = md5($password);

    $sql = "SELECT * FROM users WHERE username='$username' LIMIT 1";
    $query = mysqli_query($db, $sql);
    $row = mysqli_fetch_array($query);
    $id = $row['id'];
    $db_password = $row['password'];
    $admin = $row['admin'];

    if ($password == $db_password) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $id;
        if ($admin == 1) {
            $_SESSION['admin'] = 1;
        }

        header("Location: index.php");
    } else {
        echo "You didn't enter the correct details!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>

<body>
<h1 style="font-family: Tahoma;">Login</h1>
<form action="login.php" method="post" enctype="multipart/form-data">
    <input placeholder="Username" name="username" type="text" autofocus>
    <input placeholder="Password" name="password" type="password">
    <input name="login" type="submit" value="Login">
</form>
</body>
</html>
