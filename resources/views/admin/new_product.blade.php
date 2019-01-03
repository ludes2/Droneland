@extends('layouts.master')

@section('title') new Product @endsection

@section('content')

    {{--<div class="container">--}}
        <div class="row justify-content-center py-5">
            <div class="col-md-8">
                <div class="card">
                    <form method="POST" action="{{ route('newProductPost') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header">
                            <h6 class="card-title">@lang('messages.new_product')</h6>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="title" class="form-control-label">@lang('messages.title')</label>
                                        <input type="text" name="title" id="title" class="form-control">
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="thumbnail" class="form-control-label">thumbnail</label>
                                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="price" class="form-control-label">@lang('messages.price')</label>
                                        <input type="number" name="price" id="price" class="form-control">
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <img src="#" width="100" alt="#">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="category" class="form-control-label">@lang('messages.category')</label>

                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Please select</button>
                                                <div id="dropDownCategories" class="dropdown-menu">
                                                    @foreach($categories as $category)
                                                        <a id="{{ $category->id }}" class="dropdown-item" href="#">{{ $category->name }}</a>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <input type="text" name="newInputCategory" id="newInputCategory" readonly class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="short-description" class="form-control-label">@lang('messages.short_description')</label>
                                        <textarea rows="5" name="short-description" id="short-description" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                        <button type="submit" class="btn btn-primary">@lang('messages.save_new_product')</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    {{--</div>--}}
@endsection

@push('scripts')
    <script>
        // show chosen category from dropdown in input field
        $('#dropDownCategories').on('click', "a", function () {
            $('#newInputCategory').attr('value', $(this).text());
        });
    </script>
@endpush()
