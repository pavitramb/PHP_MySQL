<?php
$mysql=new mysqli("localhost","root","","testdb") or die(mysqli_error($mysql));
$tdo='';
$id=0;
$update=false;

if(isset($_POST['save'])){
    $tdo=$_POST['tdo'];

    $mysql->query("INSERT INTO data(todo) VALUES('$tdo')") or die ($mysql->error);
    header("localhost:index.php");
}

if(isset($_GET['delete'])){
    $id=$_GET['delete'];

    $mysql->query("DELETE FROM data WHERE id=$id") or die($mysql->error());
    header("localhost:index.php");
}

if(isset($_GET['edit'])){
    $id=$_GET['edit'];
    $update=true;
    $res=$mysql->query("SELECT * FROM data WHERE id=$id") or die($mysql->erroe());
    if($res){
        $row=$res->fetch_array();
        $tdo=$row['todo'];
    }
}

if(isset($_POST['update'])){
    $tdo=$_POST['tdo'];
    $id=$_POST['id'];

    $mysql->query("UPDATE data SET todo='$tdo' WHERE id=$id") or die($mysql->error());
    header("localhost:index.php");
}
?>