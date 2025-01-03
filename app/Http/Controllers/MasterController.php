<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function client()
    {
        $products = Product::where('status', 1) // Chỉ lấy sản phẩm có trạng thái kích hoạt
                        ->select('name', 'thumbnail', 'link_access')
                        ->take(6) // Giới hạn 6 sản phẩm
                        ->get();
        $categories = Category::with(['products' => function ($query) {
            $query->take(6); // Lấy tối đa 6 sản phẩm
        }])->get();

    return view('client.index', compact('products', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
