<!--
Connecting to the database

If you want to connect to the DB, you must include the following php statment at the top from the other php files.
<?php
//include("dbconnect.php");
?>
-->


<?php
$db = new mysqli('localhost', 'root@localhost', 'Scip12345', 'scip');
$db->set_charset('utf8');


// If it can't connect to the database: Error!
if(!$db)
{
  exit("Verbindungsfehler: ".mysqli_connect_error());
}
?>