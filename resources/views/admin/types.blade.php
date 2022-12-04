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
                    <h4 class="mb-sm-0">{{ $name }}</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">سدد ديونك</a></li>
                            <li class="breadcrumb-item active">{{ $name }}</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->



@php
    $users = App\Models\User::all();
@endphp

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title"> {{ $name }}</h4>
                        <br>
                        <br>

                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>الاسم العميل</th>
                                <th>اسم جهة التمويل</th>
                                <th>مبلغ التمويل الاساسي</th>
                                <th>مبلغ الفائدة</th>
                                <th>المبلغ الاجمال</th>
                                <th>ملاحظات</th>


                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($data as $d)
                                <tr>
                                    <td>{{ App\Models\User::find($d->user_id)->name }}</td>
                                    <td>{{ $d->finance_name }}</td>
                                    <td>{{ $d->finance_main_amount }}</td>
                                    <td>{{ $d->benifits_amount }}</td>
                                    <td>{{ $d->total_amount }}</td>
                                    <td>{{ $d->notes }}</td>

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
