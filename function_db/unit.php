<?php
	// Function get units
	function get_units($type = null) {
		global $conn;
		if ($type == null) {
			$stmt = $conn->prepare("select * from unit order by type desc;");
		} else {
			$stmt = $conn->prepare("select * from unit where type = :type;");
	    	$stmt->bindParam(':type', $type);
		}
		
	    $stmt->execute();

	    $units = $stmt->fetchAll(PDO::FETCH_OBJ);

	    return $units;
	}

	// Function get unit
	function get_unit($id) {
		global $conn;
		$stmt = $conn->query("select * from unit where id = $id;");

	    $unit = $stmt->fetch(PDO::FETCH_OBJ);

	    return $unit;
	}

	// Function get unit
	function delete_unit($id) {
		global $conn;
		$stmt = $conn->query("delete from unit where id = $id;");
	}

	// Function get unit
	function update_unit($name, $type, $id) {
		global $conn;
		$stmt = $conn->query("update unit set name = '$name', type = '$type' where id = $id;");
	}

	// Function insert unit
	function insert_unit($name, $type) {
		global $conn;
		$stmt = $conn->prepare("insert into unit(name, type) values (:name, :type);");

	    $stmt->bindParam(':name', $name);
	    $stmt->bindParam(':type', $type);
	    $stmt->execute();
	}
?>