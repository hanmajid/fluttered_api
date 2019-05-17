<?php

namespace App\Http\Controllers\Dribbble;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ContentController extends Controller
{
    public function popular() {
        return response()->json([
            [
                'id' => 1,
                'profilePicUrl' => 'https://api.adorable.io/avatars/285/circle@adorable.png',
                'title' => 'Title',
                'artistName' => 'Artist',
                'createdAt' => Carbon::now(),
                'loveCount' => 1,
                'commentCount' => 1,
                'viewCount' => 1,
                'attachmentCount' => 1,
            ]
        ]);
    }

    public function recent() {
        return response()->json([
            [
                'id' => 1,
                'profilePicUrl' => 'https://api.adorable.io/avatars/285/circle@adorable.png',
                'title' => 'Title',
                'artistName' => 'Artist',
                'createdAt' => Carbon::now(),
                'loveCount' => 1,
                'commentCount' => 1,
                'viewCount' => 1,
                'attachmentCount' => 1,
            ]
        ]);
    }

    public function show($id) {
        return response()->json([
            [
                'id' => 1,
                'profilePicUrl' => 'https://api.adorable.io/avatars/285/circle@adorable.png',
                'title' => 'Title',
                'artistName' => 'Artist',
                'createdAt' => Carbon::now(),
                'loveCount' => 1,
                'commentCount' => 1,
                'viewCount' => 1,
                'attachmentCount' => 1,
            ]
        ]);
    }
}
