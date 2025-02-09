<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">      
        <div class="row p-3 border my-3">
            <div class="col-md-12">
                <h4 class="p-3 bg-light mb-3 border text-center">Admin Dashboard</h4>
                <div class="p-3">
                        <h6 class="p-3 bg-light mb-3 text-center">Merchant List</h6>
                        <table class="table table-bordered table-striped">
                        <tr>
                            <th>Merchant Name</th>
                            <th>Merchant Email</th>
                        </tr>
                        @foreach ($merchants as $merchant)
                        <tr>
                            <td>{{ $merchant->name }}</td>
                            <td>{{ $merchant->email }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <a class="text-center mb-4 btn btn-light w-100 fw-bold" href="{{route('logout')}}">Logout</a>
    </div
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>