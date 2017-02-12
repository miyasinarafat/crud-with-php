<?php
include_once "../vendor/autoload.php";
use App\TestCrud\TestCrud;

$obj = new TestCrud();
$obj->prepare($_GET);
$oneData = $obj->show();
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
<a href="index.php">index page</a>
<table border="1">
    <thead>
    <tr>
        <th>ID</th>
        <th>First Name</th>
        <th>last Name</th>
    </tr>
    </thead>
    <tbody>
        <tr>
            <td><? echo $oneData['id']; ?></td>
            <td><? echo $oneData['fname']; ?></td>
            <td><? echo $oneData['lname']; ?></td>

        </tr>
    </tbody>
</table>
</body>
</html>
