<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm
     */
    public function index()
    {
        $products = Product::with('store')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('products.index', compact('products'));
    }

    /**
     * Form tạo mới sản phẩm
     */
    public function create()
    {
        $stores = Store::all();
        return view('products.create', compact('stores'));
    }

    /**
     * Lưu sản phẩm mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'store_id' => 'required|exists:stores,id',
        ]);

        Product::create($request->all());

        return redirect()
            ->route('products.index')
            ->with('success', 'Thêm sản phẩm thành công');
    }

    /**
     * Form chỉnh sửa sản phẩm
     */
    public function edit(Product $product)
    {
        $stores = Store::all();
        return view('products.edit', compact('product', 'stores'));
    }

    /**
     * Cập nhật sản phẩm
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'store_id' => 'required|exists:stores,id',
        ]);

        $product->update($request->all());

        return redirect()
            ->route('products.index')
            ->with('success', 'Cập nhật sản phẩm thành công');
    }

    /**
     * Xóa sản phẩm
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Xóa sản phẩm thành công');
    }
}
