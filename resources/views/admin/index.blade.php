@extends('admin.master')
@section('content')
@php
    use App\Models\Debts;
@endphp
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">احصائيات</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">سدد ديونك</a></li>
                            <li class="breadcrumb-item active">احصائيات</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2"> حكومي</p>
                                <h4 class="mb-2">@php
                                    echo Debts::govcount();
                                @endphp</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-shopping-cart-2-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">ينوك</p>
                                <h4 class="mb-2">@php
                                    echo Debts::bankcount();
                                @endphp</h4>
                                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-usd font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">اشخاص</p>
                                <h4 class="mb-2">@php
                                    echo Debts::personcount();
                                @endphp</h4></h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="ri-user-3-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">تجارية</p>
                                <h4 class="mb-2">@php
                                    echo Debts::comcount();
                                @endphp</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="ri-shopping-cart-2-line font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

@php
    $users = App\Models\User::all();
@endphp

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> المستخدمين</h4>
                        <br>
                        <a class="btn btn-info" href="{{ route('admin.adduser') }}">اضافة مستخدم</a>
                        <br>   <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>الاسم</th>
                                <th>الهاتف</th>
                                <th>الهوية</th>
                                <th>البريد الالكتروني</th>
                                <th>مفعل</th>
                                <th>لديه مديونة</th>
                                <th>تعديل</th>

                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>{{ $user->personal_id }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if($user->verified == 1)
                                        <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true" style=""></i></button>
                                        @else
                                        <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $check = Debts::check($user->id);

                                        @endphp
                                        @if($check == 1)
                                        <button class="btn btn-success"><i class="fa fa-check" aria-hidden="true" style=""></i></button>
                                        @else
                                        <button class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.edituser',$user->id) }}" class="btn btn-info sm"><i class=" fas fa-edit"></i></a>
                                        <a href="{{ route('admin.delete',$user->id) }}" id="delete" class="btn btn-danger sm"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>

                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        <!-- end row -->
    </div>

</div>
@endsection
