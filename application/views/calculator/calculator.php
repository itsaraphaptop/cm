<style type="text/css">
  body {
    width: 500px;
    margin: 4% auto;
    font-family: 'Source Sans Pro', sans-serif;
    letter-spacing: 5px;
    font-size: 1rem;
    -moz-user-select: none;
    -webkit-user-select: none;
    -ms-user-select: none;
  }
  .calculator {
    padding: 20px;
    -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    border-radius: 1px;
  }
  .input {
    border: 1px solid #ddd;
    border-radius: 1px;
    height: 60px;
    padding-right: 15px;
    padding-top: 10px;
    text-align: right;
    margin-right: 6px;
    font-size: 2.3rem;
    overflow-x: auto;
    transition: all .2s ease-in-out;
  }
  .input:hover {
    border: 1px solid #bbb;
    -webkit-box-shadow: inset 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
  }
  .buttons {}
  .operators {}
  .operators div {
    display: inline-block;
    border: 1px solid #bbb;
    border-radius: 1px;
    width: 56.7px;
    text-align: center;
    padding: 10px;
    margin: 20px 4px 10px 0;
    cursor: pointer;
    background-color: #ddd;
    transition: border-color .2s ease-in-out, background-color .2s, box-shadow .2s;
  }
  .operators div:hover {
    background-color: #ddd;
    -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    border-color: #aaa;
  }
  .operators div:active {
  font-weight: bold;
  }
  .leftPanel {
    display: inline-block;
  }
  .numbers div {
    display: inline-block;
    border: 1px solid #ddd;
    border-radius: 1px;
    width: 80px;
    text-align: center;
    padding: 10px;
    margin: 10px 4px 10px 0;
    cursor: pointer;
    background-color: #f9f9f9;
    transition: border-color .2s ease-in-out, background-color .2s, box-shadow .2s;
  }
  .numbers_c div {
    display: inline-block;
    border: 1px solid #bbb;
    border-radius: 1px;
    width: 80px;
    text-align: center;
    padding: 10px;
    margin: 20px 4px 10px 0;
    cursor: pointer;
    background-color: #f9f9f9;
    transition: border-color .2s ease-in-out, background-color .2s, box-shadow .2s;
  }
  .numbers div:hover {
    background-color: #f1f1f1;
    -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    border-color: #bbb;
  }
  .numbers_c div:hover {
    background-color: #f1f1f1;
    -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    border-color: #bbb;
  }
  .numbers div:active {
    font-weight: bold;
  }
  div.equal {
    display: inline-block;
    border: 1px solid #3079ED;
    border-radius: 1px;
    width: 17%;
    text-align: center;
    padding: 70px 10px;
    margin: 12px 6px 10px 0;
    vertical-align: top;
    cursor: pointer;
    color: #FFF;
    background-color: #4d90fe;
    transition: all .2s ease-in-out;
  }
  div.equal:hover {
    background-color: #307CF9;
    -webkit-box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 4px 0px rgba(0, 0, 0, 0.2);
    border-color: #1857BB;
  }
  div.equal:active {
    font-weight: bold;
  }
  #clear{
    background-color: #F44336;
  }
  #clear:hover {
    background-color: #FF7043;
  }
</style>
<div class="calculator">
    <!-- <div class="input" id="input-window"></div> -->
  <input class="input" id="input-window" disabled />
  <div class="buttons">
    <div class="operators">
      <div id="%" class="aluminum square" onclick="percent()">%</div>
      <div id="/" class="aluminum square" onclick="operate('/')">&divide;</div>
      <div id="*" class="aluminum square" onclick="operate('*')">&times;</div>
      <div id="-" class="aluminum square" onclick="operate('-')">-</div>
      <div id="+" class="aluminum square" onclick="operate('+')">+</div>
    </div>
      <div class="numbers_c">
        <div id="7" class="aluminum round number">7</div>
        <div id="8" class="aluminum round number">8</div>
        <div id="9" class="aluminum round number">9</div>
        <div id="clear" class="aluminum square" onclick="clearButton()">C</div>
      </div>
    <div class="leftPanel">
      <div class="numbers">
        <div id="4" class="aluminum round number">4</div>
        <div id="5" class="aluminum round number">5</div>
        <div id="6" class="aluminum round number">6</div>
      </div>
      <div class="numbers">
        <div id="1" class="aluminum round number">1</div>
        <div id="2" class="aluminum round number">2</div>
        <div id="3" class="aluminum round number">3</div>
      </div>
        <div class="numbers">
        <div id="0" class="aluminum round number">0</div>
        <div id="." class="aluminum round" onclick="decimal()">.</div>
        <div id="-1" class="aluminum round" onclick="plusmin()">+/-</div>
        <!-- <button id="=" class="" >=</button> -->
        </div>
    </div>
    <div class="equal aluminum square" id="result" onclick="equals()">=</div>
  </div>
