<?php
include('add_Img_script.php');
?>
<!DOCTYPE html>
<html>
<link rel = "stylesheet" type = "text/css" href = "style.css">  
<body>
<div class="divForm"><br>
        <h2>Add Image</h2>

        <form  method="post" enctype="multipart/form-data">
        <div class="container">

    <input type="file" name="image_gallery[]" accept="image/*" multiple>
    <input type="submit" value="Upload Now" name="submit" id="btn">
    <br><br>
    <a href="data.php" id="btn" style="text-decoration:none; background-color:blue; margin:20px">BACK</a>
    <a href="logout.php" id="btn" style="text-decoration:none; background-color:red;">Logout</a>
</div>
</form>
</div>
</body>
</html>