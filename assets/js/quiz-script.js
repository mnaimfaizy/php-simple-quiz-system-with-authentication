var currentQuestion = 0;
var listeningScore = 0;
var grammarScore = 0;
var score = 0;
var totQuestions = questions.length;
var q = '';

var container = document.getElementById("quizContainer");
var questionEl = document.getElementById("question");
var pQuestionEl = document.getElementById("pQuestion");
var nQuestionEl = document.getElementById("nQuestion");
var opt1 = document.getElementById("opt1");
var opt2 = document.getElementById("opt2");
var opt3 = document.getElementById("opt3");
var pOpt1 = document.getElementById("pOpt1");
var pOpt2 = document.getElementById("pOpt2");
var pOpt3 = document.getElementById("pOpt3");
var nOpt1 = document.getElementById("nOpt1");
var nOpt2 = document.getElementById("nOpt2");
var nOpt3 = document.getElementById("nOpt3");
var nextButton = document.getElementById("nextButton");
var resultCont = document.getElementById("result");
var id_number = document.getElementById("id_number").value;

function loadQuestion(questionIndex) {
  // Load Current Question
  var q = questions[questionIndex];
  questionEl.textContent = questionIndex + 1 + ". " + q.question;
  opt1.textContent = q.option1;
  opt2.textContent = q.option2;
  opt3.textContent = q.option3;
  //console.log("Current Index: " + questionIndex);
  // Load Next Question
  if (questionIndex != 199) {
    questionIndex++;
    var q = questions[questionIndex];
    nQuestionEl.textContent = questionIndex + 1 + ". " + q.question;
    nOpt1.textContent = q.option1;
    nOpt2.textContent = q.option2;
    nOpt3.textContent = q.option3;
    //console.log("Next Index: " + questionIndex);
  } else {
    document.getElementById("nextQuizContainer").style.display = "none";
  }

}
function loadPreviousQuestion(questionIndex, answer) {
  if (parseInt(answer) === 1) {
    document.getElementById('pOption1').style.background = "#0803bc";
    document.getElementById('pOption1').style.color = "#FFFFFF";
    document.getElementById('pOption2').style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementById('pOption2').style.color = "#000";
    document.getElementById('pOption3').style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementById('pOption3').style.color = "#000";
  }
  if (parseInt(answer) === 2) {
    document.getElementById('pOption2').style.background = "#0803bc";
    document.getElementById('pOption2').style.color = "#FFFFFF";
    document.getElementById('pOption1').style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementById('pOption1').style.color = "#000";
    document.getElementById('pOption3').style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementById('pOption3').style.color = "#000";
  }
  if (parseInt(answer) === 3) {
    document.getElementById('pOption3').style.background = "#0803bc";
    document.getElementById('pOption3').style.color = "#FFFFFF";
    document.getElementById('pOption1').style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementById('pOption1').style.color = "#000";
    document.getElementById('pOption2').style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementById('pOption2').style.color = "#000";
  }

  questionIndex--;
  var q = questions[questionIndex];
  pQuestionEl.textContent = questionIndex + 1 + ". " + q.question;
  pOpt1.textContent = q.option1;
  pOpt2.textContent = q.option2;
  pOpt3.textContent = q.option3;
}

function removeNextButton() {
  //console.log(currentQuestion);
  if (currentQuestion <= 100) {
    document.getElementsByTagName("label")[3].setAttribute("onclick", "loadNextQuestion()");
    document.getElementsByTagName("label")[4].setAttribute("onclick", "loadNextQuestion()");
    document.getElementById("nextQuizContainer").style.display = "none";
    document.getElementById("previousQuizContainer").style.display = "none";
  }
  if (currentQuestion > 99) {
    document.getElementsByTagName("label")[3].removeAttribute("onclick", "loadNextQuestion()");
    document.getElementsByTagName("label")[4].removeAttribute("onclick", "loadNextQuestion()");
    nextButton.style.display = "inline-block";
    document.getElementById("nextQuizContainer").style.display = "block";
    document.getElementById("previousQuizContainer").style.display = "block";
  }
}

function skipQuestion() {
  //console.log("Current Question at start of function: " + currentQuestion);
  var qu = questionEl.innerText;
  var answer = "0";
  saveTranscript(qu, answer);

  currentQuestion++;
  if (currentQuestion == totQuestions - 1) {
    nextButton.textContent = "Finish";
  }

  if (currentQuestion == 100) {
    document.getElementById("title").innerHTML = "Grammer Section";
    document.getElementById("option3").style.display = "inline-block";
    document.getElementById("pOption3").style.display = "inline-block";
    document.getElementById("nOption3").style.display = "inline-block";
    var ply = document.getElementById("player");
    var oldSrc = ply.src; // just to remember the old source
    ply.src = ""; // to stop the player you have to replace the source with nothing
    startTime();
  }

  if (currentQuestion == totQuestions) {
    document.getElementById("previousQuizContainer").style.display = "none";
    document.getElementById("quiz_timer").innerHTML = "";
    document.getElementById("quiz_timer").style.display = "none";
    container.style.display = "none";
    resultCont.style.display = "";
    resultCont.textContent = "Your Score: " + score;
    saveScore();
    return;
  }

  if (currentQuestion < 101) {
    removeNextButton();
    document.getElementsByClassName("option")[0].style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementsByClassName("option")[1].style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementsByClassName("option")[0].style.color = "#000000";
    document.getElementsByClassName("option")[1].style.color = "#000000";
  }

  //console.log("Current Question at End of function: " + currentQuestion);
  loadPreviousQuestion(currentQuestion);
  loadQuestion(currentQuestion);
}

