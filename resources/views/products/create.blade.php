<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-4">
    <h3>➕ Thêm sản phẩm</h3>

    <!-- VALIDATION ERRORS -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <!-- TÊN SẢN PHẨM -->
        <div class="form-group">
            <label>Tên sản phẩm *</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>
        </div>

        <!-- MÔ TẢ -->
        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="description"
                      class="form-control"
                      rows="3">{{ old('description') }}</textarea>
        </div>

        <!-- GIÁ -->
        <div class="form-group">
            <label>Giá *</label>
            <input type="number"
                   name="price"
                   class="form-control"
                   min="1"
                   value="{{ old('price') }}"
                   required>
        </div>

        <!-- CỬA HÀNG -->
        <div class="form-group">
            <label>Cửa hàng *</label>
            <select name="store_id" class="form-control" required>
                <option value="">-- Chọn cửa hàng --</option>
                @foreach($stores as $store)
                    <option value="{{ $store->id }}"
                        {{ old('store_id') == $store->id ? 'selected' : '' }}>
                        {{ $store->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Lưu</button>
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Quay lại</a>
    </form>
</div>

</body>
</html>
