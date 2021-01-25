<?php

namespace App\Http\Controllers\Api;

use App\Models\Location;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getAll()
    {
        $locations = Location::all();

        if ($locations) {
            return response()->json([
                'data' => $locations
            ]);
        }

        return response()->json([
            'message' => 'Data tidak ditemukan'
        ]);
    }

    public function getById($id)
    {
        $location = Location::find($id)->first();

        if ($location) {
            return response()->json([
                'data' => $location
            ]);
        }

        return response()->json([
            'message' => 'Data tidak ditemukan'
        ], 404);
    }

    public function addLocation(Request $request)
    {
        $data = [
            'nama_wisata' => $request->json('nama_wisata'),
            'alamat' => $request->json('alamat'),
            'gambar' => $request->json('gambar'),
            'coordinates' => $request->json('coordinates')
        ];

        $location = Location::create($data);

        if ($location) {
            return response()->json([
                'message' => 'Berhasil menambahkan tempat !'
            ]);
        }

        return response()->json([
            'message' => 'Gagal menambahkan data!'
        ], 400);
    }
}
