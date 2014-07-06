<?php

//Get the words from an external file and store it in array.
$filecontent = file_get_contents('wordlist.txt');
$words = preg_split('/[\s]+/', $filecontent, -1, PREG_SPLIT_NO_EMPTY);
$file_word_count = count($words);

$numWords = "";
$addNumberOption = false;
$addSymbolOption = false;
$makeUpperCase = false;

//Error checking for the user input of numerical value.If user enters a character,
//the default #words is 4 and value field is blank.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  	$numWords = test_input($_POST["number_of_words"]);
}

//Retrieve the user input from the form.
foreach($_POST as $key => $value) {
	if ($key == "add_number")
		$addNumberOption = true;
	elseif ($key == "add_symbol") 
		$addSymbolOption = true;
	elseif ($key == "upper_case") 
		$makeUpperCase = true;
}

$numWordsReset = false;
if($numWords == "")
{
	$numWords = 4;
	$numWordsReset = true;
}

//get the random indcies from words array.
$array_rand_indices = array();
for($i=0; $i < $numWords; $i++){
	$random_index = rand(0,$file_word_count);
	$array_rand_indices[$i] = $random_index;
}

if($numWordsReset)
	$numWords = "";

//Create an array of words, based on the number of words entered..
$passwordArray = Array();
$i = 0;
foreach ($array_rand_indices as $value) {
	$passwordArray[$i] = $words[$value];
	$i++;
}

//Create the password string.
$passwordString = "";
foreach ($passwordArray as $value) {
	$passwordString .= $value;
	$passwordString .= "-";
}

//Delete the last character.
$passwordString = substr($passwordString, 0, -1);

//Add the number in the string
if($addNumberOption)
{
	$random_number = rand(0, 9);
	$passwordString .= $random_number;
}

//Add the symbol in the string.
if($addSymbolOption)
{
	$passwordString .= "@";
}

//Make first character in upper case.
if($makeUpperCase)
{
	$passwordString = ucfirst($passwordString);
}

//function to validate the input data of number of words.
function test_input($data) {
	 if( is_numeric($data))
	 	$nWords = $data;
	 else
	 	$nWords = "";

	 return $nWords;
}