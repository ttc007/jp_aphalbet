<?php
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

	// Function get unit
	function get_vocabulary($id) {
		global $conn;
		$stmt = $conn->query("select * from unit where id = $id;");

	    $unit = $stmt->fetch(PDO::FETCH_OBJ);

	    return $unit;
	}

	// Function get unit
	function delete_vocabulary($id) {
		global $conn;
		$stmt = $conn->query("delete from unit where id = $id;");
	}

	// Function get unit
	function update_vocabulary($name, $type, $id) {
		global $conn;
		$stmt = $conn->query("update unit set name = '$name', type = '$type' where id = $id;");
	}

?>