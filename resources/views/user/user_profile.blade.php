<div class="row pt-4 justify-content-lg-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header bg-light">
                <h6>@lang('messages.account_settings')</h6>
            </div>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('userProfilePost') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-md-4 mb-4">
                            <div>@lang('messages.profile_infos')</div>
                            <div class="text-muted small"> @lang('messages.profile_infos_hint')</div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">Name</label>
                                        <input name="name" class="form-control" value="{{ $user->name }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label"> @lang('messages.email_address')</label>
                                        <input name="email" class="form-control" value="{{ $user->email }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row mt-5">
                        <div class="col-md-4 mb-4">
                            <div> @lang('messages.access_credentials')</div>
                            <div class="text-muted small"> @lang('messages.profile_pw_hint')</div>
                        </div>

                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label"> @lang('messages.current_pw')</label>
                                        <input name="password" type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label"> @lang('messages.new_pw')</label>
                                        <input name="new_password" type="password" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label"> @lang('messages.confirm_pw')</label>
                                        <input name="new_password_confirmation" type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer bg-light text-right">
                    <button type="submit" class="btn btn-primary"> @lang('messages.save_changes')</button>
                </div>
            </form>
        </div>
    </div>
</div>
