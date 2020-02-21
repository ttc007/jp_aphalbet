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
	<table class="table" style="width: 700px">
		<tr>
			<th>No</th>
			<th>名前</th>
			<th>種類</th>
			<th>編集</th>
			<th>削除</th>
		</tr>
		<?php foreach ($units as $key => $unit) { ?>
			<?php if(!empty($action) && $action == 'edit' && $unit_edit->id == $unit->id ) { ?>
				<form action="" method="post">
					<input type="hidden" name="id" value="<?php echo $unit->id; ?>">
					<tr>
						<td><?php echo ($key + 1); ?></td>
						<td><input type="" name="name" placeholder="Name" value="<?php echo $unit_edit->name ?>"></td>
						<td>
							<select name="type">
								<option>語彙</option>
								<option <?php if($unit_edit->type == '漢字') echo "selected"; ?>>漢字</option>
							</select>
						</td>
						<td style="width: 130px"><button>更新する</button></td>
						<td style="width: 130px"></td>
					</tr>
				</form>
			<?php } else { ?>
				<tr>
					<td><?php echo ($key + 1); ?></td>
					<td><?php echo $unit->name; ?></td>
					<td><?php echo $unit->type; ?></td>
					<td><a href="?action=edit&id=<?php echo $unit->id ;?>">編集</a></td>
					<td><a href="?action=delete&id=<?php echo $unit->id ;?>" style="color: red">削除</a></td>
				</tr>
			<?php } ?>
		<?php } ?>
	</table>
</body>
</html>