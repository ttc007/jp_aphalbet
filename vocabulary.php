<?php
	session_start();
	require_once "db.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$units = $_POST['units'];
		$type = "語彙";

		$session = new stdClass();
		$session->units = $units;
		$session->type = $type;

		$_SESSION["session"] = json_encode($session);

		header('Location: learm.php');
	}

	$units = get_units("語彙");

	require_once "template/vocabulary.php"; 

?>