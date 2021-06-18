<?php

$botName = $_POST['botName'];
$coinSymbol = $_POST['coinSymbol'];
$investment = $_POST['investment'];
$tradingFees = $_POST['tradingFees'];
$buyTimeOut = $_POST['buyTimeOut'];
$sellTimeOut = $_POST['sellTimeOut'];
$buyIfLessThan = $_POST['buyIfLessThan'];
$sellifGreaterThan = $_POST['sellifGreaterThan'];
$maxTrades = $_POST['maxTrades'];




$file = "python3 btc.py $botName $coinSymbol $investment $tradingFees $buyTimeOut $sellTimeOut $buyIfLessThan $sellifGreaterThan $maxTrades";
$file = $file." > /dev/null 2>&1 &";
system($file);
header("Location: index.php");
