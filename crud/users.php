<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seminarski rad</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="mycss.css">

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
<body>
    <?php
        include 'menu.php';
    ?>
    <div class="container">
    <button class="btn btn-primary my-5"><a href="users/create.php"
        class="text-light">Add user</a>
    </button>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Role</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

            <?php
            $sql="Select u.id as id, u.username as username, r.name as role from Users as u join Roles as r on u.role_id = r.id";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $id=$row['id'];
                    $name=$row['username'];
                    $role=$row['role'];
                    echo '<tr>
                    <th scope="row">'.$id.'</th>
                    <td>'.$name.'</td>
                    <td>'.$role.'</td>
                    <td>
                        <button class="btn btn-primary"><a href="users/update.php?id='.$id.'" class="text-light">Update</a></button>
                        <button class="btn btn-danger"><a href="users/delete.php?id='.$id.'" class="text-light">Delete</a></button>
                    </td>
                    </tr>';
                }
            }
            ?>
            
            
            </tbody>
        </table>
        
    </div>
</body>
</html>