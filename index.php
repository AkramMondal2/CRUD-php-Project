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
        include "./dbConnection.php";
        $sql = "SELECT * FROM `crud`";
        $result = mysqli_query($conn,$sql);
        $noRow = mysqli_num_rows($result);
        if ($noRow < 1) {
          echo  '<div class="container col-md-8 mt-5">
                    <h1 class="text-center">PHP CRUD</h1>
                     <a type="button" class="btn btn-primary mb-4 mt-5" href="./form.php">Add Record</a>
                    <h1>Nothing to display Add Record</h1>
            </div>';
        }else{
            echo '<div class="container col-md-8 mt-5">
        <h1 class="text-center">PHP CRUD</h1>
        <a type="button" class="btn btn-primary mb-4 mt-5" href="./form.php">Add Record</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo' <tr>
                    <th>'.$row["name"].'</th>
                    <td>'.$row["email"].'</td>
                    <td>'.$row["phone"].'</td>
                    <td>
                        <a type="button" class="btn btn-success" href="./edit.php?edit_id='.$row["sno"].'">Edit</a>
                        <a type="button" class="btn btn-danger" href="./delete.php?del_id='.$row["sno"].'">Delete</a>
                    </td>
                </tr>';
            };
            echo '</tbody>
        </table>
    </div>';
        }
    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>