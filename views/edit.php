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
    <title>Create page</title>
</head>
<body>
<form action="update.php" method="post">
    <input type="text" name="fname" value="<? echo $oneData['fname']; ?>"><br><br>
    <input type="text" name="lname" value="<? echo $oneData['lname']; ?>"><br><br>
    <input type="hidden" name="id" value="<? echo $oneData['id']; ?>">
    <input type="submit">
</form>
</body>
</html>
