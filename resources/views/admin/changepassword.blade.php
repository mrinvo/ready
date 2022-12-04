@extends('admin.master')
@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">change passsword</h4>

                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show">{{ $error }}</p>

                            @endforeach

                        @endif

                        <hr>
                        <hr>
                        <form action="{{ route('admin.password.update') }}" method="POST" >
                            @csrf

                        <div class="row mb-3">
                            <label for="oldpassword" class="col-sm-2 col-form-label">old password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="oldpassword" type="password" id="oldpassword">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="newpassword" class="col-sm-2 col-form-label">new password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="newpassword" type="password" id="newpassword">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="confirm" class="col-sm-2 col-form-label">confirm password</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="confirm_password" type="password" id="confirm">
                            </div>
                        </div>
                        <!-- end row -->


                        <input type="submit" value="update profile" class="btn btn-info waves-effect waves-light" id="">

                        <!-- end row -->
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

</div>






@endsection
