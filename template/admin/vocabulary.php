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
		<button>提出する</button>
		&nbsp;<a href="index.php">戻る</a>
	</form>
	<div class="pt-4">
		<h6>語彙のリスト</h6>
		<table class="table w-25">
			<tr>
				<th>出所</th>
				<th>対象</th>
				<th>単位</th>
				<th>種類</th>
			</tr>
			<?php foreach ($vocabularies as $key => $vocabulary) { ?>
				<tr>
					<td><?php echo $vocabulary->source; ?></td>
					<td><?php echo $vocabulary->target; ?></td>
					<td><?php echo $vocabulary->unit; ?></td>
					<td><?php echo $vocabulary->type; ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
	
</body>
</html>