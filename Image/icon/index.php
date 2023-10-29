<?php include "database.php";

$obj = new database();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OOPS - CRUD</title>
    <link rel="stylesheet" href="css/bootstrap-icons.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="Script/bootstrap.bundle.js"></script>
    
    <!-- MY CSS  & JAVASCRIPT FIles -->
    <link rel="stylesheet" href="css/style.css">
    <style>

    </style>
</head>

<body>
    <div class="container">
        <div class="add_user"><a href="add-user.php">
                <h1>Add</h1>
            </a></div>
        <table class="table table-dark table-striped table-bordered table-hover" style="margin:200px auto;">
            <caption></caption>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Age</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
            <?php $obj->select('stu', '*', null, null, null,3);
            $result = $obj->getResult();
            foreach ($result as list("id" => $id, "name" => $name, "age" => $age)) {
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $age; ?></td>
                    <td><a href="update.php?id=<?php echo $id; ?>"><i class="bi bi-pencil-square"></i>Edit</a></td>
                    <td><a href="delete.php?id=<?php echo $id; ?>">delete</a></td>
                </tr>
            <?php } ?>
        </table>
        <div><?php $obj->pagination('stu', null, null, 3); ?></div>
    </div>
</body>

</html>