<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>3-1 PHP Functions</title>
</head>
<?php 
$timestamp = "2026-09-17";

function mmddyyformat($timestamp) {
   echo date('m/d/Y', strtotime($timestamp)); 
}

mmddyyformat($timestamp);

echo "<br> <br>";

function ddmmyyformat($timestamp) {
   echo date('d/m/Y', strtotime($timestamp)); 
}

ddmmyyformat($timestamp);

echo "<br> <br>";

$string = "    Elizabeth Acheson DmaCc   "   ;

function stringFormat($string) {
    echo "The amount of characters in the string is " . strlen($string);
   
    echo "<br> <br>";

    $string = trim($string);

    echo "Here is the string trimmed " . $string;

    echo "<br> <br>";

    $string = strtolower($string);

    echo "Here is the string in lowercase " . $string;
    
    echo "<br> <br>";

    $find = "dmacc";

    if (str_contains($string, $find)){
        echo "dmacc was found in the string!";
    }
    else {
        echo "dmacc was not found in the string!";
    };
}

stringFormat($string);

echo "<br> <br>";

$phoneNumber = 1234567890;

function phoneNumberFormat($phoneNumber){
echo substr($phoneNumber, 0, 3) . "-" . substr($phoneNumber, 3, 3) . "-" . substr($phoneNumber, 6, 4);
}

phoneNumberFormat($phoneNumber);

echo "<br> <br>";

$currencyNumber = 123456;

function displayCurrency($currencyNumber){
    echo "$" . number_format($currencyNumber/100 , 2, '.', ',');
}

displayCurrency($currencyNumber);
?>
<body>
    
</body>
</html>