<?php

namespace App\CustomeClasses;
use App\Models\Backend\ActivityLog;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class OwnClasses
{


    public static function AuthUserLocationAccess($regionalOfficeId,$reqDiv = [], $reqDis = [], $reqUpa = [], $reqUni = [], $reqWard = null):bool {
        $authUser = auth()->user();
        $reqDiv = array_map('intval', $reqDiv);
        $reqDis = array_map('intval', $reqDis);
        $reqUpa = array_map('intval', $reqUpa);
        $reqUni = array_map('intval', $reqUni);
        if($reqWard != null){
            $reqWard = array_map('intval', $reqWard);
        }
        if($authUser->user_type ==0 || $authUser->user_type ==-1 ){
            return true;
        }

        $userRegional= $authUser->regional->id ?? null;
        $userDivisions = $authUser->divisions->pluck('id')->toArray();
        $userDistricts = $authUser->districts->pluck('id')->toArray();
        $userUpazillas = $authUser->upazillas->pluck('id')->toArray();
        $userUnions = $authUser->unions->pluck('id')->toArray();
        $userWards = $authUser->wards->pluck('id')->toArray();

       if($userRegional != null && $regionalOfficeId != $userRegional){
           return false;
       }

        if (!empty(array_diff($reqDiv, $userDivisions))) {
            return false;
        }

        if (!empty(array_diff($reqDis, $userDistricts))) {
            return false;
        }

        if (!empty(array_diff($reqUpa, $userUpazillas))) {
            return false;
        }

        if (!empty(array_diff($reqUni, $userUnions))) {
            return false;
        }

        /*if (!is_null($reqWard)) {
            if (!empty(array_diff($reqWard, $userWards))) {
                return false;
            }
        }*/

        return true;
    }


    public static function uploadFile(UploadedFile $file, $allowTypes = null, $path = null)
    {
        if ($file->isValid()) {
            $fileName = 'file_' . md5(uniqid()) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $directory = $path ? 'public/' . $path : 'public';
            if ($file->storeAs($directory, $fileName,'public')) {
                return $fileName;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }


    public static function somebangle($number) {
        $banglaNumbers = ['০', '১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯'];
        $number = strval($number);
        $banglaNumber = '';

        for ($i = 0; $i < strlen($number); $i++) {
            $digit = $number[$i];
            $banglaNumber .= $banglaNumbers[$digit];
        }

        return $banglaNumber;
    }


}
