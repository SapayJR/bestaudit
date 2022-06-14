<?php


namespace App\HelpersClass;

use Carbon\Carbon;
use Storage;


class FileHelperClass
{
    /* Upload file function */
    public static function uploadFile($file, $path, $wmax = null, $hmax = null): string
    {
        $extension = $file->extension();
        $date = now()->unix();
        $fileName = auth()->id().'-'.$date.".".$extension;
        $file->storeAs('public/'. $path, $fileName);

        if ($wmax != null && $hmax != null){
            $uploaddir = \Storage::disk('public')->path("$path/");
            $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $fileName));
            $uploadfile = $uploaddir.$fileName;
            self::resize($uploadfile, $uploadfile, $wmax, $hmax, $ext);
        }

        return $path . $fileName;
    }

    /* Download file function */
    public static function downloadFile($path, $name){
        $path = Storage::disk('public')->path($path);
        return response()->download($path, $name);
    }

    /* Delete file function */
    public static function deleteFile($path){
        return Storage::disk('public')->delete($path);
    }

    /* Обрезка картинки под стандарты системы (стандарты в настройках params.php) */
    public static function resize($target, $dest, $wmax, $hmax, $ext){
        list($w_orig, $h_orig) = getimagesize($target);
        $ratio = $w_orig / $h_orig;

        if (($wmax / $hmax) > $ratio){
            $wmax = $hmax * $ratio;
        } else {
            $hmax = $wmax / $ratio;
        }
        $img = "";
        switch ($ext){
            case ("gif"):
                $img = imagecreatefromgif($target);
                break;
            case ("png"):
                $img = imagecreatefrompng($target);
                break;
            default:
                $img = imagecreatefromjpeg($target);
        }

        $newImg = imagecreatetruecolor($wmax, $hmax);
        if ($ext == "png"){
            imagesavealpha($newImg, true);
            $transPng = imagecolorallocatealpha($newImg, 0,0,0,127);
            imagefill($newImg, 0,0, $transPng);
        }
        imagecopyresampled($newImg, $img, 0,0,0,0, $wmax, $hmax, $w_orig, $h_orig);
        switch ($ext){
            case("gif"):
                imagegif($newImg, $dest);
                break;
            case("png"):
                imagepng($newImg, $dest);
                break;
            default:
                imagejpeg($newImg,$dest);
        }
        imagedestroy($newImg);
    }

}