</div>

<div id="formula" style="display: none"></div>

<script src="https://code.jquery.com/jquery-2.2.1.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<script type="text/javascript">
  var drainage; // battery drain timer

function init() {
  turnCalcOff();
  $.mobile.loading().hide();
  $(document).keyup(turnCalcOn);

  // Number Buttons. Using jQuery Mobile onTap for better mobile experience.
  // Eliminates 300ms click->tap conversion.
  $('div.number').on('tap', enterNumber);
}

// Power Button logic
function powerButton() {
  fBtnPressed = false;
  ($('#power-btn').css('color') === 'rgb(0, 0, 0)') ? turnCalcOn(): turnCalcOff();
}

function turnCalcOn() {
  clearAll();
  power = true;
  $('#input-window').css('background-color', 'turquoise');
  // $('#battery').css('visibility', 'visible');
  // $('#power-btn').css('color', 'rgb(0,102,204)');

  // Drain the battery by 25% every 8 seconds.
  var count = 5;
  drainage = setInterval(() => {
    count--;
    $('#battery').addClass('fa fa-battery-' + count + ' fa-stack-1x');
    if (count === 0) count = 5;
  }, 5000);
}

function turnCalcOff() {
  clearInterval(drainage);
  clearAll();
  power = false;
  $('#input-window').css('background-color', 'lightgray');
  $('#battery').css('visibility', 'hidden');
  $('#power-btn').css('color', 'black');
}

// [C] / [AC] button logic to clear the calculator
function clearButton() {
  fBtnPressed = false;
  if ($('#input-window').val() !== '' &&
    $('#clear').text() === 'C') {
    $('#clear').text('AC');
    clearEntry();
  } else {
    clearAll();
  }
}

function clearEntry() {
  $('#input-window').val('');
}

function clearAll() {
  $('#clear').text('C');
  $('#input-window').val('');
  $('#formula').text('');
}

// Manage state when clicking on the round buttons:
// Turn calc on if needed, don't allow repeat presses of function buttons, and
// clear the display if the equals button was pressed prior to clicking on a round button.
function prerequisites() {
  fBtnPressed = false;
  if (power === false) turnCalcOn();
  if (clear === true) {
    clear = false;
    clearEntry();
    $('#clear').text('C');
  }
}

function enterNumber() {
  prerequisites();

  // Add a decimal if the user tries to enter two leading zeroes
  if ($('#input-window').val() === '0') {
    $('#input-window').val('0.');
    return;
  }

  // If we have fewer than 10 digits, enter the number
  var input = $('#input-window').val();
  if (((input.indexOf('.') && (input.indexOf('-')) < 0) && input.length < 10) ||
    (((input.indexOf('.') && input.indexOf('-')) > 0) && input.length < 12) ||
    (((input.indexOf('.') || input.indexOf('-')) > -1) && input.length < 11)) {
    $('#input-window').val($('#input-window').val() + this.id);
  }
}

// Decimal Button. Allow only one, not at the end, and prepend a 0
// if entered before other numbers.
function decimal() {
  prerequisites();
  var val = $('#input-window').val();
  if (val.toString().length >= 10) return;
  if (!val) $('#input-window').val('0');
  if (val.indexOf('.') < 0) $('#input-window').val($('#input-window').val() + '.');
}

