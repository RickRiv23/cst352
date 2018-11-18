var randomNumber = 5 + 6;
console.log(randomNumber);

var randomNumber = Math.floor(Math.random() * 99) + 1;
var guesses = document.querySelector('#guesses');
var lastResult = document.querySelector('#lastResult');
var lowOrHi = document.querySelector('#lowOrHi');

var guessSubmit = document.querySelector('#guessSubmit');
var guessField = document.querySelector('#guessField');

var won = 0;
var loss = 0;

var guessCount = 1;
var resetButton = document.querySelector('#reset');
// resetButton.style.display = 'none';
$('#reset').hide();
$('#scoreboard').hide();

// console.log(randomNumber);
// document.getElementById("numberToGuess").innerHTML = randomNumber;

var resetButton;


//  MAIN function
function checkGuess() {
    var userGuess = Number(guessField.value);
    if (guessCount === 1) {
        guesses.innerHTML = 'Previous guesses: ';
        
        // $('#guesses').text('Previous Guesses: ');
    }
    
    guesses.innerHTML += userGuess + '     ';
    
        if (userGuess === randomNumber) {
            lastResult.innerHTML = 'Congratulations! You won!';
            // lastResult.style.backgroundColor = 'green';
            $('#lastResult').css('backgroundColor', 'green');
            $('#lastResult').css('color', 'white');
            lowOrHi.innerHTML = '';
            
            won++;
            setGameOver();
        } else if (guessCount === 7) {
            // lastResult.innerHTML = 'You lose...';
            $('#lastResult').html('You lose...');
            $('#lowOrHi').html('The number was:  ' + randomNumber);
            $('#lowOrHi').css('backgroundColor', 'blue');
            $('#lowOrHi').css('color', 'white');
            
            loss++;
            setGameOver();
        } else if (userGuess > 99) {
            // lastResult.innerHTML = 'Your guess is over 99! Try something smaller.';
            $('#lastResult').html('Your guess is over 99! Try something smaller.');
        } else {
            // lastResult.innerHTML = 'Wrong!';
            // lastResult.style.backgroundColor = 'red';
            $('#lastResult').html('Wrong!');
            $('#lastResult').css('backgroundColor', 'red');
            
            
            if(userGuess < randomNumber) {
                // lowOrHi.innerHTML = 'Last guess was too low!';
                $('#lowOrHi').html("Too low.");
            } else if (userGuess > randomNumber) {
                // lowOrHi.innerHTML = 'Last guess was too high!';
                $('#lowOrHi').html('Too high.');
            } 
            
             guessCount++;
        }

        guessField.value = '';
        guessField.focus();
}

guessSubmit.addEventListener('click', checkGuess);

function setGameOver() {
    guessField.disabled = true;
    guessSubmit.disabled = true;
    
    // resetButton.style.display = 'inline';
    $('#reset').show();
    
    $('#scoreboard').show();
    $('#wins').html('Wins: ' + won);
    $('#losses').html('Losses: ' + loss);
    
    resetButton.addEventListener('click', resetGame);
}

function resetGame() {
    guessCount = 1;
    
    var resetParas = document.querySelectorAll('.resultParas p');
    for (var i = 0 ; i < resetParas.length ; i++) {
        resetParas[i].textContent = '';
    } 
    
    // resetButton.style.display = 'none';
    $('#reset').hide();
    $('#scoreboard').hide();
    
    guessField.disabled = false;
    guessSubmit.disabled = false;
    guessField.value = '';
    guessField.focus();
    
    // lastResult.style.backgroundColor = 'white';
    $('#lastResult').css('backgroundColor', 'white');
    $('#lastResult').css('color', 'inherit');
    
    $('#lowOrHi').css('backgroundColor', 'transparent');
    $('#lowOrHi').css('color', 'black');
    
    randomNumber = Math.floor(Math.random() * 99) + 1;
}
