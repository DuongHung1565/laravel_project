
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController; // thêm dòng này




Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);
