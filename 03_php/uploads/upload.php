<?php
$ok = true;

if(!isset($_FILES['new_image'])) {
    echo "No image<br>";
    die();
}
echo $_FILES['new_image']['name'] . "<br>";
echo $_FILES['new_image']['tmp_name'] . "<br>";

$extension = pathinfo($_FILES['new_image']['name'], PATHINFO_EXTENSION);
echo $extension . "<br>";
$filename = md5($_FILES['new_image']['name'] . $_FILES['new_image']['tmp_name']);
echo $filename . "<br>";

// Check if this is an image
$image_data = getimagesize($_FILES['new_image']['tmp_name']);
if($image_data == false) {
    $ok = false;
    echo "ERROR: Not an image file " . $extension . "<br>";
}
else {
    echo "Image data: " . $image_data[0] . " " . $image_data[1] . " " . $image_data[2] . " " . $image_data[3] . "</br>";
}

// Check image size
if($_FILES['new_image']['size'] > 500000) {
    $ok = false;
    echo "ERROR: Image size too large " . $_FILES['new_image']['size'] . "<br>";
}

$valid_extensions = array('jpg', 'jpeg', 'png', 'gif');
if(!in_array($extension, $valid_extensions)) {
    $ok = false;
    echo "ERROR: Invalid type " . $extension . "<br>";
}

if($ok) {
    if(move_uploaded_file($_FILES['new_image']['tmp_name'], 'images/' . $filename . '.' . $extension)) {
        echo "FILE UPLOADED";
    }
    else {
        echo "ERROR: Could not save file on the server<br>";
    }
}
else {
    echo "FILE NOT UPLOADED";
}
?>
<br>
<a href='gallery.php'>Gallery</a>

