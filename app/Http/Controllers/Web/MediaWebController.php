<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaWebController extends Controller
{
    public function index()
    {
        $mediaCatalog = Media::all();

        return view('media.index', compact('mediaCatalog'));
    }
}
