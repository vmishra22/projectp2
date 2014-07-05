<?php

$filecontent = file_get_contents('wordlist.txt');
$passwordArray = Array();

$words = preg_split('/[\s]+/', $filecontent, -1, PREG_SPLIT_NO_EMPTY);
$file_word_count = count($words);

$numWords = "";
$addNumberOption = false;
$addSymbolOption = false;

foreach($_POST as $key => $value) {
	if($key == "number_of_words")
		$numWords = $value;
	elseif ($key == "add_number")
		$addNumberOption = true;
	elseif ($key == "add_symbol") 
		$addSymbolOption = true;
}

$numWordsReset = false;
if($numWords == "")
{
	$numWords = 4;
	$numWordsReset = true;
}

$array_rand_indices = array();
for($i=0; $i < $numWords; $i++){
	$random_index = rand(0,$file_word_count);
	$array_rand_indices[$i] = $random_index;
}

if($numWordsReset)
	$numWords = "";

$i = 0;
foreach ($array_rand_indices as $value) {
	$passwordArray[$i] = $words[$value];
	$i++;
}

$passwordString = "";
foreach ($passwordArray as $value) {
	$passwordString .= $value;
	$passwordString .= "-";
}

$passwordString = substr($passwordString, 0, -1);

if($addNumberOption)
{
	$random_number = rand(0, 9);
	$passwordString .= $random_number;
}

if($addSymbolOption)
{
	$passwordString .= "@";
}
