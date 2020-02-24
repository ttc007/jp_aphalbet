<?php
	require_once "../db.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$source = $_POST['source'];
		$target = $_POST['target'];
		$unit = $_POST['unit'];
		$type = $_POST['type'];
		$mean = $_POST['mean'];

		if (empty($_POST['id'])) {
			insert_vocabulary($source, $target, $unit, $type, $mean);
		} else {
			update_vocabulary($source, $target, $unit, $type, $mean, $_POST['id']);
		}

	} elseif (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'delete') {
			$id = $_GET['id'];
			delete_vocabulary($id);
		} else if ($action == 'edit') {
			$id = $_GET['id'];
			$vocabulary_edit = get_vocabulary($id);
		} 
	}

	$units = get_units('語彙');

	$units_array = array_combine(array_column($units, 'id'), array_column($units, 'name'));

	$vocabularies = get_vocabularies();

	require_once "../template/admin/vocabulary.php";
?>