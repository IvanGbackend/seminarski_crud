<?php
include '../connect.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $role_id = $_POST['role_id'];

    $sql = "insert into `Users` (username,password,role_id)
    values('$username','$password','$role_id')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        //echo "Data inserted successfully";
        header('location: ../users.php');
    } else {
        die(mysqli_error($con));
    }
}


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    

    <title>Seminarski rad</title>

    <style>
        div.header{
            font-family: poppins;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0px 60px;
            background-color: #204969;
        }
        div.header button{
            background-color: #f0f0f0;
            font-size: 16px;
            font-weight: 550;
            padding: 8px 12px;
            border: 2px solid black;
            border-radius: 5px;
        }
    </style>   
</head>

<body>
    <?php
        include '../menu.php';
    ?>
    <div class="container my-5">

        <form method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" 
                placeholder="Enter your username" name="username" autocomplete="off">

            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" 
                placeholder="Enter your password" name="password" autocomplete="off">

            </div>
            <div class="form-group">
                <label>Role</label>
                <select name="role_id">
                    <?php
                        $sql="Select * from `Roles`";
                        $result=mysqli_query($con,$sql);
                        foreach ($result as $row) {
                            echo("<option value='{$row['id']}'>{$row['name']}</option>");
                        }
                    ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>