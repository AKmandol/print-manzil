<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shop Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 p-0">
                <div class="d-flex justify-content-between my-3">
                    <a href="{{ route('register') }}" class="btn btn-primary px-5" type="submit">Register</a>
                    <a href="{{ route('root') }}" class="btn btn-success px-5" type="submit">Home</a>
                    <a href="{{ route('login') }}" class="btn btn-dark px-5" type="submit">Login</a>
                </div>
            </div>
        </div>       
        <div class="row p-3 border">
            <div class="col-md-12">
                <h4 class="p-3 bg-light mb-3 border text-center">Shop Page</h4>

                <div class="p-3">
                    <h6 class="p-3 bg-light mb-3 text-center">Shop ==> Category ==> Product</h6>
                    <table class="table table-bordered table-striped align-middle text-center">
                        <thead>
                            <tr>
                                <th scope="col">Shop Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Products</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{ count($categories) }}">{{ $store->name }}</td>
                                    @endif
                                    
                                    <td>{{ $category->name }}</td>

                                    <td>
                                        <ul class="list-unstyled">
                                            @forelse ($category->products as $product)
                                                <li>{{ $product->name }} - ${{ $product->price }}</li>
                                            @empty
                                                <li class="text-muted">No products available</li>
                                            @endforelse
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>