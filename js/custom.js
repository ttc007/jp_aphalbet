$(document).ready(function() {
  var listWordkata = getBangChuCaiKata();
  var listWord = getBangChuCai();
  var listSentence = [
  "Very good",
  "Good",
  "Rather",
  "Try more"
  ];
  var wordCurrent, numCorrect = 0, totalWord = 0;
  var timeRepeat = 0;
  var listWordSelect = [];
  var p = document.getElementById('mess');
  var history = $("<div id='varHistory'></div>");
  history.attr("history","");
  $("body").append(history);

  function checkAnswer() {
    var answer = document.getElementById('resultInput').value;
    if(answer === wordCurrent.tv){
      p.innerHTML = "Right";
      numCorrect += 1;
      var history = $("#varHistory").attr("history");
      history+= wordCurrent.tv+"|";
      $("#varHistory").attr("history", history);
    }else{
      p.innerHTML = "Wrong!!";
    }
    checkTimeRepeat();
  }

  function getRandom() {
    var random = Math.floor(Math.random() * totalWord);
    return random;
  }

  function checkTimeRepeat(){
    if(timeRepeat == totalWord) {
      $('.content').css("display", "none");
      $('.statistic').css("display", "block");
      $('#score').text(numCorrect + "/" + timeRepeat);
      let sentence;
      let percentExactly = (numCorrect / timeRepeat) * 100;
      if(percentExactly >= 80){
        sentence = listSentence[0];
      }else if(percentExactly >= 60 && percentExactly < 80){
        sentence = listSentence[1];
      }else if(percentExactly >= 45 && percentExactly < 60){
        sentence = listSentence[2];
      }else{
        sentence = listSentence[3];
      }
      $('#praise').text(sentence);
    }else{
      setWord();
    }
  }
  function setWord() {
    wordCurrent = listWordSelect[getRandom()];
    var historyArr = [];
    var history = $("#varHistory").attr('history');
    if( history ) historyArr = history.split('|');
    if(historyArr.indexOf(wordCurrent.tv)>-1) setWord();
    else{
      $('#resultInput').val("");
      $('#textShow').text(wordCurrent.tn);
      $('#textShowdetails').text(wordCurrent.sub);
      $('.present').text(numCorrect);
      $('.actually').text(totalWord);
    }
  }
  document.getElementById('resultInput').onkeypress = function(e) {
    var event = e || window.event;
    var charCode = event.which || event.code;
    if(charCode == '13'){
      timeRepeat += 1;
      checkAnswer();
    }
  }

  // event on click btn
  // btn try agin
  $('.btnAgain').click(function(event) {
    timeRepeat = 0;
    numCorrect = 0;
    $('.content').css("display", "block");
    $('.statistic').css("display", "none");
    p.innerHTML = "";
    setWord();
  });
  // btn go
  $('.btnGo').click(function() {
    if($('.btn-hira').hasClass('active')){
      listWordSelect = [];
      var listCB = $('input[type="checkbox"]');
      var count = 0;
      for(var i=0; i < listCB.length; i++){
        if(listCB[i].checked ===true){
          count += 1;
          let ranGet = parseInt(listCB[i].value);
          let arrGet = listWord.slice(ranGet, ranGet + 30);
          arrGet.forEach(function(ele) {
            listWordSelect.push(ele);
          });
        }
      }
      if(count > 0){
        $('.content').css("display", "block");
        $('.selectType').css("display", "none");
        totalWord = listWordSelect.length;
        setWord();
      }else{
        alert('You must choose words to learn');
      }  
    }else{
      listWordSelect = [];
      var listCB = $('input[type="checkbox"]');
      var count = 0;
      for(var i=0; i < listCB.length; i++){
        if(listCB[i].checked ===true){
          count += 1;
          let ranGet = parseInt(listCB[i].value);
          let arrGet = listWordkata.slice(ranGet, ranGet + 30);
          arrGet.forEach(function(ele) {
            listWordSelect.push(ele);
          });
        }
      }
      if(count > 0){
        $('.content').css("display", "block");
        $('.selectType').css("display", "none");
        totalWord = listWordSelect.length;
        setWord();
      }else{
        alert('You must choose words to learn');
      } 
    }
  });
  // btn back
  $('.btnBack').click(function(event) {
    timeRepeat = 0;
    numCorrect = 0;
    p.innerHTML = "";
    $('.statistic').css("display", "none");
    $('.selectType').css("display", "block");
  });

  // btn check all checkbox
  $('.checkAll').click(function(event) {
    if(this.checked){
      $('input[type="checkbox"]').attr('checked', true);
    }else{
      $('input[type="checkbox"]').attr('checked', false);
    }
  });
});


