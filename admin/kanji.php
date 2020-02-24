<?php
	require_once "../db.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$source = $_POST['source'];
		$target = $_POST['target'];
		$unit = $_POST['unit'];
		$type = $_POST['type'];
		$mean = $_POST['mean'];

		if (empty($_POST['id'])) {
			insert_kanji($source, $target, $unit, $type, $mean);
		} else {
			update_kanji($source, $target, $unit, $type, $mean, $_POST['id']);
		}

	} elseif (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'delete') {
			$id = $_GET['id'];
			delete_kanji($id);
		} else if ($action == 'edit') {
			$id = $_GET['id'];
			$kanji_edit = get_kanji($id);
		} 
	}

	$units = get_units('漢字');

	$units_array = array_combine(array_column($units, 'id'), array_column($units, 'name'));

	$kanjis = get_kanjis();

	require_once "../template/admin/kanji.php";
?>