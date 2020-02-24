<?php require_once "../template/head.php"; ?>

<?php require_once "../template/admin/header.php"; ?>

<body>
	<form action="vocabulary.php" method="post">
		出所 <input type="" name="source"><br>
		対象 <input type="" name="target"><br>

		単位 <select name='unit'>
				<?php foreach ($units as $key => $unit) { ?>
					<option value="<?php echo $unit->id; ?>">
						<?php echo $unit->name; ?>
					</option>
				<?php } ?>
			</select>
		<br>

		種類 <select name='type'>
				<option>名詞</option>
				<option>動詞</option>
				<option>形容詞</option>
			</select>
		<br>
		意味<input type="text" name="mean" ><br>

		<button>提出する</button>
		&nbsp;<a href="index.php">戻る</a>
	</form>
	<div class="pt-4">
		<h6>語彙のリスト</h6>
		<table class="table w-75">
			<tr>
				<th>No</th>
				<th>出所</th>
				<th>対象</th>
				<th>単位</th>
				<th>種類</th>
				<th>意味</th>
				<th>編集</th>
				<th>削除</th>
			</tr>
			<?php foreach ($vocabularies as $key => $vocabulary) { ?>
				<?php if(!empty($action) && $action == 'edit' && $vocabulary_edit->id == $vocabulary->id ) { ?>
					<form action="" method="post">
						<input type="hidden" name="id" value="<?php echo $vocabulary->id; ?>">
						<tr>
							<td><?php echo ($key + 1); ?></td>
							<td><input type="" name="source" placeholder="Source" value="<?php echo $vocabulary->source ?>"></td>
							<td><input type="" name="target" placeholder="Target" value="<?php echo $vocabulary->target ?>"></td>
							<td>
								<select name='unit'>
									<?php foreach ($units as $key1 => $unit) { ?>
										<option value="<?php echo $unit->id; ?>" <?php if($vocabulary->id == $unit->id) echo "selected"; ?>>
											<?php echo $unit->name; ?>
										</option>
									<?php } ?>
								</select>
							</td>
							<td>
								<select name='type'>
									<option <?php if($vocabulary->id == '名詞') echo "selected"; ?>>名詞</option>
									<option <?php if($vocabulary->id == '動詞') echo "selected"; ?>>動詞</option>
									<option <?php if($vocabulary->id == '形容詞') echo "selected"; ?>>形容詞</option>
								</select>
							</td>
							<td><input type="" name="mean" placeholder="Mean" value="<?php echo $vocabulary->mean ?>"></td>
							<td style="width: 130px"><button>更新する</button></td>
							<td style="width: 130px"></td>
						</tr>
					</form>
				<?php } else { ?>
					<tr>
						<td><?php echo ($key + 1); ?></td>
						<td><?php echo $vocabulary->source; ?></td>
						<td><?php echo $vocabulary->target; ?></td>
						<td><?php echo $units_array[$vocabulary->unit]; ?></td>
						<td><?php echo $vocabulary->type; ?></td>
						<td><?php echo $vocabulary->mean; ?></td>
						<td><a href="?action=edit&id=<?php echo $vocabulary->id ;?>">編集</a></td>
						<td><a href="?action=delete&id=<?php echo $vocabulary->id ;?>" style="color: red">削除</a></td>
					</tr>
				<?php } ?>
			<?php } ?>
		</table>
	</div>
	
</body>
</html>