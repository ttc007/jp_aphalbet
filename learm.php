<?php
	session_start();
	require_once "db.php";

	if (!empty($_SESSION['session'])) {
		$session = $_SESSION['session'];
		$session = json_decode($session);
	} else {
		$session = new stdClass();
	}

	$score = isset($session->score) ? $session->score : 0;
	$session->score = $score;
	
	$list_result = array();
	if (isset($session->list_result)) {
		$list_result = $session->list_result;
	}
	$session->list_result = $list_result;

	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		

		$source = $_POST['source'];
		$target = $_POST['target'];
		$id = $_POST['id'];

		if (count($list_result) > 0) {
			$list_old_learm = array_column($list_result, 'id');
		}

		if (!isset($list_old_learm) || (isset($list_old_learm) && !in_array($id, $list_old_learm))) {
			$row = get_vocabulary($id);

			$score = isset($session->score) ? $session->score : 0;

			$result = false;
			if (isset($row->target) && $row->target == $target) {
				$score++;
				$result = true;
			}

			$rObj = new stdClass();
			$rObj->source = $source;
			$rObj->target = $target;
			$rObj->result = $result;
			$rObj->id = $id;

			$list_result[] = $rObj;

			$session->score = $score;
			$session->list_result = $list_result;

			$_SESSION['session'] = json_encode($session);
		}

	}

	$source = "";
	if (isset($session->type) && $session->type == "語彙") {
		$units = $session->units;

		if (count($list_result) > 0) {
			$list_old_learm = array_column($list_result, 'id');

			$vocabulary = get_vocabulary_random($units, $list_old_learm);

		} else {
			$vocabulary = get_vocabulary_random($units);
		}
		
		if (empty($vocabulary)) {
			$complete = true;
		} else {
			$source = $vocabulary->source;
			$id = $vocabulary->id;
		}
	}

	require_once "template/learm.php";
?>