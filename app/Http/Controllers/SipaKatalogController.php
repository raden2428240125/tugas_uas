<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class SipaKatalogController extends Controller
{
    public function index(Request $request)
    {
        $kategoris = Kategori::all();

        $query = Obat::with('kategori');

        // Filter by kategori
        if ($request->has('kategori_id') && $request->kategori_id) {
            $query->where('kategori_id', $request->kategori_id);
        }

        // Search by nama
        if ($request->has('search') && $request->search) {
            $query->where('nama_obat', 'like', '%' . $request->search . '%');
        }

        // Filter stock
        if ($request->has('tersedia')) {
            $query->where('stok', '>', 0);
        }

        // Sort
        $sort = $request->get('sort', 'terpopuler');
        switch ($sort) {
            case 'harga_terendah':
                $query->orderBy('harga', 'asc');
                break;
            case 'harga_tertinggi':
                $query->orderBy('harga', 'desc');
                break;
            case 'az':
                $query->orderBy('nama_obat', 'asc');
                break;
            default:
                $query->latest();
                break;
        }

        $obats = $query->paginate(9);

        return view('katalog', compact('obats', 'kategoris'));
    }
}
