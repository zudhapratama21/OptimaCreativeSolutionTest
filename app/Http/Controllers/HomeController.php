<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Award;
use App\Models\MediaSosial;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $data=[
            'service' => Service::count(),
            'award' => Award::count(),
            'sosmed' => MediaSosial::count(),
            'article' => Article::count(),
            'product' => Product::count(),
            'listservice' => Service::take(5)->latest()->get(),
            'listaward' => Award::take(5)->latest()->get(),
            'listsosmed' => MediaSosial::take(5)->latest()->get(),
            'listarticle' => Article::take(5)->latest()->get(),
            'listproduct' => Product::take(5)->latest()->get(),
        ];

        return view('admin.dashboard',$data);
    }
}
