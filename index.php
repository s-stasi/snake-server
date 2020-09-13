<?php
// variabili connessione db
$db_host = "localhost";
$db_user = "esamistasi";
$db_name = "my_esamistasi";
$db_password = "";

// connection
$conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
if ($conn == FALSE)
die ("Errore nella connessione:".mysqli_connect_error());

// example query
/*
$query = "SELECT * FROM snake";
$result = mysqli_query($conn,$query);

while ($row = mysqli_fetch_array($result))
{
	print $row['username']." ".$row['points']."<br>";
}
*/

function update()
{
	$name = $_POST['uname'];
	$points = $_POST['points'];
	$query = "UPDATE snake SET points=" . $points . " WHERE username=\"" . $uname . "\"";
	$result = mysql_query($conn, $query);
	if ($result === TRUE)
	{
		echo "true";
	}
	else
	{
		echo "error";
	}
}

function createNew()
{
	$name = $_POST['uname'];
	$points = $_POST['points'];
	$req = "INSERT INTO snake (username, points) VALUES (" . $uname . ", " . $points . ")";
	$result = mysql_query($conn, $query);
	if ($result === TRUE)
	{
		echo "true";
	}
	else
	{
		echo "error";
	}
}

function checkExist()
{
	$name = $_POST['uname'];
	$points = $_POST['points'];
	$req = "SELECT * FROM snake" . " WHERE " . $uname;
	$result = mysql_query($conn, $query);
	if (mysqli_num_rows($result) >0)
	{
		print "true";
	}
	else
		echo "false";
}

function getList()
{
	$name = $_POST['uname'];
	$points = $_POST['points'];
	$req = "SELECT " . $db_table . " SET points=" . $points . " WHERE username=" . $uname;
	$result = mysql_query($conn, $query);
	if (mysqli_num_rows($result) >0)
	{
		while ($row = mysqli_fetch_array($result))
		{
			print $row['username']." ".$row['points']."\n";
		}
	}
	else
		echo "false";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["action"] == "update")
{
	update();
}elseif ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["action"] == "create_new") 
{
	createNew();
}elseif ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["action"] == "check_exist") 
{
	checkExist();
}elseif ($_SERVER["REQUEST_METHOD"] == "POST" and $_POST["action"] == "get_list") 
{
	getList();
}

?>