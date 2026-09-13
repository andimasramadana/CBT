<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        $query = Gallery::latest();

        if ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $galleries = $query->paginate(12);

        $categories = Gallery::whereNotNull('category')
            ->distinct()
            ->pluck('category');

        return view('gallery.index', compact(
            'galleries',
            'categories'
        ));
    }
}