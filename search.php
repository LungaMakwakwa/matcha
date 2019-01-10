<?php

require_once("core/init.php");

$username = $_GET['username'];
$startFrom = $_GET['startFrom'];

$username = trim(htmlspecialchars($username));
$startFrom = filter_var($startFrom, FILTER_VALIDATE_INT);

// make username search friendly
$like = '%' . strtolower($username) . '%'; // search for a the username, case-insensitive (see strtolower() here and MYSQL lower() function in the query)
// open new mysql prepared statement
/*$statement = $mysqli -> prepare('
	SELECT name, picture, description FROM users 
	WHERE lower(name) LIKE ? 
	ORDER BY INSTR(name, ?), name
	LIMIT 6 OFFSET ?
');*/

	$db = DB::getInstance();
	$sql = "SELECT username FROM users WHERE lower(username) LIKE ? ORDER BY INSTR(name, ?), name LIMIT 6 OFFSET";
	$db->query($sql);
	$result = $db->results();

// if (
// 	// $mysqli -> prepare returns false on failure, stmt object on success
// 	$statement &&
// 	// bind_param returns false on failure, true on success
// 	$statement -> bind_param('ssi', $like, $username, $startFrom ) &&
// 	// execute returns false on failure, true on success
// 	$statement -> execute() &&
// 	// same happens in store_result
// 	$statement -> store_result() &&	
// 	// same happens here
// 	$statement -> bind_result($name, $picture, $description)
// ) {
	// I'm in! everything was successful.

	// new array to store data 
	$array = [];


	while ($results -> fetch()) {
		$array[] = [
			'name' => $name,
			'picture' => $picture,
			'description' => $description
		];
	}

	echo json_encode($array);
	echo $result;
	exit();
//}
?>