<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album</title>
    <style>
        body {
            background-color: #e8ffff;
        }
    </style>
</head>
<body>

    <?php
    session_start();

    $dir = "images/";       // Sets the directory to the images directory
    $a = scandir($dir);     // Scans the image directory into an array
    $opendir = opendir($dir);

    ?>

    <!-- This form is to navigate the images -->

    <form action="" method="post">
    <input type="submit" name="first" value="First">
    <input type="submit" name="previous" value="Previous">
    <input type="submit" name="next" value="Next">
    <input type="submit" name="last" value="Last">

    </form>
    <br />
    <br />


    <?php
    $tot = count($a);       // Total images in the directory

    if($tot > 2) 
    {

        if(isset($_POST['first']) || (isset($_POST['previous']) && $_SESSION['count'] === 2))       
        {   // If first is clicked or prev is pressed when current is first image
        
            echo "<img style='height: 400px;widht: 400px;' src='images/$a[2]' alt='image'>";
            $_SESSION['count'] = 2;
        }
        else if(isset($_POST['last']) || (isset($_POST['next']) && $_SESSION['count'] === ($tot-1))) 
        {   // If the last is clicked or next is pressed when the current is the last image
            
            $last = $tot - 1;
            echo "<img style='height: 400px;widht: 400px;' src='images/$a[$last]' alt='image'>";
            // $_SESSION['count'] = $last;
        }
        else if(isset($_POST['previous'])) 
        {
            $_SESSION['count']--;           // Go to the previous image
            $idx = $_SESSION['count'];      // Storing the index in 'idx'
            echo "<img style='height: 400px;widht: 400px;' src='images/$a[$idx]' alt='image'>";
        }
        else if(isset($_POST['next'])) 
        {
            $_SESSION['count']++;           // Go to the next image
            $idx = $_SESSION['count'];      // Storing the index in 'idx'
            echo "<img style='height: 400px;widht: 400px;' src='images/$a[$idx]' alt='image'>";
        }
    }
    else // When no images found
    {
        echo "There are no images<br>";
        echo "<a href='newupload.php'>Click Here</a> to upload new images.";
    }

    ?>
    <br>
    <a href="newupload.php">Previous Page</a>


</body>
</html>