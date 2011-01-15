<?php
    $filename = preg_replace("/\?[0-9]+$/","",$_GET['img']);
    $degrees = $_GET['angle'];


    $f = explode(".",$filename);
    $f2 = explode("/",$filename);

    if(preg_match("/^\/documents\/dqf/",$filename)==1){


    $img_path = "../documents/_tmp/rotated_images/";

        if(strtolower($f[(sizeof($f)-1)])=="jpg" ||strtolower($f[(sizeof($f)-1)])=="jpeg"){
            $source = imagecreatefromjpeg("../".$filename);
            $rotate = imagerotate($source, $degrees, IMG_COLOR_TRANSPARENT);
            header('Content-type: image/jpeg');
            imagejpeg($rotate,$img_path.$f2[(sizeof($f2)-1)]);
            imagejpeg($rotate,$img_path."_".$f2[(sizeof($f2)-1)]);
            echo preg_replace("/^\.\.[\/]+/","/",$img_path.$f2[(sizeof($f2)-1)]."?".rand(0,999));

        }
    }else{

        $img_path = "../documents/_tmp/rotated_images/";
        $temp_img = $img_path.$f2[(sizeof($f2)-1)];
        try{
            unlink("..".$filename);
        }catch(Exception $e){
            echo $e->getMessage();
        }

        if(strtolower($f[(sizeof($f)-1)])=="jpg" ||strtolower($f[(sizeof($f)-1)])=="jpeg"){
            #$new_temp_file = "../documents/_tmp/rotated_images/"."_".$f2[(sizeof($f2)-1)];
            #$new_temp_file = str_replace("__","_","../documents/_tmp/rotated_images/"."_".preg_replace("/^[_]+[=][0-9]+[=]/","",$f2[(sizeof($f2)-1)]));
            $source_temp_file = $f2[(sizeof($f2)-1)];
            $source_temp_file = preg_replace("/^[_]+/","",$source_temp_file);
            $source_temp_file = preg_replace("/[=][0-9]+[=]/","",$source_temp_file);
            $source = imagecreatefromjpeg($img_path."_".$source_temp_file);
            $rotate = imagerotate($source, $degrees, IMG_COLOR_TRANSPARENT);
            header('Content-type: image/jpeg');
            $rand = rand(0,90);
            imagejpeg($rotate,$img_path."_=".$rand."=".$source_temp_file);
            imagejpeg($rotate,$img_path."_".$source_temp_file);
            echo preg_replace("/^\.\.[\/]+/","/",$img_path."_=".$rand."=".$source_temp_file."?".rand(0,999));

        }
    }
        # сохранение рисунка повернутого
        //imagepng($rotate,rand(0,999).".png");

#<img src="/php/imageRotate.php?angle=90&img=../images/nologo.png" />