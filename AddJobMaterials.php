#!/usr/bin/php
<?php
$jobID = $argv[1];
$materialID = $argv[2];
$quantity = $argv[3];
$db = new mysqli('localhost','root','SUPERrootTREE!','IronWorks');
if ($db->connect_errno > 0)
{
   echo __FILE__.":".__LINE__.": failed to connect to db, re: $db->connect_error".PHP_EOL;
   exit(0);
}
echo "attempting to insert record: $jobID $materialID $quantity".PHP_EOL;
$insertString = "insert into jobMaterials(jobID, materialID, quantity) values ('$jobID', '$materialID', '$quantity');";
echo "attempting to execute this SQL:".PHP_EOL;
echo $insertString.PHP_EOL;
$results = $db->query($insertString);
$queryString = "select * from jobMaterials;";
$results = $db->query($queryString);
print_r($results);
while ($obj = $results->fetch_object())
{
    print_r($obj);
}
$db->close();
echo "DB Connection Success".PHP_EOL;
?>
