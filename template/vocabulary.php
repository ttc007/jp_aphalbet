<?php require_once "head.php"; ?>

<?php require_once "header.php"; ?>
<body>
	<h3>ユニットを選択</h3>
	<form action="vocabulary.php" method="post">
		<input type="checkbox" name="all" id='all'><label for='all' id="all-label">全部</label> <br>
		<?php foreach ($units as $key => $unit) { ?>
			<input type="checkbox" name="units[]" value="<?php echo $unit->id ?>" id='checkbox<?php echo $unit->id ?>'>
			<label for="checkbox<?php echo $unit->id ?>"><?php echo $unit->name ?></label> <br>
		<?php } ?>
		<button>学習</button>
	</form>

	<script type="text/javascript" src="js/aphabet.js"></script>
</body>
</html>