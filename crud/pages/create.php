<?php
include '../connect.php';
if (isset($_POST['submit'])) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $tempname = $_FILES["image"]["tmp_name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $image_link = $target_file;
    $text = $_POST['text'];
    $user_id = $_SESSION['user_id'];

    $sql = "insert into `Pages` (image_link, text, user_id)
    values('$image_link', '$text', '$user_id')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        //echo "Page created";
        header('location: ../pages.php');
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

        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" id="image">
            </div>

            <div class="form-group">
                <label>Page text</label>
                <textarea name="text" rows="4" cols="50">
                </textarea>
            </div>


            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>


</body>

</html>