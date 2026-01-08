<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm
     */
    public function index()
    {
        $books = Book::with('member')
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('books.index', compact('books'));
    }

    /**
     * Form tạo mới sản phẩm
     */
    public function create()
    {
        $books = Book::all();
        return view('books.create', compact('books'));
    }

    /**
     * Lưu sản phẩm mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'members_id' => 'required|exists:members,id',
            'title' => 'nullable|string',
            'author' => 'nullable|string',
            'isbn' => 'required|string',
            'publication_year' => 'required|numeric', 
            'copies_available' => 'required|numeric',
        ]);

        Book::create($request->all());

        return redirect()
            ->route('books.index')
            ->with('success', 'Thêm sách thành công');
    }

    // /**
    //  * Form chỉnh sửa sản phẩm
    //  */
    // public function edit(Product $product)
    // {
    //     $stores = Store::all();
    //     return view('products.edit', compact('product', 'stores'));
    // }

    // /**
    //  * Cập nhật sản phẩm
    //  */
    // public function update(Request $request, Product $product)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //         'description' => 'nullable|string',
    //         'price' => 'required|numeric|min:0.01',
    //         'store_id' => 'required|exists:stores,id',
    //     ]);

    //     $product->update($request->all());

    //     return redirect()
    //         ->route('products.index')
    //         ->with('success', 'Cập nhật sản phẩm thành công');
    // }

    // /**
    //  * Xóa sản phẩm
    //  */
    // public function destroy(Product $product)
    // {
    //     $product->delete();

    //     return redirect()
    //         ->route('products.index')
    //         ->with('success', 'Xóa sản phẩm thành công');
    // }
}
