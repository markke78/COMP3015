<?php

$numbers = [2, 4, 8, 16, 32, 64, 128, 256, 512, 1024, 2048, 4096];

$sum = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $sum += $numbers[$i];
}
echo "\nThe sum of the array elements is: $sum\n\n";


// An associative array of show names and associated dates when the shows aired 
$shows = [
    'Seinfeld' => 'July 5th, 1989 - May 14th, 1998',
    'Curb Your Enthusiasm' => 'October 15th, 2000 - Current',
    'The Simpsons' => 'December 17, 1989 - Current',
];

foreach ($shows as $name => $airedDates) {
    echo "$name: $airedDates\n";
}

echo PHP_EOL . "Program finished running." . PHP_EOL;
