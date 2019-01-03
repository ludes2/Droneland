@extends('layouts.master')

@section('title') Account @endsection

@section('content')
    <ul class="nav nav-tabs pt-5" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="users_tab" data-toggle="tab" href="#users" role="tab" aria-controls="users" aria-selected="false">@lang('messages.users')</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="products_tab" data-toggle="tab" href="#products" role="tab" aria-controls="products" aria-selected="false">@lang('messages.products')</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="users" role="tabpanel" aria-labelledby="users-tab">@include('admin.users')</div>
        <div class="tab-pane fade" id="products" role="tabpanel" aria-labelledby="products-tab">@include('admin.products')</div>
    </div>

    <!-- Modal FOR USER EDITING-->
    <form action="{{ route('editUserPost') }}" method="POST" enctype="multipart/form-data">@csrf
    <div class="row">
        <div class="col mx-auto px-5">
            <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="modal-title" id="exampleModalLabel">@lang('messages.edit_user')</h6>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- USER INFORMATION DISPLAYED HERE -->
                            <div class="modal-body" id="editUserContent">

                            </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">@lang('messages.save_changes')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.cancel')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

    <!-- Modal FOR Product EDITING-->
    <form action="{{ route('editProductPost') }}" method="POST" enctype="multipart/form-data">@csrf
    <div class="row">
        <div class="col mx-auto px-5">
            <div class="modal fade" id="editProductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <div class="row">
                                <div class="col">
                                    <h6 class="modal-title" id="exampleModalLabel">@lang('messages.edit_product')</h6>
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <!-- PRODUCT INFORMATION DISPLAYED HERE -->
                        <div class="modal-body" id="editProductContent">

                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">@lang('messages.save_changes')</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.cancel')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>

@endsection

