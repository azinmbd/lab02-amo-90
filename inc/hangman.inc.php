<?php

/**
 * Student Name:            Azin Mobedmehdiabadi
 * Student Number:          300365490
 * Assignment/File Name:    Lab02
 * 
 * Description: 
 * 
 * This portion describes the File/Assignment
 * 
 * References: 
 * https://www.php.net/manual/en/function.strlen
 * https://www.php.net/manual/en/function.array-search.php
 * https://www.php.net/manual/en/function.strtoupper.php
 * https://www.php.net/manual/en/function.strtolower.php
 * 
 * This portiion is for any references you ror your assignment 
 * please make sure you provide the appropriate url references
 * or any comment for example if you referenced some help you
 * received from your instructor or some demo code provided in
 * class.
 * 
 * STOP!!! 
 * Did you follow the Assignment Submission Guidlines?
 * Did you double check your submission runs in anohter directory or on another computer?
 *  
 *      
**/

//This function prints out the hangman in its masked form.
function printMasked(& $hangman)  {
    for ($i = 0; $i < count($hangman); $i++) {
        echo $hangman[$i][1] ;
    }
    echo "\n";
}

//This function handles the user guessing a character
function guessChar(& $hangman, $userChar)   {
    $maskedString='';
    for ($i=0; $i <count($hangman) ; $i++) { 
        if (strtolower($hangman[$i][0]) === strtolower($userChar)) {
            $hangman[$i][1] =  strtoupper($userChar);
        }
    } 
}

//This function checks to see if the user has entered all the correct characters, if true it contratulates the user and exists.
function checkStatus(& $hangman)    {
    if(array_search('*', array_column($hangman, 1)) === false){
        echo "Congratulations, you win!\n";
        exit();
    }
}

//This function prompts the user for input and then creatds the datastructure for the game;
function getWord()  {
    //Here are the random pizza types, you may not use this array or modify it in the program, you may only pick a value from it!.
    $pizzaTypes = ['Marinara', 
        'Margherita', 
        'Chicago', 
        'Tomato', 
        'Sicilian', 
        'Greek', 
        'California'];
    
    //Shuffle the array, pull one from the top or find the length of the array and select a random number.
    shuffle($pizzaTypes);
    return $pizzaTypes[0];
}

function getArray($word)    {
    //Get the datastructure we are going to use for the rest of the program based on the word that was randomly selected.
    $hangman = [];
    for ($i = 0; $i < strlen($word); $i++) {
        $hangman[] = [$word[$i], '*'];
    }
    return $hangman;

}

//Thus function returns the number of tries that the user should get based on the word that was selected.
function getTries(& $word)    {
    //Remember you want 2x the number of letters in the word
    return 2 * strlen($word);
}


?>