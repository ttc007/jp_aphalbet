<?php
	require_once "../db.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$source = $_POST['source'];
		$target = $_POST['target'];
		$unit = $_POST['unit'];
		$type = $_POST['type'];

		insert_vocabulary($source, $target, $unit, $type);
	}

	$units = get_units();
	$vocabularies = get_vocabularies();

	require_once "../template/admin/vocabulary.php";
?>