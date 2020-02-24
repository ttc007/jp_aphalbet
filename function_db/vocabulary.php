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

	// Function insert vocabulary
	function insert_vocabulary($source, $target, $unit, $type, $mean){
		global $conn;
		$stmt = $conn->prepare("insert into vocabulary(source, target, unit, type, mean) values (:source, :target, :unit, :type, :mean);");

	    $stmt->bindParam(':source', $source);
	    $stmt->bindParam(':target', $target);
	    $stmt->bindParam(':unit', $unit);
	    $stmt->bindParam(':type', $type);
	    $stmt->bindParam(':mean', $mean);
	    $stmt->execute();
	}

	// Function get vocabulary
	function get_vocabulary($id) {
		global $conn;
		$stmt = $conn->query("select * from vocabulary where id = $id;");

	    $vocabulary = $stmt->fetch(PDO::FETCH_OBJ);

	    return $vocabulary;
	}

	// Function delete vocabulary
	function delete_vocabulary($id) {
		global $conn;
		$stmt = $conn->query("delete from vocabulary where id = $id;");
	}

	// Function update vocabulary
	function update_vocabulary($source, $target, $unit, $type, $mean, $id) {
		global $conn;
		$stmt = $conn->query("update vocabulary set source = '$source', target = '$target', unit ='$unit', type = '$type', mean='$mean' where id = $id;");
	}

?>