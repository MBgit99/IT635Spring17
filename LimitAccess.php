#!/usr/bin/php
<?php
$username = $argv[1];
$passwd = $argv[2];
$db = new mysqli('localhost','root','SUPERrootTREE!','IronWorks');
if ($db->connect_errno > 0)
{
   echo __FILE__.":".__LINE__.": failed to connect to db, re: $db->connect_error".PHP_EOL;
   exit(0);
}
echo "validating user: $username $passwd".PHP_EOL;
public function validateUser($username,$passwd) {
	$un = $this->db->real_escape_string($username);
	$pw = $this->db->real_escape_string($passwd);

$insertString = "SELECT * FROM user WHERE username = '$username'";
echo "attempting to execute this SQL:".PHP_EOL;
echo $insertString.PHP_EOL;
$results = $this->$db->query($insertString);
while ($row = $results->fetch_assoc()) {
	if($row["passwd"] == $pw)
	{
		return true;
	}
	
}
return false;
}

$db->close();
echo "DB Connection Success".PHP_EOL;
?>
