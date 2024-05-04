<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('frontend/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="text-center">
                    <img style="width: 350px; height: auto;" src="{{asset('frontend/images/welcome.png')}}" alt="">
                    <p>Silakan pilih menu di bawah ini:</p>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/products" class="btn btn-primary">Products</a>
                        <!-- <a href="/transactions" class="btn btn-primary">Transaction</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('frontend/bootstrap.bundle.min.js') }}"></script>
</body>

</html>