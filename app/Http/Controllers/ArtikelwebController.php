<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\Kategori;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArtikelwebController extends Controller
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
        $kategori = Kategori::all();
        $user = User::all();
        return view('artikel.tambah', compact('kategori','user'));
    }

    public function store(Request $request)
    {
        $user = User::all();
        $kategori = new Kategori();
        $artikel = new Artikel();
            $artikel->user_id = Auth::user()->id;
            $artikel->title = $request->title;
            $artikel->content = $request->content;
            $artikel->kategori_id = $request->kategori_id;
            if($request->hasFile('image')){
                $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
                $artikel->image = $request->file('image')->getClientOriginalName();
            }
            $artikel->save();
       return redirect('/home');      
            
    }

    public function detail($id)
    {
        $artikel = Artikel::find($id);
        return view('artikel.detail', compact(['artikel']));
    }

    public function edit($id)
    {
        $kategori = Kategori::all();
        $artikel = Artikel::find($id);
        return view('artikel.edit', compact(['artikel','kategori']));
    }

    public function update(Request $request, $id)
    {
        
        $artikel = Artikel::find($id);
        $artikel->user_id = Auth::user()->id;
        $artikel->title = $request->title;
        $artikel->content = $request->content;
        $artikel->kategori_id = $request->kategori_id;
        $artikel->update($request->all());
        
        if($request->hasFile('image')){
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $artikel->image = $request->file('image')->getClientOriginalName();
            $artikel->save();
        }

        return redirect('/home');
       
    }

    public function destroy(Request $request, $id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();

        return redirect('/home');
       
    }
}
