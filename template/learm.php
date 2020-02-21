<?php require_once "head.php"; ?>

<?php require_once "header.php"; ?>
<body>
	<div class="row mx-5">
		<h3>対応する単語を入力してください</h3>
	</div>
	<div class="row mx-5">

		<div class="col-md-3" style="text-align: center;">
			<?php if(isset($complete)) {?>
				<h3 style="color: #2471bd;margin-top: 200px">このレッスンを完了しました!! <br>
					Thank you!
					<a href="index.php">Home back</a>
				</h3>

			<?php } else { ?>
				<form method="post">
					<span id='source' class="source-learm"><?php echo $source; ?></span><br>
					<input type="hidden" name="source" value="<?php echo $source; ?>">
					<input type="hidden" name="id" value="<?php echo $id; ?>">
					<input type="" name="target" class="target-input"><br><br>
					<button>確認する</button>
				</form>
			<?php } ?>
		</div>
		<div class="col-md-3">
			得点 : <span id='score'><?php echo $session->score;?> / <?php echo count($session->list_result); ?></span> <br>
			一覧 <br>
			<table class="table">
				<tr>
					<th>ソース</th>
					<th>目標</th>
					<th>結果</th>
				</tr>
				<?php foreach ($session->list_result as $key => $rObj) { ?>
					<tr>
						<td><?php echo $rObj->source ?></td>
						<td><?php echo $rObj->target ?></td>
						<td><?php echo $rObj->result ? "<span style='color:#26ca3a'>o</span>" : "<span style='color:red'>x</span>" ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</body>
</html>