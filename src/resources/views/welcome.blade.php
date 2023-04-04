<!DOCTYPE html>
<html lang="en">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Property Search</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>


<body>
<div class="container mt-5">
    <h1>Property Search</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/" method="post" name="searchForm">
        <div class="row mt-3">
            <div class="col-sm-4 d-flex flex-column justify-content-end">
                <label for="name" class="form-label">Name (partial match)</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="col-sm-2 d-flex flex-column justify-content-end">
                <label for="bedrooms" class="form-label">Bedrooms (exact match)</label>
                <input type="number" class="form-control" name="bedrooms" id="bedrooms" min="0">
            </div>
            <div class="col-sm-2 d-flex flex-column justify-content-end">
                <label for="bathrooms" class="form-label flex-column">Bathrooms (exact match)</label>
                <input type="number" class="form-control" name="bathrooms" id="bathrooms" min="0">
            </div>
            <div class="col-sm-2 d-flex flex-column justify-content-end">
                <label for="storeys" class="form-label">Storeys (exact match)</label>
                <input type="number" class="form-control" name="storeys" id="storeys" min="0">
            </div>
            <div class="col-sm-2 d-flex flex-column justify-content-end">
                <label for="garages" class="form-label">Garages (exact match)</label>
                <input type="number" class="form-control" name="garages" id="garages" min="0">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-6 d-flex flex-column justify-content-end">
                <label for="price" class="form-label">Price</label>
                <div class="input-group">
                    <label for="price_min"></label>
                    <label for="price_max"></label>
                    <span class="input-group-text">$</span>
                    <input type="number" class="form-control" name="price_min" id="price_min" min="0">
                    <span class="input-group-text">-</span>
                    <input type="number" class="form-control" name="price_max" id="price_max" min="0">
                </div>
            </div>
            <div class="col-sm-6 d-flex flex-column justify-content-end">
                <button type="submit" class="btn btn-primary mt-3">Search</button>
            </div>
        </div>
    </form>
    <div class="tableWrapper">
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
