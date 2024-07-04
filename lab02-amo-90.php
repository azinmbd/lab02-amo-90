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
 * https://www.php.net/manual/en/function.ctype-alpha.php
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

require "inc/hangman.inc.php";

//Return the word for the user, return the only array we are going ot use!
$word = getWord();

//Get the number of tries we should allow the user (2x the number of characters from the returned pizza type.)
$tries = getTries($word);

//Construct the array we are going to use for the rest of the program based on the Word.
$hangman = getArray($word);

echo "Guess the letters for the following word:\n";
printMasked($hangman);
echo "\n";

while (true) {
    //Prompt the user for a letter

    echo "Please enter a guess: ";
    //Display a masked version of the name according to the attributes in the Array

    $input = readline();

    if (strlen($input) !== 1 ||  !ctype_alpha($input)) {
        echo "Please type a valid character!! ";
    } else {
        guessChar($hangman, $input);

        //Check the game status!
        printMasked($hangman);
        
        checkStatus($hangman);

        //Tell the user how many tries they have left.

        $tries--;

        if ($tries === 0) {
            echo "Sorry out of tries!";
            exit();
        } else {
            echo "You have $tries left!\n";
        }

    }
}

//If the counter is at zero then prompt the user that their number of tries is over and exit the program.

?>
