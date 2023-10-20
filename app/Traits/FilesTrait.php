<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait FilesTrait
{
    public function saveFile($image, $filePath)
    {
        $imageName = time().rand().'.'.$image->extension();  
        $path = $image->move(public_path($filePath), $imageName);
        return $imageName;    
    }


    public function updateFile($newImage = null, $oldImage, $filePath)
    {
        if($oldImage)
        {
            $this->deleteFile($oldImage,$filePath);
        }
        if($newImage !=null)
        {
            $imageName = $this->saveFile($newImage,$filePath);
            return $imageName;
        }
    }

    public function deleteFile($fileName, $filePath)
    {
        Storage::disk('public')->delete($filePath . '/' . $fileName);
    }

}