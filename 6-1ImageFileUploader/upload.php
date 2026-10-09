<?php
$message="";
$fileName = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_FILES["imageFile"]["error"] == 0) {
        $fileName = $_FILES["imageFile"]["name"];
        $temporaryFile = $_FILES["imageFile"]["tmp_name"];
        $destination = "uploads/" . $fileName;
        $fileSize = $_FILES["imageFile"]["size"];
        $maxSize = 500000;
        $fileExtension = strtolower(
            pathinfo($fileName, PATHINFO_EXTENSION)
        );

        $allowedTypes = ["jpg", "jpeg", "png", "gif"];


        $honeypot =  trim($_POST["website"] ?? "");

        if ($honeypot !== "") {
            $message= "Submission was incorrect";
        } else {
            if (in_array($fileExtension, $allowedTypes)) {
                if ($fileSize <= 500000) {

                    if (move_uploaded_file($temporaryFile, $destination)) {
                        $message= "File uploaded successfully.";
                    } else {
                        $message= "Unable to save file.";
                    }
                } else {
                    $message= "File too Large.";
                }
            } else {
                $message= "Only image files are allowed.";
            }
        }
    } else {
        $fileName = "Error";
        $message= "There was an error uploading the file.";
    }

if (file_exists("uploads/$fileName")) {
        echo "<img src='uploads/$fileName' alt='image' >";
        echo "<br>" . $message;
    } else {
        echo "Please Try Again. <br>";
        echo $message;
    } 

}

 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="imageFile">Choose an image:</label>
        <input type="file" id="imageFile" name="imageFile">

        <br><br>

        <input type="submit" value="Upload Image">

    </form>

    <div style="display:none;">
        <label for="">Website</label>
        <input type="text" name="website" id="website">
    </div>

</body>

</html>