<!doctype html>
<html lang="en">

<head>
    @include('partials/head')
</head>

<body>
    <div class="d-flex justify-content-center p-3">
        <div class="justify-content-center p-3 w-50 h-50">
            <div class="w-100">
                <h2>Create Product</h2>
            </div>
            <form class="row g-3" action="/save_new" method="POST">
                @csrf
                <div class="col-md-12">
                    <label for="product_name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="product_name" value="" required>
                </div>
                <div class="col-md-12">
                    <label for="product_description" class="form-label">Description</label>
                    <input type="text" class="form-control" name="product_description" value=""
                        required>
                </div>
                <div class="col-md-12">
                    <label for="product_price" class="form-label">Price</label>
                    <input type="text" class="form-control" name="product_price" value=""
                        required>
                </div>
                <div class="col-md-12">
                    <label for="product_stock" class="form-label">Stock</label>
                    <input type="text" class="form-control" name="product_stock" value=""
                        required>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i></button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
