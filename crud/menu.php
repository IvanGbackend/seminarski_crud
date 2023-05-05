<html>
    <head>
        <link rel="stylesheet" href="mycss.css">
    </head>
    <body>

<div class="header">
    <h1>WELCOME TO ADMIN PANEL</h1>
    <form method="POST">
        <button name="Logout">LOG OUT</button>
    </form>
</div>
</body>
</html>
<?php
if(isset($_POST['Logout']))
{
    session_destroy();
    header("location:/crud/login.php");
}
if(!isset($_SESSION['user_id']))
{
    header("location:/crud/login.php");
}

$query="SELECT u.id as id, r.name as role FROM Users as u join Roles as r on u.role_id = r.id WHERE u.id = {$_SESSION['user_id']}";
$result = mysqli_query($con, $query);
$user=mysqli_fetch_assoc($result);
$isAdmin = false;
if ($user['role'] == 'admin') {
    $isAdmin = true;
}

$adminPages = $isAdmin ? "
<li><a href='/crud/users.php'>Users</a></li>
<li><a href='/crud/roles.php'>Roles</a></li>
" : "";

echo("<div>
    <ul>
        <li><a href='/crud/index.php'>Home</a></li>
        {$adminPages}
        <li><a href='/crud/pages.php'>Pages</a></li>
    </ul>
</div>");
?>