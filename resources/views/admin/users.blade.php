
<div class="content pt-4">
    <div class="card">
        <div class="card-header bg-light">
            <h6 class="card-title">@lang('messages.users')</h6>
        </div>

        <div class="card-body">
            @if(Session::has('successUserUpdate'))
                <div class="alert alert-success">{{ Session::get('successUserUpdate') }}</div>
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
                        <th>Name</th>
                        <th>@lang('messages.email_address')</th>
                        <th>Admin</th>
                        <th>Created at</th>
                        <th>Updated at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td class="text-nowrap">{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->admin }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</td>
                            <td>{{ \Carbon\Carbon::parse($user->updated_at)->diffForHumans() }}</td>

                            <td>
                                <a id="{{ $user->id }}" class="btn btn-warning openEditUserModal"><i class="fa fa-pencil"></i></a>
                                <form style="display: none" id="deleteUser-{{ $user->id }}" action="{{ route('deleteUser', $user->id) }}" method="POST">@csrf</form>
                                <button type="button" class="btn btn-danger" data-toggle="modal" href="#deleteUserModal-{{ $user->id }}"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>

                        <div class="modal fade" id="deleteUserModal-{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="exampleModalLabel">@lang('messages.you_are_about_to_delete') {{ $user->name }}</h6>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        @lang('messages.are_your_sure')
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('messages.keep_it')</button>
                                        <form method="POST" id="deleteUser-{{ $user->id }}" action="{{ route('deleteUser', $user->id) }}">@csrf
                                            <button type="submit" class="btn btn-primary">@lang('messages.delete_it')</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


