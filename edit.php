<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
        //Show detaili on filed
          include "./dbConnection.php";
          $id = $_GET['edit_id'];
          $sql = "SELECT * FROM `crud` WHERE `sno`=$id";
          $result = mysqli_query($conn,$sql);
          $row = mysqli_fetch_assoc($result);
        //Update record 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $sql = "UPDATE `crud` SET `sno`='$id', `name`='$name',`email`='$email',`phone`='$phone' WHERE `sno`=$id";
            $result = mysqli_query($conn,$sql);
            if ($result) {
                header("location:./index.php");
            }else{
                echo "Error: ". mysqli_error($conn);
            }
        }
    ?>
    <div class="container col-md-8 mx-auto mt-5">
        <h1 class="text-center">Update Details</h1>
        <form action="<?php $_SERVER['REQUEST_URI'] ?>" method="POST">
        <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value=<?php echo $row['name'] ?>>
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value=<?php echo $row['email'] ?> aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="number"  class="form-control" id="phone" name="phone" value=<?php echo $row['phone'] ?>>
            </div>
        
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>