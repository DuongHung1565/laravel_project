<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Quản lý sản phẩm</title>

    <!-- Bootstrap & Icon -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <style>
        body {
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 14px;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px;
            margin-top: 30px;
            border-radius: 5px;
            box-shadow: 0 1px 5px rgba(0,0,0,.1);
        }
        .table-title {
            background: #435d7d;
            color: #fff;
            padding: 15px;
            border-radius: 5px 5px 0 0;
        }
        .table-title h2 {
            margin: 0;
            font-size: 24px;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
    </style>
</head>
<body>

<div class="container-xl">
    <div class="table-wrapper">

        <!-- TITLE + BUTTON -->
        <div class="table-title d-flex justify-content-between align-items-center">
            <h2>Quản lý <b>Sản phẩm</b></h2>

                <!-- <form method="GET" class="mr-2">
                    <input type="text" name="search"
                        class="form-control"
                        placeholder="Search by room or guest"
                        value="{{ request('search') }}">
                </form> -->

            <a href="{{ route('products.create') }}" class="btn btn-success">
                <i class="material-icons">&#xE147;</i> Thêm sản phẩm
            </a>
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE -->
        <table class="table table-striped table-hover mt-3">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mô tả</th>
                    <th>Giá</th>
                    <th>Cửa hàng</th>
                    <th>Ngày tạo</th>
                    <th width="120">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ number_format($product->price, 0) }} đ</td>
                    <td>{{ $product->store->name }}</td>
                    <td>{{ $product->created_at->format('d/m/Y') }}</td>

                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" class="edit">
                            <i class="material-icons" title="Edit">&#xE254;</i>
                        </a>

                        <form action="{{ route('products.destroy', $product->id) }}"
                              method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
                                    style="border:none;background:none">
                                <i class="material-icons delete" title="Delete">&#xE872;</i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- PAGINATION -->
        <div class="d-flex justify-content-end">
            {{ $products->links() }}
        </div>

    </div>
</div>

</body>
</html>
