<?php

namespace App\Http\Controllers;

use App\Kategori as AppKategori;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = AppKategori::all();
        $data = $kategori->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'kategori retrieved successfully.'
        ];

        
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'user_id' => 'required'
        ]);

        if ($validator->fails()) {
            $response = [
                'success' => false,
                'data' => 'Validation Error.',
                'message' => $validator->errors()
            ];
            return response()->json($response, 404);
        }

        $kategori = AppKategori::create($input);
        $data = $kategori->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'kategori stored successfully.'
        ];
        return response()->json($response, 200);
    }

    public function show($id)
    {
        $kategori = AppKategori::find($id);
        $data = $kategori->toArray();

        if (is_null($kategori)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'kategori not found.'
            ];
            return response()->json($response, 404);
        }


        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'kategori retrieved successfully.'
        ];

        return response()->json($response, 200);
    }

    public function update(Request $request,$id)
    {
        $kategori = AppKategori::find($id);
        $kategori->update($request->all());
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'kategori updated successfully.'
        ];

        return response()->json($response, 200);
    }

    public function destroy($id)
    {
        $kategori = AppKategori::find($id);
        $kategori->delete();
       
        $response = [
            'success' => true,
            'data' => $kategori,
            'message' => 'kategori deleted successfully.'
        ];

        return response()->json($response, 200);
    }
}
