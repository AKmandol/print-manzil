<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Merchant Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">      
        <div class="row p-3 border my-3">
            <div class="col-md-12">
                <h4 class="p-3 bg-light mb-3 border text-center">Merchant Dashboard</h4>
                <div class="p-3">
                  <h6 class="p-3 bg-light mb-3 text-center">Welcome, {{ auth()->user()->name }}</h6>

                  <!-- Store -->
                  @if ($errors->has('success_msg_store'))
                      <div class="alert alert-success text-center my-2">
                          {{ $errors->first('success_msg_store') }}
                      </div>
                  @endif
                  <div class="p-3 rounded border">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mx-2 bg-light">
                          <h6 class="p-3 bg-light mb-3 text-center border-bottom">Store List</h6>
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th scope="col">User Name</th>
                                    <th scope="col">Store Name</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($stores as $store)
                                  <tr>
                                    <td>{{ auth()->user()->name }}</td>
                                    <td>{{ $store->name }}</td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mx-2 bg-light">
                          <h6 class="p-3 bg-light mb-3 text-center border-bottom">Create Store</h6>
                          <form method="POST" class="p-3 border" action="{{ route('merchant.createStore') }}">
                              @csrf
                              <div class="mb-3">
                                  <label class="form-label">Store Name</label>
                                  <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your store name" class="form-control">
                                  @error('name')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="text-center">
                                  <button class="btn btn-danger w-50" type="submit">Create</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Store -->

                  <!-- Category -->
                  @if ($errors->has('success_msg_category'))
                      <div class="alert alert-success text-center my-2">
                          {{ $errors->first('success_msg_category') }}
                      </div>
                  @endif
                  <div class="p-3 rounded border">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mx-2 bg-light">
                          <h6 class="p-3 bg-light mb-3 text-center border-bottom">Category List</h6>
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th scope="col">Store Name</th>
                                    <th scope="col">Category Name</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($stores as $store)
                                  @foreach ($store->categories as $category)
                                  <tr>
                                    <td>{{ $store->name }}</td>
                                    <td>{{ $category->name }}</td>
                                  </tr>
                                  @endforeach
                                  @endforeach  
                              </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mx-2 bg-light">
                          <h6 class="p-3 bg-light mb-3 text-center border-bottom">Create Category</h6>
                          <form method="POST" class="p-3 border" action="{{ route('merchant.createCategory') }}">
                              @csrf
                              <div class="mb-3">
                                  <label class="form-label">Select Store</label>
                                  <select name="store_id" class="form-select">
                                    <option selected disbled value="">Select Store</option>
                                      @foreach ($stores as $store)
                                      <option value="{{$store->id}}">{{$store->name}}</option>
                                      @endforeach
                                  </select>
                                  @error('store_id')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Category Name</label>
                                  <input type="text" name="category_name" value="{{ old('category_name') }}" placeholder="Enter your category name" class="form-control">
                                  @error('category_name')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="text-center">
                                  <button class="btn btn-danger w-50" type="submit">Create</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Category -->

                  <!-- Product -->
                  @if ($errors->has('success_msg_product'))
                      <div class="alert alert-success text-center my-2">
                          {{ $errors->first('success_msg_product') }}
                      </div>
                  @endif
                  <div class="p-3 rounded border">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mx-2 bg-light">
                          <h6 class="p-3 bg-light mb-3 text-center border-bottom">Product List</h6>
                          <table class="table table-bordered table-striped">
                              <thead>
                                  <tr>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Product Name</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($products as $product)
                                  <tr>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ $product->name }}</td>
                                  </tr>
                                  @endforeach  
                              </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mx-2 bg-light">
                          <h6 class="p-3 bg-light mb-3 text-center border-bottom">Create Product</h6>
                          <form method="POST" class="p-3 border" action="{{ route('merchant.createProduct') }}">
                              @csrf
                              <div class="mb-3">
                                  <label class="form-label">Select Store</label>
                                  <select name="store_id_product" class="form-select">
                                    <option selected disbled value="">Select Store</option>
                                      @foreach ($stores as $store)
                                      <option value="{{$store->id}}">{{$store->name}}</option>
                                      @endforeach
                                  </select>
                                  @error('store_id_product')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Select Category</label>
                                  <select name="category_id" class="form-select">
                                    <option selected disbled value="">Select Category</option>
                                      @foreach($stores as $store)
                                      @foreach ($store->categories as $category)
                                      <option value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                      @endforeach
                                  </select>
                                  @error('category_id')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="mb-3">
                                  <label class="form-label">Product Name</label>
                                  <input type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Enter your product name" class="form-control">
                                  @error('product_name')
                                      <span class="text-danger">{{ $message }}</span>
                                  @enderror
                              </div>
                              <div class="text-center">
                                  <button class="btn btn-danger w-50" type="submit">Create</button>
                              </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Product -->

                </div>
            </div>
        </div>
        <a class="text-center mb-4 btn btn-light w-100 fw-bold" href="{{route('logout')}}">Logout</a>
    </div
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>