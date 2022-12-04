@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">تعديل المستخدم</h4>
                        <hr>
                        <hr>
                        @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                        <form action="{{ route('admin.updateuser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
<input type="hidden" name="id" value="{{ $user->id }}" id="">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">الاسم</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" value="{{ $user->name }}" type="text" id="name">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">الهاتف</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="phone" value="{{ $user->phone }}" type="text" id="username">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">الهوية</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="personal_id" value="{{ $user->personal_id }}" type="text" id="personal_id">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">البريد الالكتروني</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" value="{{ $user->email }}" type="email" id="email">
                            </div>
                        </div>
                        <!-- end row -->


                        <input type="submit" value="تعديل" class="btn btn-info waves-effect waves-light" id="">

                        <!-- end row -->
                    </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>

</div>

@endsection
