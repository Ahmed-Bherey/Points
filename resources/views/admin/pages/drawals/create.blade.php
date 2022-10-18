@extends('admin.layouts.includes.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            {{-- start card --}}
            <div class="row mt-1">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header header-bg">
                            <h3 class="card-title header-title">مسحوبات الصنايعية</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        @include('admin.layouts.alerts.success')
                        @include('admin.layouts.alerts.errors')
                        <form class="form-horizontal" action="{{route('drawal.create')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <select required class="form-control" plac="" name="drawal_id" id="type">
                                            <option value="">اسم الصنايعى</option>
                                            @foreach($industrials as $key => $industrial)
                                            <option value="{{ $industrial->id }}">{{$industrial->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" id="tel" placeholder="1"
                                            name="invoice_num">
                                        <label for="tel" class="col-sm-4 col-lg-4 col-xl-3 col-form-label"> رقم
                                            الفاتورة </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="number" class="form-control" id="value" placeholder="1"
                                            name="withdrawal_value">
                                        <label for="value" class="col-sm-4 col-xl-3 col-form-label">قيمة
                                            المسحوبات</label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="1" name="date">
                                        <label for="date" class="col-sm-4 col-lg-4 col-xl-3 col-form-label">التاريخ
                                        </label>
                                    </div>
                                    <div class="col-sm-4 mb-3 form-floating">
                                        <input type="date" class="form-control" id="date" placeholder="1"
                                            name="invoice_date">
                                        <label for="date" class="col-sm-4 col-lg-4 col-xl-3 col-form-label"> تاريخ
                                            الفاتورة </label>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn bg-danger mr-3"><i class="fas fa-undo"></i></button>
                        <button type="submit" class="btn bg-success"><i class="fa fa-check text-light"
                                aria-hidden="true"></i></button>
                    </div>
                    <!-- /.card-footer -->
                    </form>
                </div>
            </div>
        </div>
        {{-- end card --}}
        {{-- start card table --}}
        <div class="row mt-1">
            <div class="col-sm-12 col-md-12  col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="float:right; font-weight:bold;"> مسحوبات الصنايعية </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                                        aria-describedby="example1_info">
                                        <thead>
                                            <tr>
                                                <td>#</td>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    اسم الصنايعى </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    التاريخ </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1" aria-label="Browser: activate to sort column ascending">
                                                    رقم الفاتورة </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    تاريخ الفاتورة </th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    قيمة المسحوبات</th>
                                                <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    عمليات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($drawals as $key => $drawal)
                                            <tr class="odd">
                                                <td>{{$loop->iteration}}</td>
                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{$drawal->industrials->name}}</td>
                                                <td>{{$drawal->invoice_num}}</td>
                                                <td>{{$drawal->withdrawal_value}}</td>
                                                <td>{{$drawal->date}}</td>
                                                <td>{{$drawal->invoice_date}}</td>
                                                <td>
                                                    <a href="{{ route('drawal.edit', $drawal->id) }}"
                                                        class="btn bg-secondary"><i class="far fa-edit"
                                                            aria-hidden="true"></i></a>
                                                    <a href="{{ route('drawal.destroy', $drawal->id) }}"
                                                        onclick="return confirm('Are you sure?')"
                                                        class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        {{-- end table --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- end card table --}}
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
</div>
@endsection
