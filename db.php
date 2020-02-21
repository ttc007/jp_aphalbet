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

	// Function get units
	function get_units($type = null) {
		global $conn;
		if ($type == null) {
			$stmt = $conn->prepare("select * from unit;");
		} else {
			$stmt = $conn->prepare("select * from unit where type = :type;");
	    	$stmt->bindParam(':type', $type);
		}
		
	    $stmt->execute();

	    $units = $stmt->fetchAll(PDO::FETCH_OBJ);

	    return $units;
	}

	// Function insert unit
	function insert_unit($name, $type) {
		global $conn;
		$stmt = $conn->prepare("insert into unit(name, type) values (:name, :type);");

	    $stmt->bindParam(':name', $name);
	    $stmt->bindParam(':type', $type);
	    $stmt->execute();
	}

	// Function get vocabularies
	function get_vocabularies() {
		global $conn;
		$stmt = $conn->prepare("select * from vocabulary order by id desc limit 10 ;");

	    $stmt->execute();

	    $vocabularies = $stmt->fetchAll(PDO::FETCH_OBJ);

	    return $vocabularies;
	}

	// Function get vocabularies
	function get_vocabulary_random($units, $list = null) {
		global $conn;

		$units = join(',', $units);

		if ($list == null) {
			$stmt = $conn->prepare("select * from vocabulary where unit in ($units) order by RAND () limit 1;");
		} else {
			$list = join(',', $list);
			$stmt = $conn->prepare("select * from vocabulary where unit in ($units) and id not in ($list) order by RAND () limit 1;");
		}

	    $stmt->execute();

	    $vocabulary = $stmt->fetch(PDO::FETCH_OBJ);

	    return $vocabulary;
	}

	// Function get vocabularies
	function get_vocabulary($source, $target) {
		global $conn;

		$stmt = $conn->query("select * from vocabulary where source = '$source' and target = '$target';");

	    $vocabulary = $stmt->fetch(PDO::FETCH_OBJ);

	    return $vocabulary;
	}

	// Function insert vocabulary
	function insert_vocabulary($source, $target, $unit, $type){
		global $conn;
		$stmt = $conn->prepare("insert into vocabulary(source, target, unit, type) values (:source, :target, :unit, :type);");

	    $stmt->bindParam(':source', $source);
	    $stmt->bindParam(':target', $target);
	    $stmt->bindParam(':unit', $unit);
	    $stmt->bindParam(':type', $type);
	    $stmt->execute();
	}
	
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