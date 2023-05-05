<?php
    require("Connection.php");
?>
<html>
    <head>
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1 user-scalable=no">
        <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.0.7/css/all.css">
        <link rel="stylesheet" type="text/css" href="mycss.css">
    </head>

<body>
    <div class="login-form">
        <h2>Login</h2>
        <form method="POST">
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Username" name="username">
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" placeholder="Password" name="password">
            </div>

            <button type="submit" name="SignIn">Sign In</button>

            
        </form>
    </div>
<?php
if(isset($_POST['SignIn']))
{
    $hashPassword = md5($_POST['password']);
    $query="SELECT * FROM `Users` WHERE `username`='$_POST[username]' AND `password`='$hashPassword'";
    $result = mysqli_query($con, $query);
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)==1)
    {
        session_start();
        $_SESSION['user_id']=$row['id'];
        header("location: index.php");
    }
    else
    {
        echo"<script>alert('Incorrect password');</script>";
    }
}
?>
            
</body>
</html>