<?php include "header.php" ?>
<style>
 div#test{ border:#000 1px solid; padding:10px 40px 40px 40px; }
 background-color:lightgree

</style>

<div>
 <h2 id="test_status">Math Quiz</h2>
 <h3 id="timeleft">Time left</h3>
</div>
<div id="test"></div>

<script>
var myVar;
function startTimer() {
  myVar = setInterval(function(){myTimer()},1000);
  timelimit = maxtimelimit;
}
function myTimer() {
  if (timelimit > 0) {
    curmin=Math.floor(timelimit/60);
    cursec=timelimit%60;
    if (curmin!=0) { curtime=curmin+" minutes and "+cursec+" seconds left"; }
              else { curtime=cursec+" seconds left"; }
    $_('timeleft').innerHTML = curtime;
  } else {
    $_('timeleft').innerHTML = timelimit+' - Out of Time - no credit given for answer';
    clearInterval(myVar);
 }
  timelimit--;
}


var pos = 0, posn, choice, correct = 0, rscore = 0;
var maxtimelimit = 25, timelimit = maxtimelimit;  // 20 seconds per question
var questions = [
    [ "Name the Father of the Nation.", "Dr.Rajendra Prasad", "Mahatma Gandhi", "Jawaharlal Nehru", "B" ],
    [ "Name the national game of India.", "Hockey", "Cricket", "Kabaddi", "A" ],
    [ "Where is Taj Mahal located?", "Mumbai", "sachin", "Agra", "C" ],
    [ "What is 8 / 2?", "10", "2", "4", "C" ],
    [ "What is 18 x 4?", "108", "72", "64", "B" ],
    [ "What is the normal boiling point?", "50 deg. Celcius", "100 deg. Celcius", "98 deg. Celcius", "A" ],
    [ "What is 6 + 4 + 2?", "12", "14", "16", "A" ],
    [ "What is 20 - 7?", "7", "13", "11", "B" ],
    [ "What is 5 x 5?", "21", "24", "25", "C" ],
    [ "What is 8 / 4?", "10", "2", "4", "B" ],
	[ "Name the nearest planet to the sun.","Mercury","Earth","Mars","A"],
	[ "Which given the same answer as 5+5+5+5?","5*2","10*2","20*2","B"],
	[ "Which city is known as pink city?","Banaras","Hyderabad","Jaipur","C"],
	[ "Which is the smallest bird?","Humming bird","Sparrow","Kiwi","A"],
	[ "Which year India won the cricket world cup?","1985","1983","1982","B"],
	[ "What is the outer layer of the atmosphere?","Thermosphere","Mesosphere","Exosphere","A"],
	[ "How many heart an octopus?","3","10","9","A"],
	[ "Earthworm breathes through?","Lungs","Skin","Nose","B"],
	[ "Animal with the largest brain in the world?","Sperm Whale","Dolphin","Octopus","A"],
	[ "How many legs does an insert carry?","6","8","12","C"]
];
var questionOrder = [];
function setQuestionOrder() {
  questionOrder.length = 0;
for (var i=0; i<questions.length; i++) { questionOrder.push(i); }
  questionOrder.sort(randOrd);   // alert(questionOrder);  // shuffle display order
  pos = 0;  posn = questionOrder[pos];
}

function $_(IDS) { return document.getElementById(IDS); }
function randOrd() { return (Math.round(Math.random())-0.5); }
function renderResults(){
  var test = $_("test");
  test.innerHTML = "<h2>You got "+correct+" of "+questions.length+" questions correct</h2>";
  $_("test_status").innerHTML = "Test Completed";
  $_('timeleft').innerHTML = '';
  test.innerHTML += '<button onclick="location.reload()">Re-test</a> ';
  setQuestionOrder();
  correct = 0;
  clearInterval(myVar);
  return false;
}
function renderQuestion() {
  var test = $_("test");
  $_("test_status").innerHTML = "Question "+(pos+1)+" of "+questions.length;
  if (rscore != 0) { $_("test_status").innerHTML += '<br>Currently: '+(correct/rscore*100).toFixed(0)+'% correct'; }
  var question = questions[posn][0];
  var chA = questions[posn][1];
  var chB = questions[posn][2];
  var chC = questions[posn][3];
  test.innerHTML = "<h3>"+question+"</h3>";
 test.innerHTML += "<label><input type='radio' name='choices' value='A'> "+chA+"</label><br>";
  test.innerHTML += "<label><input type='radio' name='choices' value='B'> "+chB+"</label><br>";
  test.innerHTML += "<label><input type='radio' name='choices' value='C'> "+chC+"</label><br><br>";
  test.innerHTML += "<button onclick='checkAnswer()'>Submit Answer</button>";
  timelimit = maxtimelimit;
  clearInterval(myVar);
  startTimer();
}

function checkAnswer(){
  var choices = document.getElementsByName("choices");
  for (var i=0; i<choices.length; i++) {
    if (choices[i].checked) { choice = choices[i].value; }
  }
  rscore++;
  if (choice == questions[posn][4] && timelimit > 0) { correct++; }
  pos++;  posn = questionOrder[pos];
  if (pos < questions.length) { renderQuestion(); } else { renderResults(); }
}

window.onload = function() {
  setQuestionOrder();
  renderQuestion();
}
</script>
<?php include "footer.php" ?>
