<?php

namespace App\Http\Controllers;

use App\Models\MediaSosial;
use Illuminate\Http\Request;

class MediaSosialController extends Controller
{
    public function index()
    {
        $medsos = MediaSosial::all();
        
        return view('admin.media-sosial.index',[
            'medsos' => $medsos
        ]);

    }
}
