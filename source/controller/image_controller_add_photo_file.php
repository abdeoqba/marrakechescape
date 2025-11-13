<?php

  if(is_array($_FILES)) {

    //var_dump($_FILES);


    $file = $_FILES["photo_file"]["tmp_name"]; 

    $_POST["photo_file"] = "asset/image/sample.jpg";

    if(!empty($file)){

      $sourceProperties = getimagesize($file);
      $root = "../../";
      $folderPath = "uploads/images/image_photo_file/";
      $ext = pathinfo($_FILES["photo_file"]["name"], PATHINFO_EXTENSION);
      $imageType = $sourceProperties[2];

      //variables
      date_default_timezone_set("UTC");
      $img_name = date("ymdHis") ."-". mt_rand(1000000,9999999) .".". $ext;

      $_POST["photo_file"] = $folderPath . $img_name;
      $folderPath = $root . $folderPath;

      $target_file = $folderPath.$img_name;
      move_uploaded_file($file, $target_file);

      // switch ($imageType) {


      //     case IMAGETYPE_PNG:

      //         $targetLayer = imagecreatefrompng($file); 

      //         //$targetLayer = imageResize($targetLayer,$sourceProperties[0],$sourceProperties[1],0,0);
      //         imagealphablending($targetLayer, false);
      //         imagesavealpha($targetLayer, true);
      //         imagepng($targetLayer,$folderPath.$img_name);


      //         break;

      //     case IMAGETYPE_JPEG:

      //         $targetLayer = imagecreatefromjpeg($file); 
              
      //         //$targetLayer = imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1],0,0);
      //         imagejpeg($targetLayer,$folderPath.$img_name);

      //         break;

      //     default:
      //         echo "Invalid Image type.";
      //         exit;
      //         break;
      //   }
      }
    }


