<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KategoriwebController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kategori = Kategori::where('user_id', Auth::id())->paginate(3);
        $artikel = Artikel::where('user_id', Auth::id())->paginate(3);
        return view('data.data', compact(['kategori','artikel']));    
    }
    
    public function tambah()
    {
        return view('kategori.tambah');
    }

    public function store(Request $request)
    {
        $user = User::all();
        $kategori = new Kategori();
        $artikel = new Artikel();
            $kategori->user_id = Auth::user()->id;
            $kategori->name = $request->name;
            $kategori->save();
       return redirect('/home');
       
    }

    public function edit($id)
    {
        $kategori = Kategori::find($id);
        return view('kategori.edit', compact(['kategori']));
    }

    public function update(Request $request, $id)
    {
        $kategori = kategori::find($id);
        $kategori->user_id = Auth::user()->id;
        $kategori->name = $request->name;
        $kategori->update($request->all());
       

        return redirect('/home');
       
    }

    public function destroy(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return redirect('/home');
       
    }

}
