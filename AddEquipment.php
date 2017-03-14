#!/usr/bin/php
<?php
$equipment = $argv[1];
$model = $argv[2];
$energySource = $argv[3];
$location = $argv[4];
$lockable = $argv[5];
$typeOfLock = $argv[6];
$db = new mysqli('localhost','root','SUPERrootTREE!','IronWorks');
if ($db->connect_errno > 0)
{
   echo __FILE__.":".__LINE__.": failed to connect to db, re: $db->connect_error".PHP_EOL;
   exit(0);
}
echo "attempting to insert record: $equipment $model $energySource $location $lockable $typeOfLock".PHP_EOL;
$insertString = "insert into equipment(equipment, model, energySource, location, lockable, typeOfLock) values ('$equipment', '$model', '$energySource', '$location', '$lockable', '$typeOfLock');";
echo "attempting to execute this SQL:".PHP_EOL;
echo $insertString.PHP_EOL;
$results = $db->query($insertString);
$queryString = "select * from equipment;";
$results = $db->query($queryString);
print_r($results);
while ($obj = $results->fetch_object())
{
    print_r($obj);
}
$db->close();
echo "DB Connection Success".PHP_EOL;
?>
