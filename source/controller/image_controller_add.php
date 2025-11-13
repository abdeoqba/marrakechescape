<?php 

  if(isset($_POST) && is_array($_POST)){
    $action = "add";

    function imageResize($imageResourceId,$width,$height,$targetWidth,$targetHeight) {
        $targetLayer=imagecreatetruecolor($width,$height);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$width,$height, $width,$height);
        return $targetLayer;
    }
      include("image_controller_add_photo_file.php");

    include("image_controller_main.php");
  }

?>