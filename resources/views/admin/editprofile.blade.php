@extends('admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Profile</h4>
                        <hr>
                        <hr>
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="name" value="{{ $user->name }}" type="text" id="name">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="username" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="username" value="{{ $user->username }}" type="text" id="username">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" name="email" value="{{ $user->email }}" type="email" id="email">
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row mb-3">
                            <label for="profileimg" class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input class="form-control" name="profile_image"  type="file" id="image">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row mb-3">
                            <label for="profileimg" class="col-sm-2 col-form-label">Profile img</label>
                            <div class="col-sm-10">
                                <img class="rounded avatar-lg" id="showimage" src="{{  (!empty($user->profile_image)) ? url('upload/admin_images/'.$user->profile_image) : url('upload/no_image.jpg')  }}" alt="">
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
<script>

    $(document).ready(function(){

        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);

        });

    });
</script>

@endsection
