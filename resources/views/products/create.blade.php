<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Products - SantriKoding.com</title>
    <link href="{{ asset('frontend/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            <div class="form-group mb-3">
                                <label class="font-weight-bold">NAMA BARANG</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" placeholder="Masukkan Judul Product">

                                <!-- error message untuk title -->
                                @error('title')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">COST PRICE</label>
                                        <input type="number" class="form-control @error('cost_price') is-invalid @enderror" name="cost_price" value="{{ old('cost_price') }}" placeholder="Masukkan Cost Price Product">

                                        <!-- error message untuk price -->
                                        @error('cost_price')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold">SELLING PRICE</label>
                                        <input type="number" class="form-control @error('sell_price') is-invalid @enderror" name="sell_price" value="{{ old('sell_price') }}" placeholder="Masukkan Sell Price Product">

                                        <!-- error message untuk stock -->
                                        @error('sell_price')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            
                            </div>
                            <div class="form-group mb-3">
                                <label class="font-weight-bold">STOCK</label>
                                <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" placeholder="Masukkan Judul Product">

                                <!-- error message untuk title -->
                                @error('stock')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary me-3">Tambah Data</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/ckeditor.js') }}"></script>
</body>

</html>