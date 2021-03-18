<?php

namespace App\Models;

class ImageUpload
{

    public static function upload($folderName, $image){
        $imageName = time() . '_' . $image->getClientOriginalName();

        $result = $image->move(public_path() . "/assets/images/$folderName/", $imageName);

        if($result) {
            return $imageName;
        }
        
        return false;

    }

    public static function delete($product, $prop){
        // Storage::disk('public')->delete('assets/img/' . $image);
        $oldImagePath = public_path() . "/assets/images/$product->name/" . $product->$prop;
                
        if(file_exists($oldImagePath)) {
            return unlink($oldImagePath);
        }
    }


}
