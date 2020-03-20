<?php


function listbooks()
{

	//Connecting to Database

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname="cr10_jonathan_biglibrary";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
	   die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully to Database<br><hr>";
		//to bring media table data to html

	$sql = 
		"
			SELECT media.title, author.firstname, publisher.name
			From media
			INNER JOIN author
			ON media.author_id = author.id
			INNER JOIN publisher
			ON media.publisher_id = publisher.id
		";

	$result= mysqli_query($conn, $sql);

	if($result->num_rows == 0)
	{
		echo "No Entries";
	}
	elseif($result->num_rows == 1)
	{
		$row =$result->fetch_assoc();
		echo $row["title"];
	}
	else
	{
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		foreach ($rows as $val) 
		{
			echo $val["title"] ." | ". $val["firstname"] ." | ".  $val["name"] . "<br>";
		}
	}
}


?>











<!-- 
$result = mysqli_query($conn, $sql);

		// fetch the next row (as long as there are any) into $row
		while($row = mysqli_fetch_assoc($result)) 
		{
			printf("ID = %s %s %s <br>", $row[""],$row[""], $row[""]);
		}
		echo  "Fetched data successfully\n";
		// Free result set
		mysqli_free_result($result); -->



	<!-- 		//inserting data into database

	// $sql = "INSERT INTO `author` (`firstname`, `lastname`) VALUES ( 'test', 'test')";

	// 	if(mysqli_query($conn, $sql))
	// 	{
	// 		echo "sucess!";
	// 	}
	// 	else
	// 	{
	// 		echo "error".mysqli_error($conn);
	// 	} -->