<?php

namespace App\Http\Controllers\MM;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Listing extends Controller
{
    /**
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     *
     */
    public function __invoke(Request $request)
    {
        return response()->json([
            [
                'type' => 'dir',
                'path' => 'folder1',
                'basename' => 'folder1',
                'filename' => 'folder1',
            ],
            [
                'type' => 'file',
                'basename' => 'sunset.jpg',
                'extension' => 'jpg',
                'filename' => 'sunset',
            ],
            [
                'type' => 'file',
                'path' => 'https://images.unsplash.com/photo-1503803548695-c2a7b4a5b875',
                'thumb' => 'https://images.unsplash.com/photo-1503803548695-c2a7b4a5b875',
                'basename' => 'sunset.jpg',
                'extension' => 'jpg',
                'filename' => 'sunset',
            ]
        ]);
    }
}
