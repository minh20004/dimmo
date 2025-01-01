<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public $products;
    public function __construct()
    {
        return $this->products = new Product();
    }

    public function index()
    {
        $products = Product::with('category')->paginate(10);
        return view('admin.page.product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.page.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id', 
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_demo' => 'nullable|mimes:mp4,mov,avi|max:20480',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'category_id.required' => 'Danh mục sản phẩm không được để trống.',
            'category_id.exists' => 'Danh mục không tồn tại trong cơ sở dữ liệu.',
            'thumbnail.image' => 'Ảnh sản phẩm phải là một file ảnh.',
            'thumbnail.mimes' => 'Ảnh sản phẩm phải có định dạng: jpeg, png, jpg hoặc gif.',
            'thumbnail.max' => 'Ảnh sản phẩm không được vượt quá 2MB.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái không hợp lệ.',
            'video_demo.mimes' => 'Video phải có định dạng: mp4, mov hoặc avi.',
            'video_demo.max' => 'Video không được vượt quá 20MB.',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('uploads/avtproduct', 'public');
        } else {
            $thumbnailPath = null;
        }

        if ($request->hasFile('video_demo')) {
            $videoPath = $request->file('video_demo')->store('uploads/videos', 'public');
        } else {
            $videoPath = null;
        }

        $product = Product::create([
            'name' => $validateData['name'],
            'category_id' => $validateData['category_id'],
            'thumbnail' => $thumbnailPath,
            'video_demo' => $videoPath,
            'status' => $validateData['status'],
            'description' => $validateData['description'],
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.page.product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id', 
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_demo' => 'nullable|mimes:mp4,mov,avi|max:20480',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
        ], [
            'name.required' => 'Tên sản phẩm không được để trống.',
            'category_id.required' => 'Danh mục sản phẩm không được để trống.',
            'category_id.exists' => 'Danh mục không tồn tại trong cơ sở dữ liệu.',
            'thumbnail.image' => 'Ảnh sản phẩm phải là một file ảnh.',
            'thumbnail.mimes' => 'Ảnh sản phẩm phải có định dạng: jpeg, png, jpg hoặc gif.',
            'thumbnail.max' => 'Ảnh sản phẩm không được vượt quá 2MB.',
            'status.required' => 'Trạng thái không được để trống.',
            'status.in' => 'Trạng thái không hợp lệ.'
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('uploads/avtproduct', 'public');
        } else {
            $thumbnailPath = $product->thumbnail;
        }

        $product->update([
            'name' => $validateData['name'],
            'category_id' => $validateData['category_id'], 
            'thumbnail' => $thumbnailPath,
            'status' => $validateData['status']
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công');
    }
} 