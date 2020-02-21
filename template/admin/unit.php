<?php require_once "../template/head.php"; ?>

<?php require_once "../template/admin/header.php"; ?>

<body>
	<form action="unit.php" method="post">
		ユニット名 <input type="" name="name">
		<br>
		種類 <select name="type">
				<option>語彙</option>
				<option>漢字</option>
			</select><br>

		<button>提出する</button>
		&nbsp;<a href="index.php">戻る</a>
	</form>
	ユニットのリスト
	<table class="table w-25">
		<tr>
			<th></th>
			<th>名前</th>
			<th>種類</th>
		</tr>
		<?php foreach ($units as $key => $unit) { ?>
			<tr>
				<td><?php echo $unit->id; ?></td>
				<td><?php echo $unit->name; ?></td>
				<td><?php echo $unit->type; ?></td>
			</tr>
		<?php } ?>
	</table>
</body>
</html>