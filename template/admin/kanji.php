<?php require_once "../template/head.php"; ?>

<?php require_once "../template/admin/header.php"; ?>

<body>
	<form action="kanji.php" method="post">
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
		<h6>漢字リスト</h6>
		<table class="table w-25">
			<?php foreach ($kanjis as $key => $kanji) { ?>
				<tr>
					<td><?php echo $kanji->source; ?></td>
					<td><?php echo $kanji->target; ?></td>
					<td><?php echo $kanji->unit; ?></td>
					<td><?php echo $kanji->type; ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
	
</body>
</html>