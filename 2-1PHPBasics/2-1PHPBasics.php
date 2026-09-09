<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2-1 PHP Basics</title>
</head>
<body>
    
    <?php 
    echo "<h1>2-1 PHP Basics</h1>";

    $yourName = "Elizabeth Acheson";
    echo "<h2> $yourName </h2>";

    $number1 = 10;
    $number2 = 15;
    $total = 0;

    echo "<h3> Value one is $number1 </h3>";

    echo "<h3> Value two is $number2 </h3>";

    $total = $number1 + $number2;

    echo "<h3> Added together the value is " . "$total </h3>";

    $languages = ["PHP", "HTML", "Javascript"];
        foreach ($languages as $language)
        {
            echo "<ul> $language </ul>" ;
        }
    ?>


</body>
</html>