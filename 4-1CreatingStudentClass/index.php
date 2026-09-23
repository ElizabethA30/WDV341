<?php
    require_once "Classes/Student.php";
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creating a Student Class</title>
    
</head>
<body>
    <?php
    $student1 = new Student("Elizabeth", "Acheson", "eacheson@dmacc.edu", "Web Development");

    echo "<h3> Student 1 </h3>";
    echo $student1-> displayStudent();

    $student2 = new Student("Lisa", "Frank", "lfrank@dmacc.edu", "Graphic Design");

    echo "<h3> Student 2 </h3>";
    echo $student2-> displayStudent();

    $student3 = new Student("Kathleen", "Gabrielle", "kgabreielle@dmacc.edu", "Interior Design");

    echo "<h3> Student 3 </h3>";
    echo $student3-> displayStudent();
    ?>
</body>
</html>