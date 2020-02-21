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
	
	// Function get kanjis
	function get_kanjis() {
		global $conn;
		$stmt = $conn->prepare("select * from kanji order by id desc limit 10 ;");

	    $stmt->execute();

	    $kanjis = $stmt->fetchAll(PDO::FETCH_OBJ);

	    return $kanjis;
	}

	//Function insert kanji
	function insert_kanji($source, $target, $unit, $type){
		global $conn;
		$stmt = $conn->prepare("insert into kanji(source, target, unit, type) values (:source, :target, :unit, :type);");

	    $stmt->bindParam(':source', $source);
	    $stmt->bindParam(':target', $target);
	    $stmt->bindParam(':unit', $unit);
	    $stmt->bindParam(':type', $type);
	    $stmt->execute();
	}

?>