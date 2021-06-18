<?php
/*
Error reporting helps you understand what's wrong with your code, remove in production.
*/
error_reporting(E_ALL);
ini_set('display_errors', 1);

$read = exec("python3 status.py");



$obj = json_decode($read, true);




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Algo-Trading Status</title>
    <meta name="description" content="Algo-Trading Status Page">
    <meta name="author" content="MayThirtyOne">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="HandheldFriendly" content="true">
    <link rel="stylesheet" href="./style1.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="container">
        <h1>Running Bots</h1>
        <table class="rwd-table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <th>Action</th>

                </tr>


                <?php

foreach ($obj as $key => $value) {
    echo '<tr>                                                                                             ';
    echo '        <td data-th="Name">                                                                      ';
    echo           $key                                                                                ;
    echo '        </td>                                                                                    ';
    echo '        <td data-th="Action">                                                                    ';
    echo '          <a href = "/stop.php?id='.$value.'"><button style = "background-color: #f44336; /* Green */  ';
    echo '  border: none;                                                                                  ';
    echo '  color: white;                                                                                  ';
    echo '  padding: 8px 16px;                                                                             ';
    echo '  text-align: center;                                                                            ';
    echo '  text-decoration: none;                                                                         ';
    echo '  display: inline-block;                                                                         ';
    echo '  font-size: 15px;                                                                               ';
    echo '  border-radius: 10px;">STOP</button></a>                                                        ';
    echo '        </td>                                                                                    ';
    echo '      </tr>                                                                                      ';
}



      ?>



            </tbody>
        </table>
    </div>
    <!-- partial -->
    <script src="./script.js"></script>

</body>

</html>