@push('scripts')
    <script>
        openEditUserModal();
        openEditProductModal();

        // open editUserModal when clicking on the editUser button
        function openEditUserModal(){
            $(document).on("click", ".openEditUserModal", function () {
                var userId = $(this).attr('id');

                $.ajax({
                    method: 'GET',
                    url: '{{ route('editUser') }}',
                    data: {'userId': userId},
                    success: function (data) {

                        // parse the data received from the "adminController" into a JS object and format the output
                        var userData = JSON.parse(data);
                        var checked = '';
                        if (userData[0].admin == 1) { checked = "checked"; }
                        var output = '';

                        output += "<div class='row'>";
                        output += "<div class='col-1'>";
                        output += "<div class='form-group'>";
                        output += "<label for='id' class='form-control-label'>ID</label>";
                        output += "<input readonly name='id' id='id' class='form-control' value='"+ userData[0].id +"'>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "<div class='col'>";
                        output += "<div class='form-group'>";
                        output += "<label for='name' class='form-control-label'>Name</label>";
                        output += "<input name='name' id='name' class='form-control' value='"+ userData[0].name +"'>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "<div class='col'>";
                        output += "<div class='form-group'>";
                        output += "<label for='email' class='form-control-label'>" + "@lang('messages.email_address')" + "</label>";
                        output += "<input name='email' type='email' id='email' class='form-control' value='"+ userData[0].email +"'>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "</div>"; // ROW
                        output += "<div class='row'>";
                        output += "<div class='col'>";
                        output += "<div class='form-check'>";
                        output += "<input type='checkbox' class='form-check-input' name='admin' value='1' " + checked + ">";
                        output += "<label for='admin' class='form-check-label'>Admin</label>";
                        output += "</div>"; // FORM-CHECK
                        output += "<div class='form-check'>";
                        output += "<input type='checkbox' class='form-check-input' name='status' value='1'>";
                        output += "<label for='status' class='form-check-label'>@lang('messages.disable_user')</label>";
                        output += "</div>"; // FORM-CHECK
                        output += "</div>"; // COL
                        output += "</div>"; // ROW

                        $('#editUserContent').html(output);
                        $('#editUserModal').modal('show');
                    },
                    error: function( req, status, err ) {

                        // will be changed to display nice form that product not found
                        console.log( 'something went wrong', status, err );
                    }
                });

            });
        }

        // open editProductModal when clicking on the editProduct button
        function openEditProductModal(){
            $(document).on("click", ".openEditProductModal", function () {
                var productId = $(this).attr('id');

                $.ajax({
                    method: 'GET',
                    url: '{{ route('editProduct') }}',
                    //dataType: 'JSON',
                    data: {'productId': productId},
                    success: function (data) {

                        // parse the data received from the "adminController" into a JS object and format the output
                        var productData = JSON.parse(data);

                        var output = '';

                        output += "<div class='row'>";
                        output += "<div class='col'>";
                        output += "<div class='form-group'>";
                        output += "<label for='thumbnail' class='form-control-label'>Thumbnail</label>";
                        output += "<input type='file' name='thumbnail' id='thumbnail' class='form-control'>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "<div class='col text-center'>";
                        output += "<img src='"+ productData[0].thumbnail +"'  width='100' alt=''>"; // how do I get the fully qualified URL????
                        output += "</div>"; // COL
                        output += "</div>"; // ROW
                        output += "<div class='row'>"
                        output += "<div class='col-1'>";
                        output += "<div class='form-group'>";
                        output += "<label for='id' class='form-control-label'>ID</label>";
                        output += "<input readonly name='id' id='id' class='form-control' value='"+ productData[0].id +"'>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "<div class='col'>";
                        output += "<div class='form-group'>";
                        output += "<label for='title' class='form-control-label'>@lang('messages.title')</label>";
                        output += "<input name='title' id='title' class='form-control' value='"+ productData[0].title +"'>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "<div class='col-2'>";
                        output += "<div class='form-group'>";
                        output += "<label for='price' class='form-control-label'>" + "@lang('messages.price')" + "</label>";
                        output += "<input name='price' type='price' id='price' class='form-control' value='"+ productData[0].price +"'>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "<div class='col'>";
                        output += "<div class='form-group'>";
                        output += "<label for='category' class='form-control-label'>" + "@lang('messages.category')" + "</label>";
                        output += "<div class='input-group'>";
                        output += "<div class='input-group-prepend'>";
                        output += "<button class='btn btn-outline-secondary dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>@lang('messages.please_select')</button>";
                        output += "<div id='editDropdownCategories' class='dropdown-menu'>";
                        @foreach($categories as $category)
                            output += "<a id='{{ $category->id }}' class='dropdown-item'' href='#'>{{ $category->name }}</a>";
                        @endforeach
                        output += "</div>"; // BUTTON
                        output += "</div>"; // FORM-GROUP-PREPEND
                        output += "<input name='editInputCategory' type='text' id='editInputCategory' readonly class='form-control' value='"+ productData[0].category +"'>";
                        output += "</div>"; // INPUT-GROUP
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "</div>"; // ROW
                        output += "<div class='row'>"
                        output += "<div class='col'>";
                        output += "<div class='form-group'>";
                        output += "<label for='short-description' class='form-control-label'>" + "@lang('messages.short_description')" + "</label>";
                        output += "<textarea rows='3' name='short-description' id='short-description' class='form-control'>"+ productData[0].short_description +"</textarea>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "</div>"; // ROW
                        output += "<div class='row'>"
                        output += "<div class='col'>";
                        output += "<div class='form-group'>";
                        output += "<label for='full-description' class='form-control-label'>" + "@lang('messages.full_description')" + "</label>";
                        output += "<textarea rows='5' name='full-description' id='full-description' class='form-control'>"+ productData[0].full_description +"</textarea>";
                        output += "</div>"; // FORM-GROUP
                        output += "</div>"; // COL
                        output += "</div>"; // ROW

                        $('#editProductContent').html(output);
                        $('#editProductModal').modal('show');

                        // show chosen category from dropdown in input field
                        $('#editDropdownCategories').on('click', "a", function () {
                            $('#editInputCategory').attr('value', $(this).text());
                        });
                    },
                    error: function( req, status, err ) {

                        // will be changed to display nice form that product not found
                        console.log( 'something went wrong', status, err );
                    }
                });
            });
        }

    </script>
@endpush

