<?php
	$servername = "localhost:3308";
	$username = "root";
	$password = "";
	$dbname = "jp_aphalbet";

	try {
		
	    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
	    echo "Error: " . $e->getMessage();
	}

	require_once 'function_db/unit.php';
	require_once 'function_db/vocabulary.php';
	require_once 'function_db/kanji.php';

?>