function loadNextQuestion() {
  var qu = questionEl.innerText;
  var selectedOption = document.querySelector("input[type=radio]:checked");
  if (currentQuestion > 100) {
    if (!selectedOption) {
      alert("Please select your answer!");
      return;
    }
  }
  if (selectedOption.value) { var answer = selectedOption.value; }
  saveTranscript(qu, selectedOption.value);
  if (questions[currentQuestion].answer == selectedOption.value) {
    score += 1;
    if (currentQuestion < 100) {
      listeningScore += 1;
    } else if (currentQuestion > 100) {
      grammarScore += 1;
    }
  }
  selectedOption.checked = false;
  currentQuestion++;
  if (currentQuestion == totQuestions - 1) {
    nextButton.textContent = "Finish";
  }
  if (currentQuestion == 100) {
    document.getElementById("title").innerHTML = "Grammer Section";
    document.getElementById("option3").style.display = "inline-block";
    document.getElementById("pOption3").style.display = "inline-block";
    document.getElementById("nOption3").style.display = "inline-block";
    var ply = document.getElementById("player");
    var oldSrc = ply.src; // just to remember the old source
    ply.src = ""; // to stop the player you have to replace the source with nothing
    startTime();

    // To disable:
    document.getElementById('pOption1').style.pointerEvents = 'none';
    document.getElementById('pOption2').style.pointerEvents = 'none';
    document.getElementById('pOption3').style.pointerEvents = 'none';
    document.getElementById('nOption1').style.pointerEvents = 'none';
    document.getElementById('nOption2').style.pointerEvents = 'none';
    document.getElementById('nOption3').style.pointerEvents = 'none';
  }
  if (currentQuestion == totQuestions) {
    document.getElementById("previousQuizContainer").style.display = "none";
    document.getElementById("quiz_timer").innerHTML = "";
    document.getElementById("quiz_timer").style.display = "none";
    container.style.display = "none";
    resultCont.style.display = "";
    resultCont.textContent = "Your Score: " + score;
    saveScore();
    return;
  }
  if (currentQuestion < 101) {
    removeNextButton();
    document.getElementsByClassName("option")[0].style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementsByClassName("option")[1].style.background = "rgba(255, 255, 255, 0.5)";
    document.getElementsByClassName("option")[0].style.color = "#000000";
    document.getElementsByClassName("option")[1].style.color = "#000000";
  }

  loadPreviousQuestion(currentQuestion, answer);
  loadQuestion(currentQuestion);
}

// Update the count down every 1 second
function startTime() {
  document.getElementById("quiz_timer").style.display = "block";

  // Set the date we're counting down to
  var countDownDate = new Date();
  //var res = countDownDate.getTime() + 2700000;
  countDownDate.setTime(countDownDate.getTime() + 2700000);

  var x = setInterval(function () {
    // Get todays date and time
    var now = new Date().getTime();

    // Find the distance between now an the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    //var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    //var hours = Math.floor(
    //  (distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)
    //);
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Output the result in an element with id="demo"
    document.getElementById("quiz_timer").innerHTML =
      minutes + "m " + seconds + "s ";

    // If the count down is over, write some text
    if (distance < 0) {
      clearInterval(x);
      document.getElementById("quiz_timer").innerHTML = "";
      document.getElementById("quiz_timer").style.display = "none";
      //document.getElementById("demo").innerHTML = "EXPIRED";
      alert("Your time is up!");
      currentQuestion = 200;
      // Display Score!
      saveScore();
      container.style.display = "none";
      resultCont.style.display = "";
      resultCont.textContent = "Your Score: " + score;
      return;
      //return false;
    }
  }, 1000);
}

function saveScore() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //console.log("AJAX sucess");
    }
  };
  xhttp.open(
    "GET",
    "update_score.php?score=" + score + "&id_number=" + id_number + "&listeningScore=" + listeningScore + "&grammarScore=" + grammarScore + "&questions=" + questions,
    true
  );
  xhttp.send();
}

function saveTranscript(q, answer) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      //console.log("AJAX sucess");
    }
  };
  xhttp.open(
    "GET",
    "update_transcript.php?question=" + q + "&id_number=" + id_number + "&answer=" + answer,
    true
  );
  xhttp.send();
  //console.log(q + " => " + answer);
}

loadQuestion(currentQuestion);
