<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.page.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.page.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Danh mục đã được tạo thành công.');
    }

    public function edit(Category $category)
    {
        return view('admin.page.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Danh mục đã được cập nhật thành công.');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);

        // Kiểm tra xem có sản phẩm trong danh mục không
        if ($category->products()->withTrashed()->count() > 0) {
            return redirect()->route('categories.index')
                ->with('error', 'Không thể xóa danh mục vì vẫn còn sản phẩm trong danh mục này.');
        }

        // Xóa ảnh nếu có
        // if ($category->image) {
        //     Storage::disk('public')->delete($category->image);
        // }

        // Cập nhật trạng thái và soft delete
        $category->status = 0;
        $category->save();
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', 'Danh mục đã được xóa thành công.');
    }

    public function trashed()
    {
        $categories = Category::onlyTrashed()->paginate(5);
        return view('admin.page.category.trashed', compact('categories'));
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->findOrFail($id);
        $category->restore();
        $category->status = 1;
        $category->save();
        
        return redirect()->route('categories.trashed')
            ->with('success', 'Danh mục đã được khôi phục thành công.');
    }
} 