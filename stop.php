<?php


$id =  $_GET['id'];

$file = "kill $id";
system($file);
header("Location: status.php");
