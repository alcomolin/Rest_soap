<!doctype html>
<html lang="en">

<head>

    {{-- modal edit product --}}
    @include('partials/head')
</head>

<body>
    <div class="d-flex justify-content-center p-3 table-responsive">
        <table class="table table-striped table-bordered table-hover w-50 h-50">
            <div class="justify-content-center">
                <a type="button" class="btn btn-primary btn-sm m-1" href="/create/" title="Add New Product"><i class="fa-solid fa-plus"></i></a>
            </div>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datos as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>{{ $item->price }}</td>
                        <td>{{ $item->stock }}</td>
                        <td class="d-flex justify-content-center">
                            <a type="button" class="btn btn-primary btn-sm m-1" href="/edit/{{ $item->id }}"><i
                                    class="fa-regular fa-pen-to-square"></i></a>
                            <button class="btn btn-danger btn-sm m-1" onclick="deleteProduct({{ $item->id }})">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
