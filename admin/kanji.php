<?php
	require_once "../db.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$source = $_POST['source'];
		$target = $_POST['target'];
		$unit = $_POST['unit'];
		$type = $_POST['type'];

		insert_kanji($source, $target, $unit, $type);
	}

	$units = get_units();
	$kanjis = get_kanjis();

	require_once "../template/admin/kanji.php";
?>