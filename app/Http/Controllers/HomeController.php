<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Dispatch;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori = Kategori::paginate(3);
        
        $artikel = Artikel::paginate(3);
        return view('home', compact(['kategori','artikel']));
    }
}
