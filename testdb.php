#!/usr/bin/php

<?php
$db = new mysqli("localhost","root","SUPERrootTREE!","Classes");

if ($db->connect_errno != 0)
{

	echo "error connecting to database: ".$db->connect_error.PHP_EOL;
	exit();
}

echo "successfully connected!".PHP_EOL;

$query = "select * from class;";

$queryResponse = $db->query($query);

print_r($queryResponse);

$db->close();



while($row =$queryResponse->fetch_assoc())
{
	print_r($row);
}

echo "Program Complete\n";
?>
