<!DOCTYPE html>
<html>

<head>
    <title>Laravel 8 Form Example Tutorial</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <div class="card">
            <div class="card-header text-center font-weight-bold">
                Laravel 8 - Add Product Post Form Example
            </div>
            <div class="card-body">
                <form name="add-product-post-form" id="add-product-post-form" method="post"
                    action="{{ route('products.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="sku_code">Nomor SKU</label>
                        <input type="text" id="sku_code" name="sku_code"
                            class="form-control @error('sku_code') is-invalid @enderror" value="{{ old('sku_code') }}"
                            required />
                        @error('sku_code')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                            required />
                        @error('name')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <textarea name="description" id="description"
                            class="form-control">{{ old('description') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga</label>
                        <input type="number" name="price" id="price"
                            class="form-control @error('price') is-invalid @enderror" value="{{ old('price') }}" />
                        @error('price')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stock">Stok</label>
                        <input type="number" name="stock" id="stock"
                            class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" />
                        @error('stock')
                        <span class="invalid-feedback">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
