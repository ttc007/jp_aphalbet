<?php require_once "head.php"; ?>
<body>
	<div class="main">
		<div class="selectType">
			<div class="checkbox">
				<div class="row">
					<h2 style="margin: 0px auto; color: white">Select words to learn</h2>
					<ul class="nav nav-pills mb-3 mt-3" id="pills-tab" role="tablist">
						<li class="nav-item">
							<button class="nav-link active btn-hira" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Từ Vựng</button>
						</li>
						<li class="nav-item">
							<button class="nav-link btn-kata" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Hán Tự</button>
						</li>
					</ul>	
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">		
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 dis-block">
							<label>
								<input type="checkbox" value="0">
								Bai 1
							</label>
							<label>
								<input type="checkbox" value="30">
								Bai 2 
							</label>
							<label>
								<input type="checkbox" value="60">
								Bai 3 
							</label>
							<label>
								<input type="checkbox" value="90">
								Bai 4
							</label>
							<label>
								<input type="checkbox" value="120">
								Bai 5
							</label>
							<label>
								<input type="checkbox" value="150">
								Bai 6
							</label>
							<label>
								<input type="checkbox" value="180">
								Bai 7
							</label>
							<label>
								<input type="checkbox" value="210">
								Bai 8
							</label>
							<label>
								<input type="checkbox" value="240">
								Bai 9
							</label>
							<label>
								<input type="checkbox" value="270">
								Bai 10
							</label>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 dis-block">
							<label>							
								Bai 11
								<input type="checkbox" value="">
							</label>
							<label>	
								Bai 12
								<input type="checkbox" value="">
							</label>
							<label>	
								Bai 13
								<input type="checkbox" value="">
							</label>
							<label>	
								Bai 14
								<input type="checkbox" value="">
							</label>
							<label>	
								Bai 15
								<input type="checkbox" value="">
							</label>
							<label>	
								Bai 16
								<input type="checkbox" value="">
							</label>
							<label>	
								Bai 17
								<input type="checkbox" value="">
							</label>
							<label>	
								Select all
								<input type="checkbox" class="checkAll" value="0">
							</label>
						</div>
					</div>

					<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">	
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 dis-block">
							<label>
								<input type="checkbox" value="0">
								1
							</label>
							<label>
								<input type="checkbox" value="30">
								2
							</label>
							<label>
								<input type="checkbox" value="60">
								3
							</label>
							<label>
								<input type="checkbox" value="90">
								4
							</label>
							<label>
								<input type="checkbox" value="120">
								5
							</label>
							<label>
								<input type="checkbox" value="150">
								6
							</label>
							<label>
								<input type="checkbox" value="180">
								7
							</label>
							<label>
								<input type="checkbox" value="210">
								8
							</label>
							<label>
								<input type="checkbox" value="">
								9
							</label>
							<label>
								<input type="checkbox" value="">
								10
							</label>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 dis-block">
							<label>							
								11
								<input type="checkbox" value="">
							</label>
							<label>
								12
								<input type="checkbox" value="">
							</label>
							<label>
								13
								<input type="checkbox" value="">
							</label>
							<label>
								14
								<input type="checkbox" value="">
							</label>
							<label>
								15
								<input type="checkbox" value="">
							</label>
							<label>
								16
								<input type="checkbox" value="">
							</label>
							<label>
								17
								<input type="checkbox" value="">
							</label>
							<label>
								Select all
								<input type="checkbox" class="checkAll" value="0">
							</label>
						</div>
					</div>
					<button type="button" class="btn btn-primary btnGo">Go</button>
				</div>
			</div>
		</div>
		<div class="content">
			<!-- answer word -->
			<div class="answer">
				<div class="textView" id="textShow"></div>
				<div class="scoreCount mt-3"> Score:
					<span class="present"></span> /
					<span class="actually"></span>
				</div>
				<input type="textfield" class="inputText text-center mt-3" id="resultInput" value="">
				<p id="mess"></p>
			</div>
		</div>
		<!-- statistic score -->
		<div class="statistic">
			<div class="wrap">
				<p>score</p>
				<p id="score">1/5</p>
				<p id="praise">Very good</p>
			</div>

			<div class="btn btn-warning btnBack mt-20">Back</div>
			<div class="btn btn-info btnAgain mt-20">Try Again</div>
		</div>
	</div>
	<script src="js/custom.js"></script>
	<script src="js/bai1.json"></script>
	<script src="js/bai2.json"></script>
	<script src="js/bai3.json"></script>
	<script src="js/bai4.json"></script>
	<script src="js/bai5.json"></script>
	<script src="js/bai6.json"></script>
	<script src="js/bai7.json"></script>
	<script src="js/bai8.json"></script>
	<script src="js/bai9.json"></script>
	<script src="js/bangchucaihira.js"></script>
	<script src="js/bangchucaikanji.js"></script>
</body>
</html>