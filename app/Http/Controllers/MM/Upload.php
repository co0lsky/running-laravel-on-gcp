<?php

namespace App\Http\Controllers\MM;


use App\Http\Controllers\Controller;
use App\MediaManager;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\FileAdder\FileAdder;
use Spatie\MediaLibrary\Models\Media;

class Upload extends Controller
{
    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function __invoke(Request $request)
    {
        $path = $request->post('path', 'default');

        $file = $request->file('file');

        $entry = new MediaManager;

        $entry->save();

        $media = $entry
            ->addMedia($file)
            ->toMediaCollectionOnCloudDisk($path);

//        $uploadedPath = $file->store($path);

        dd($media->getFullUrl());

        return response()->json($media->getFullUrl());
    }
}
