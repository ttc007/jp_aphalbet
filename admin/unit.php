<?php
	require_once "../db.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$name = $_POST['name'];
		$type = $_POST['type'];

		if (empty($_POST['id'])) {
			insert_unit($name, $type);
		} else {
			update_unit($name, $type, $_POST['id']);
		}
	} elseif (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'delete') {
			$id = $_GET['id'];
			delete_unit($id);
		} else if ($action == 'edit') {
			$id = $_GET['id'];
			$unit_edit = get_unit($id);
		} 
	}

	$units = get_units();

	require_once "../template/admin/unit.php";
?>