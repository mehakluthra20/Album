<?php
require('show_gal.php');
?>
<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style1.css">
<style>
  button{
    background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 10%;

  }
  #go{
    float:right;
  }
  a{
    color:white;
    text-decoration:none;
    }
  </style>
<body>

<!--======image gallery ========-->
<br>
<div class="row">
    
<?php
  if(!empty($fetchImage))
  {
    $sn=1;
    foreach ($fetchImage as $img) {
        
?>
    <div class="column">
    <img src="uploads/
<?php
echo $img['image_name']; 
?>
" style="width:100%" onclick="openModal(); currentSlide(
<?php
echo $sn; 
?>
)" class="hover-shadow cursor">
  </div>
<?php
 $sn++;}
  }else{
    echo "No Image is saved in database";
  }
?>
</div>
<!--======image gallery ========-->
<div id="galleryModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <!--======image gallery modal========-->
  <div class="modal-content">
      
<?php
  if(!empty($fetchImage))
  {
    $sn=1;
    foreach ($fetchImage as $img) {
        
?>
<div class="gallerySlides">
      <div class="numbertext"> / 4</div>
      <img src="uploads/
<?php
echo $img['image_name']; 
?>
" style="width:100%">
    </div>
<?php
 $sn++;}
  }else{
    echo "No Image is saved in database";
  }
?>

    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <div class="caption-container">
      <p id="caption"></p>
    </div>
  </div>
</div>
<button id="go"><a href="logout.php" title="Logout" >Logout</a></button>
<button  onclick="history.back()">Go Back</button>

<script type="text/javascript" src="js/gallery-script.js"></script>
    
</body>
</html>