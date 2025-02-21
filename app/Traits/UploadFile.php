<?php

namespace App\Traits;

trait UploadFile
{
    /**
     * Upload a file to the specified directory.
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory
     * @return string
     */
    public function uploadFile($file, $directory)
    {
        $filename = time() . '_' . rand(100000 , 999999) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/' . $directory, $filename);
        return $directory . '/' . $filename;
    }
}
