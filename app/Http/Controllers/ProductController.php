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
            'video_demo' => 'nullable|mimes:mp4,mov,avi|max:102400',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
            'link_access' => 'nullable|url',
            'link_faq' => 'nullable|url',
            'link_call' => 'nullable|url',
            'link_download' => 'nullable|url',
            'link_pricing' => 'nullable|url',
            'link_review' => 'nullable|url',
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
            'video_demo.max' => 'Video không được vượt quá 100MB.',
            'link_access.url' => 'Liên kết truy cập phải là một URL hợp lệ.',
            'link_faq.url' => 'Liên kết câu hỏi phải là một URL hợp lệ.',
            'link_call.url' => 'Liên kết đặt cược phải là một URL hợp lệ.',
            'link_download.url' => 'Liên kết tải xuống phải là một URL hợp lệ.',
            'link_pricing.url' => 'Liên kết giá cả phải là một URL hợp lệ.',
            'link_review.url' => 'Liên kết đánh giá phải là một URL hợp lệ.',
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
            'link_access' => $validateData['link_access'],
            'link_faq' => $validateData['link_faq'],
            'link_call' => $validateData['link_call'],
            'link_download' => $validateData['link_download'],
            'link_pricing' => $validateData['link_pricing'],
            'link_review' => $validateData['link_review'],
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được tạo thành công');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.page.product.edit', compact('product', 'categories'));
    }

    // public function show(string $id){

    // }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $validateData = $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id', 
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'video_demo' => 'nullable|mimes:mp4,mov,avi|max:102400',
            'status' => 'required|in:active,inactive',
            'description' => 'nullable|string',
            'link_access' => 'nullable|url',
            'link_faq' => 'nullable|url',
            'link_call' => 'nullable|url',
            'link_download' => 'nullable|url',
            'link_pricing' => 'nullable|url',
            'link_review' => 'nullable|url',
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
            'video_demo.max' => 'Video không được vượt quá 100MB.',
            'link_access.url' => 'Liên kết truy cập phải là một URL hợp lệ.',
            'link_faq.url' => 'Liên kết câu hỏi phải là một URL hợp lệ.',
            'link_call.url' => 'Liên kết đặt cược phải là một URL hợp lệ.',
            'link_download.url' => 'Liên kết tải xuống phải là một URL hợp lệ.',
            'link_pricing.url' => 'Liên kết giá cả phải là một URL hợp lệ.',
            'link_review.url' => 'Liên kết đánh giá phải là một URL hợp lệ.',
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
            'status' => $validateData['status'],
            'description' => $validateData['description'],
            'link_access' => $validateData['link_access'],
            'link_faq' => $validateData['link_faq'],
            'link_call' => $validateData['link_call'],
            'link_download' => $validateData['link_download'],
            'link_pricing' => $validateData['link_pricing'],
            'link_review' => $validateData['link_review'],
        ]);

        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được cập nhật thành công');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Sản phẩm đã được xóa thành công');
    }
    
    public function trashed(Request $request)
    {
        $search = $request->input('search');

        // Tìm kiếm sản phẩm đã bị xóa
        $query = Product::onlyTrashed()->with('category');

        if ($search) {
            $query->where('name', 'LIKE', '%' . $search . '%');
        }

        $listProduct = $query->paginate(10);

        return view('admin.page.product.trashed', ['products' => $listProduct]);
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('product.trashed')->with('success', 'Sản phẩm đã được khôi phục thành công');
    }

    
} 