<?php
$filename = "numbers.txt";
$file = fopen($filename, "w") or die("Unable to open file!");

for ($i = 1; $i <= 100; $i++) {
    $num = rand(1, 9);
    fwrite($file, $num . " ");
}

fclose($file);

$file = fopen($filename,  "r");

$line = trim(fgets($file));
fclose($file);

$numbers = explode(" ", $line);


for($i = 0; $i < count($numbers); $i += 10){
   $var = array_slice($numbers, $i, 10);
   echo "Input: ";
    echo implode(" ",$var);
    echo "<br>";
    $repeat = array();
    $counts = array_count_values($var);
    foreach($counts as $key => $value){
        if(fmod($value , 2) != 0){
            $repeat[] = $key;
        }
    }
    echo "Output: ";
    echo implode(" ",array: $repeat);
    echo "<br>";
}
?>