// Make negative or positive when +/- button is pressed by multiplying by -1
function plusmin() {
  if ($('#input-window').val() === '') return; //nothing to calculate
  result = eval($('#input-window').val() + '*-1');
  formatNumber(result);
}

// get the previously entered value (A) * (current value (B) / 100)
// http://blogs.msdn.com/b/oldnewthing/archive/2008/01/10/7047497.aspx
function percent() {
  //nothing to calculate
  if ($('#formula').text() === '') return;

  if (fBtnPressed === true) {
    return;
  } else {
    fBtnPressed = true;
    clear = true;
    var A = $('#formula').html().match(/((\d|\.)+)(?!.*\d)/);
    var B = $('#input-window').val();
    var result = eval(A[0] * (B / 100));
    formatNumber(result);
  }
}

// Multiply, divide, add, or subtract and update formula in the #formula div.
function operate(operator) {
  if ($('#input-window').val() === '') return; //nothing to calculate

  // If the user just pressed an operator button, replace the operator
  // in the formula string. Otherwise, update the input window with current
  // result and add the operator to the formula string
  if (fBtnPressed === true) {
    var formula = $('#formula').html().replace(/(\+|\-|\*|\/)$/, operator);
    $('#formula').html(formula);
  } else {
    fBtnPressed = true;
    clear = true;
    $('#formula').text($('#formula').text() + $('#input-window').val());
    result = eval($('#formula').text());
    formatNumber(result);
    $('#formula').html($('#formula').text() + operator);
  }
}

// Prepare the hidden div formula for eval() and send
// results to be formatted and displayed
function equals() {
  fBtnPressed = false;

  //nothing to calculate
  if ($('#input-window').val() === '') return;

  // Eval doesn't like, for example, 5 minus negative 4 (5--4).
  // Format as (5-4*-1) instead.
  var input = $('#input-window').val();
  if (input < 0) {
    $('#formula').text($('#formula').text() + '(' + (-1 * input) + '*-1)');
  } else {
    $('#formula').html($('#formula').text() + $('#input-window').val());
  }

  var result = eval($('#formula').text());
  clear = true;
  $('#formula').text('');
  formatNumber(result);
}

// Format number to fit on-screen
function formatNumber(result) {
  result = result.toString();

  // eval() will return an exponential if > 21 digits.
  // Make it an 11 char exponential to fit on-screen
  if (result.indexOf('e') > -1) {
    var split = result.split('e');
    var num = Number(split[0]).toFixed(5);
    result = num + 'e' + split[1];
    update(result);
  }

  // Do nothing if number will fit on screen (12 char max with "-" and ".")
  if ((result.length <= 12 && (result.indexOf('.') > -1 && result.indexOf('-') > -1)) ||
    (result.length <= 11 && (result.indexOf('.') > -1 || result.indexOf('-') > -1)) ||
    (result.length <= 10)) {
    update(result);

    // Convert number to exponential if it's More than 10 digits
    // and has no decimal or a decimal after the 10th digit
  } else if ((result.length > 10 && (result.indexOf('-') < 0) &&
      (result.indexOf('.') < 0 || result.indexOf('.') > 9)) ||
    (result.length > 11 && (result.indexOf('-') > -1) &&
      (result.indexOf('.') < 0 || result.indexOf('.') > 10))) {
    result = Number(result).toExponential(5);
    update(result);

    // At this point we have a positive or negative decimal, run toFixed() to the max length.
  } else if (result.indexOf('-') > -1) {
    result = Number(result).toFixed(11 - result.indexOf('.'));
    update(result);
  } else if (result.indexOf('-') < 0) {
    result = Number(result).toFixed(10 - result.indexOf('.'));
    update(result);
  }
}

function update(result) {
  // trim trailing zeros after the decimal.
  // If left with a trailing decimal, trim that too.
  if (result.indexOf('.') > -1 && result.indexOf('e') < 0) {
    result = result.replace(/0+$/, '');
    if (result.charAt(result.length - 1) === '.') {
      result = result.replace('.', '');
    }
  }

  $('#input-window').val(result);
}

$(document).ready(init);

</script>