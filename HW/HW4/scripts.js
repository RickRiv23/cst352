


function validateForm() {
               event.preventDefault();
               var validation = true;
               var answer1 = document.forms["memeGame"]["answer1"].value.toLowerCase();
               var answer2 = document.forms["memeGame"]["answer2"].value;
               var answer3 = document.forms["memeGame"]["answer3"].value;
               var answer4 = $("input[name=answer4]:checked").val();
               var answer5 = $("input[name=answer5]:checked").val();
               var answer6 = $("input[name=answer6]").val().toLowerCase();
               
               var score = 0;
               
            //   Check question #1
               if (answer1 == "") {
                   $("#error--1").show();
                  //  return false;
               } 
               else if(answer1 == "ok"){
                   $("#correctImg--1").show();
                   score++;
               }
               else {
                   $("#wrongImg--1").show();
               };
               
               
            //   Check question #2
               if (answer2 == 3) {
                  $("#correctImg--2").show();
                  score++;
               } else if(answer2 != 3){
                  $("#wrongImg--2").show();
               } else {
                  $("#error--2").show();
               }
               
               
            //   Check question #3
               if (answer3 == "spiderman" || answer3 == "himself") {
                  $("#correctImg--3").show();
                  score++;
               } else if(answer3 == ""){
                  $("#error--3").show();
               } else {
                  $("#wrongImg--3").show();
               }
               
               
            //   Check question #4
               if (answer4 == "yes") {
                  document.getElementById("correctImg--4").style.display = "block";
                  score++; 
               } else {
                  document.getElementById("wrongImg--4").style.display = "block";
               }
               
               
            //   Check question #5
               if (answer5 == "relatable") {
                   document.getElementById("correctImg--5").style.display = "block";
                   score++;
               } else if(answer5 == ""){
                  document.getElementById("error--5").style.display = "block";
               } else {
                   document.getElementById("wrongImg--5").style.display = "block";
               }
               
               
            //   Check question #6
               if (answer6 == "yes") {
                   document.getElementById("correctImg--6").style.display = "block";
                   score++;
               } else if(answer6 == ""){
                  document.getElementById("error--6").style.display = "block";
               } else {
                   document.getElementById("wrongImg--6").style.display = "block";
               }
               
               if (score == 6){
                  $("#score").html("You got 6 out of 6! CoNgRAtuLaTiOns");
               } else if( ((score / 6) > 0.80) && ((score / 6) < 1) ){
                  $("#score").html("You scored 80% or higher!");
               } else{
                  $("#score").html("You got " + ((score/6)*100) + "%");
               }
                  
            return validation;
}