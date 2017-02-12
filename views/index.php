<?php
include_once "../vendor/autoload.php";
use App\TestCrud\TestCrud;

$obj = new TestCrud();

$allData = $obj->index();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Index page</title>
</head>
<body>
<a href="create.php">create page</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>last Name</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($allData as $key => $value){ ?>
    <tr>
        <td><? echo $key+1; ?></td>
        <td><? echo $value['fname']; ?></td>
        <td><? echo $value['lname']; ?></td>
        <td><a href="show.php?id=<? echo $value['id']?>">Show</a></td>
        <td><a href="edit.php?id=<? echo $value['id']; ?>">Edit</a></td>
        <td><a href="delete.php?id=<? echo $value['id']; ?>">Delete</a></td>
    </tr>
    <? } ?>
    </tbody>
</table>
</body>
</html>
