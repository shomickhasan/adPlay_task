<?php
namespace App\Repositories;

use Illuminate\Http\Request;

class ImageUploadRepository
{

    public function imageUpload(Request $request, $fileKey, $uploadPath)
    {
        if ($request->hasFile($fileKey)) {
            $uploadedFile = $request->file($fileKey);
            $imageName = time() . '.' . $uploadedFile->getClientOriginalExtension();
            $uploadedFile->move($uploadPath, $imageName);

            return $uploadPath . '/' . $imageName;
        }

        return null; 
    }

    public function UploadImage($request, $name, $directory)
    {
        $doUpload = function ($image) use ($directory) {
            $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $imageName = $name . '_' . uniqid() . '.' . $extension;
            
            $path = $image->storeAs($directory, $imageName, 'public');
    
            return $path;
        };
    
        if (!empty($name) && $request->hasFile($name)) {
            $file = $request->file($name);
    
            if (is_array($file) && count($file)) {
                $imagesPath = [];
    
                foreach ($file as $key => $image) {
                    $imagesPath[] = $doUpload($image);
                }
    
                return $imagesPath;
            } else {
                return $doUpload($file);
            }
        }
    
        return false;
    }
}