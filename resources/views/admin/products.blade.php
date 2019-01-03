
<div class="content pt-4">
    <div class="card">
        <div class="card-header bg-light">
            <div class="row">
                <div class="col">
                    <h6 class="card-title">@lang('messages.products')</h6>
                </div>
                <div class="col text-right">
                    <a href="{{ route('newProduct') }}" role="button" class="btn btn-primary">+ @lang('messages.new_product')</a>
                </div>
            </div>
        </div>

        <div class="card-body">
            @if(Session::has('successProductUpdate'))
                <div class="alert alert-success">{{ Session::get('successProductUpdate') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Thumbnail</th>
                        <th>@lang('messages.title')</th>
                        <th>@lang('messages.price')</th>
                        <th>@lang('messages.category')</th>
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
                                        <h6 class="modal-title" id="exampleModalLabel">@lang('messages.you_are_about_to_delete') {{ $product->title }}</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @lang('messages.are_your_sure')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.keep_it').</button>
                                        <form method="POST" id="deleteProduct-{{ $product->id }}" action="{{ route('deleteProduct', $product->id) }}">@csrf
                                            <button type="submit" class="btn btn-primary">@lang('messages.delete_it')</button>
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


