#!/usr/bin/php
<?php
$jobID = $argv[1];
$machineID = $argv[2];
$startDate = $argv[3];
$endDate = $argv[4];

$db = new mysqli('localhost','root','SUPERrootTREE!','IronWorks');
if ($db->connect_errno > 0)
{
   echo __FILE__.":".__LINE__.": failed to connect to db, re: $db->connect_error".PHP_EOL;
   exit(0);
}
echo "checking if machine in use: $machineID".PHP_EOL;
$checkMachine = "select * from equipmentStatus WHERE (endDate = '0000-00-00') AND machineID = $machineID;";
$checkResult = $db->query($checkMachine);
if (!empty($checkResult)) {
	exit("Machine in use!\r\n");
}
echo "attempting to insert record: $jobID, $machineID, $startDate, $endDate".PHP_EOL;
if($endDate == 'none' || 'NONE') {
	$insertString = "insert into equipmentStatus(jobID, machineID, startDate) values ('$jobID', '$machineID', '$startDate');";
}
else {
$insertString = "insert into equipmentStatus(jobID, machineID, startDate, endDate) values ('$jobID', '$machineID', '$startDate', 'endDate');";
}
echo "attempting to execute this SQL:".PHP_EOL;
echo $insertString.PHP_EOL;
$results = $db->query($insertString);
$queryString = "select * from equipmentStatus;";
$results = $db->query($queryString);
print_r($results);
while ($obj = $results->fetch_object())
{
    print_r($obj);
}
$db->close();
echo "DB Connection Success".PHP_EOL;
?>
