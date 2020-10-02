<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
        body {
            background-color: #e8ffff;
        }
    </style>
</head>
<body>
    <?php
    $target="images/";

    $count=0;
    if(count($_FILES['upfile']['name'])>10)
    {
        echo "There are more than 10 files <br>";
        echo "<a href=\"javascript:history.go(-1)\"><br> Previous Page </a>";
    }
    else
    {
        $flag=0;
        foreach ($_FILES['upfile']['name'] as $filename) 
        {
          
            $type = $_FILES['upfile']['type'][$count];      // this assigns the variable type as the type of the file
            $init_path = $_FILES['upfile']['tmp_name'][$count];
            $size = $_FILES['upfile']['size'][$count];      // this assigns the variable size as the size of the file

            if($type !== "image/jpeg" && $type !== "image/jpg") {       // Checking the file extension
                echo "The image is not jpg<br>";
                echo "<a href='newupload.php'>Previous Page</a>";
                $flag=1;
                break;
            }
            else if($size >= 200000) {                  // Checking the size
                echo "Image size exceeded the limit";
                $flag=1;
                break;
            }
            else {
                move_uploaded_file($init_path,$target.$filename);           // Moving the file to the image directory
            }
            $temp='';
            $tmp='';
            $count=$count + 1;
        }
        if($flag===0)
        {
            echo "<h2>Uploaded</h2><br>";
            echo "Upload more images: ";
            echo "<a href='javascript:history.go(-1)' > Click </a><br><br><br>";
            echo "<a href='album.php'>Click</a> to view the Album";
        }

        
        
    }

    ?>
</body>
</html>