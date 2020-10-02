<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Upload</title>
    <style>
        body {
            background-color: #e8ffff;
        }
    </style>
</head>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">      <!--Form to select the image -->
        <h2>Select the Image: </h2> <br>
        
        <input type="file" name="upfile[]" multiple id="uploadedFile">
        <br><br><br>
        <input type="submit" value="Upload">
    </form>
    <br>
    
    
    <!-- Form to input the image to be deleted -->
    <form method="post">
    <h2>Image to be Deleted(With extention): </h2> <input type="text" name="imgname">
    <input type="submit" name="submit" value="Delete">
    <br><br><br>

    <?php
        if(isset($_POST['submit'])) {
            $imgname = $_POST['imgname'];
            if(!file_exists("images/$imgname"))
            {
                echo $imgname.' is not present';
            }
            else{
                unlink("images/$imgname");
                echo 'Deleted the Image '. $imgname;
            }
        }
    ?>

</body>
</html>