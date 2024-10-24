<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-pzjw8f+ua7Kw1TIq8wRLRRnE7ApCyb4tbk0O3cbsbjjIVZOyN5U0K5lKTM4d1NfQ" crossorigin="anonymous">

    <title>Todos</title>
</head>
<body>
<?php require_once 'conection.php';?>
<div class="container">

<div class="row justify-content-center">
<form action="conection.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id ?>">
<div class="form-group">
<label>Todo..</label>
<input type="text" name="tdo" class="form-control" value="<?php echo $tdo ?>" placeholder="what to do.."/>
</div>
<?php if($update=true): ?>
    <button type="submit" class="btn btn-info" name="update">Update</button>
    <?php else: ?>
<button type="submit" class="btn btn-primary" name="save">Save</button>
<?php endif ?>
</form>
</div>
<?php
$mysql=new mysqli("localhost","root","","testdb") or die(mysqli_error($mysql));
$result=$mysql->query("SELECT * FROM data") or die($mysql->error);
//pre_r($result->fetch_assoc());
?>
<div class="row justify-content-center">
    <table class="table">
        <thead>
            <tr>
                <th>Todo</th>
                <th colspan="2">Action</th>
            </tr>
        </thead> 
        <?php while($row=$result->fetch_assoc()):?>
        <tr>
            <td>
            <?php echo $row['todo'];?>
        </td>
        <td><a href="index.php?edit=<?php echo $row['id'];?>"
    class="btn btn-info">Edit</a>
    <a href="conection.php?delete=<?php echo $row['id'];?>"
    class="btn btn-danger">Delete</a>
</td>
        </tr>
        <?php endwhile ?>
</div>
        </div>
<?php
// function pre_r($array){
//     echo "<pre>";
//     print_r($array);
//     echo "</pre>";
// }
?>
</body>
</html>