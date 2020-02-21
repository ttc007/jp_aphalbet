<?php
	require_once "../db.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$name = $_POST['name'];
		$type = $_POST['type'];

		insert_unit($name, $type);
	}

	$units = get_units();



	require_once "../template/admin/unit.php";
?>