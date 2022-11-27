const TOTAL_TIME = 120;
const COUNTER_TIME = 20;
const questions = [
    {
        id: 1,
        text: "Which is the largest country in the world?",
        A: "China",
        B: "Russia",
        C: "India",
        D: "United States",
        answer: "B"
    },
    {
        id: 2,
        text: "What does HTML stand for?",
        A: "Hyper Text Markup Language",
        B: "High Text Markup Language",
        C: "HiHat Text Markup Language",
        D: "Sorry, I don't know that one",
        answer: "A"
    },
    {
        id: 3,
        text: "Who is the present President of the United States?",
        A: "Donald Trump",
        B: "Barack Obama",
        C: "Joe Biden",
        D: "Bill Clinton",
        answer: "C"
    },
    {
        id: 4,
        text: "What is the capital of the United States?",
        A: "Washington D.C.",
        B: "New York",
        C: "Los Angeles",
        D: "Chicago",
        answer: "A"
    },
    {
        id: 5,
        text: "In a website browser address bar, what does “www” stand for?",
        A: "World Wide Web",
        B: "World Web Wide", 
        C: "Wait With Water", 
        D: "World With Water", 
        answer: "A"
    },
    {
        id: 6,
        text: "In which European city would you find Orly airport?",
        A: "Hungary", 
        B: "Austria", 
        C: "Paris", 
        D: "Germany", 
        answer: "C"
    }
];

let id = null;
let totalid = null;
let currentQuestionId = 1;

const questionsCount = questions.length //totalquestion
$('#current-question').text(currentQuestionId);
$('#total-question').text(questionsCount);
setQuestion(currentQuestionId);


// Total Time
totalid = setInterval(function() {
    let totalCounter = document.getElementById('total-timer');
    let totalCounterValue = parseInt(totalCounter.innerHTML);
    totalCounterValue--;
    totalCounter.innerHTML = totalCounterValue;
    if(totalCounterValue === 0) {
        clearInterval(totalid);
        $('#quiz').hide();
        $('#score-page').show();
    } 
    // if(totalCounterValue > 0) {
    //     $('#quiz').show();
    //     $('#score-page').hide();
    // }

}, 1000);

// Timer
id = setInterval(function() {
    let counter = document.getElementById('question-timer');
    let counterValue = parseInt(counter.innerHTML);
    counterValue--;
    counter.innerHTML = counterValue;
     if(counterValue === 0) {
        resetCounter();
        currentQuestionId += 1;
         if(currentQuestionId <= questionsCount) {
            setQuestion(currentQuestionId);
         } else {
            clearInterval(id);
         }
         if(currentQuestionId === questionsCount){
            clearInterval(id);
         }
     }
     
     
}, 1000);


// Reset Timer
function resetCounter() {
    let counter = document.getElementById('question-timer');
    counter.innerHTML = COUNTER_TIME;
}


// Show Question
function setQuestion(questionId) {
    $('input[name=option]').prop('checked', false);
    const question = questions.find(question => question.id === questionId)
    document.getElementById('question-text').innerHTML = question.text;
    document.getElementById('option-a-text').innerHTML = question.A;
    document.getElementById('option-b-text').innerHTML = question.B;
    document.getElementById('option-c-text').innerHTML = question.C;
    document.getElementById('option-d-text').innerHTML = question.D;
    document.getElementById('current-question').textContent = questionId;
        if(questionId === questionsCount) {
            $('#next-btn').text('Finish')
            $('#next-btn').click(function() {
                clearInterval(id);
                $('#quiz').hide();
                $('#score-page').show();
                
                
            })
        } else {
            $('#next-btn').text('Next');
        }
        if(questionId === 1) {
            $('#prev-btn').hide();
        } else {
            $('#prev-btn').show();
        };
};

// Button Control
$('#next-btn').click(function() {
    if(!isQuestionAnswered()) {
        swal("Please select an option.");
        return;
    };
    resetCounter();
    if(currentQuestionId < questionsCount) {
        setNextQuestion();
    } else {
        clearInterval(id);
    }
});

$('#prev-btn').click(function() {
    resetCounter();
    
    if(currentQuestionId > 1) {
        setPreviousQuestion();
    }
})

$('#start-btn').on('click', function() {
    currentQuestionId = 1;
    resetCounter();
    setQuestion(currentQuestionId);
    

})


// option
function isQuestionAnswered() {
    let option = $('input[name=option]:checked');
    return option.length > 0;
}

// Previous and Next Question
function setNextQuestion() {
    currentQuestionId++;
    setQuestion(currentQuestionId);
}

function setPreviousQuestion() {
    currentQuestionId--;
    setQuestion(currentQuestionId);
}



// Score
const score = 0;
let totalScore = questions.lenght
$('#correct-answers').text(score)
$('#total-question').text(totalScore)
for(i = 0; i < questionsCount; i++) {
    const answer = document.getElementById('correct-answers');
    if(answer === questions.answer){
        score++;
    }
}