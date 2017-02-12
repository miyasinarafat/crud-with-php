<?php
include_once "../vendor/autoload.php";
use App\TestCrud\TestCrud;

$obj = new TestCrud();
$obj->prepare($_GET);
$obj->delete();