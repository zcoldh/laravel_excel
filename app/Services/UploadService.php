<?php

namespace App\Services;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadService
{
    public static function uploadFile($file, $allow_ext = ['xls','xlsx'])
    {
        try {
            $fileExtension = $file->getClientOriginalExtension();
            if(! in_array($fileExtension, $allow_ext)) {
                return false;
            }
            $fileName = date('YmdHis').'.'. $fileExtension;
            return $file->storeAs('article', $fileName);

        }catch (\Exception $exception){
            return false;
        }
    }
}
