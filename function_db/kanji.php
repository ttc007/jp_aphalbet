<?php
	// Function get kanjis
	function get_kanjis() {
		global $conn;
		$stmt = $conn->prepare("select * from kanji order by id desc limit 10 ;");

	    $stmt->execute();

	    $kanjis = $stmt->fetchAll(PDO::FETCH_OBJ);

	    return $kanjis;
	}

	// Function get kanjis random
	function get_kanji_random($units, $list = null) {
		global $conn;

		$units = join(',', $units);

		if ($list == null) {
			$stmt = $conn->prepare("select * from kanji where unit in ($units) order by RAND () limit 1;");
		} else {
			$list = join(',', $list);
			$stmt = $conn->prepare("select * from kanji where unit in ($units) and id not in ($list) order by RAND () limit 1;");
		}

	    $stmt->execute();

	    $kanji = $stmt->fetch(PDO::FETCH_OBJ);

	    return $kanji;
	}

	// Function insert kanji
	function insert_kanji($source, $target, $unit, $type, $mean){
		global $conn;
		$stmt = $conn->prepare("insert into kanji(source, target, unit, type, mean) values (:source, :target, :unit, :type, :mean);");

	    $stmt->bindParam(':source', $source);
	    $stmt->bindParam(':target', $target);
	    $stmt->bindParam(':unit', $unit);
	    $stmt->bindParam(':type', $type);
	    $stmt->bindParam(':mean', $mean);
	    $stmt->execute();
	}

	// Function get kanji
	function get_kanji($id) {
		global $conn;
		$stmt = $conn->query("select * from kanji where id = $id;");

	    $kanji = $stmt->fetch(PDO::FETCH_OBJ);

	    return $kanji;
	}

	// Function delete kanji
	function delete_kanji($id) {
		global $conn;
		$stmt = $conn->query("delete from kanji where id = $id;");
	}

	// Function update kanji
	function update_kanji($source, $target, $unit, $type, $mean, $id) {
		global $conn;
		$stmt = $conn->query("update kanji set source = '$source', target = '$target', unit ='$unit', type = '$type', mean='$mean' where id = $id;");
	}

?>