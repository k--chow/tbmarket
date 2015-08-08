<html>
<?php
require_once 'php.php';
require_once 'login.php';
echo "Hey " . $user['name'];



$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server)die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database)
	or die("Unable to select database: " . mysql_error());

$query = "SELECT * FROM LISTINGS";
$result = mysql_query($query);

if (!$result)die("Database access failed: " . mysql_error());

$rows = mysql_num_rows($result);

for ($j = 0; $j < $rows; ++$j)
{

	echo '<br>Title: '	. mysql_result($result, $j, 'title')	. '<br />';
	echo 'ISBN: '	. mysql_result($result, $j, 'ISBN')	. '<br />';
	echo 'Author: '	. mysql_result($result, $j, 'author')	. '<br />';
	echo 'Course: '	. mysql_result($result, $j, 'course')	. '<br />';
	
}
//$sql = "INSERT INTO LISTINGS ("

    ?>


<button action="add.php">Sell a Textbook</button>


</html>