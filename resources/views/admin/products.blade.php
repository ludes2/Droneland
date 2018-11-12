
<div class="content pt-4">
    <div class="card">
        <div class="card-header bg-light">
            Products
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td><img src="{{ asset($product->thumbnail) }}" width="50"></td>
                            <td class="text-nowrap">{{ $product->title }}</td>
                            <td>{{ number_format($product->price, 0, ',', "'") }}.-</td>
                            <td>{{ $product->category }}</td>

                            <td>
                                <a id="{{ $product->id }}" class="btn btn-warning openEditProductModal"><i class="fa fa-pencil"></i></a>
                                <form style="display: none" id="deleteProduct-{{ $product->id }}" action="{{ route('deleteProduct', $product->id) }}" method="POST">@csrf</form>
                                <button type="button" class="btn btn-danger" data-toggle="modal" href="#deleteProductModal-{{ $product->id }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                        <div class="modal fade" id="deleteProductModal-{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="exampleModalLabel">Your are about to delete {{ $product->title }}</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are your sure?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, keep it.</button>
                                        <form method="POST" id="deleteProduct-{{ $product->id }}" action="{{ route('deleteProduct', $product->id) }}">@csrf
                                            <button type="submit" class="btn btn-primary">Yes, delete it.</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </tbody>
                </table>

                <div class="text-center">
                    {!! $products->links(); !!}
                </div>

            </div>
        </div>
    </div>
</div>


